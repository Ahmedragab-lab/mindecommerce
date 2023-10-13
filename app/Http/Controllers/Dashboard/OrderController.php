<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\User;
use App\Services\OmnipayService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::query()
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereOrderStatus(\request()->status);
            })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 10);
        return view('dashboard.orders.index',compact('orders'));
    }

    public function show(Order $order)
    {
        $order_status_array = [
            '0' => 'New order',
            '1' => 'Paid',
            '2' => 'Under process',
            '3' => 'Finished',
            '4' => 'Rejected',
            '5' => 'Canceled',
            '6' => 'Refund requested',
            '7' => 'Returned order',
            '8' => 'Refunded',
        ];
        $key = array_search($order->order_status, array_keys($order_status_array));
        foreach ($order_status_array as $k => $v) {
            if ($k < $key) {
                unset($order_status_array[$k]);
            }
        }

        return view('dashboard.orders.show', compact('order', 'order_status_array'));
    }

    public function update(Request $request, Order $order)
    {
        $customer = User::find($order->user_id);
        if ($request->order_status == Order::REFUNDED){
            $omniPay = new OmnipayService('PayPal_Express');
            $response = $omniPay->refund([
                'amount' => $order->total,
                'transactionReference' =>
                                        $order->transactions()
                                        ->where('transaction', OrderTransaction::PAYMENT_COMPLETED)
                                        ->first()->transaction_number,
                'cancelUrl' => $omniPay->getCancelUrl($order->id),
                'returnUrl' => $omniPay->getReturnUrl($order->id),
                'notifyUrl' => $omniPay->getNotifyUrl($order->id),
            ]);
            if ($response->isSuccessful()) {
                $order->update(['order_status' => Order::REFUNDED]);
                $order->transactions()->create([
                    'transaction' => OrderTransaction::REFUNDED,
                    'transaction_number' => $response->getTransactionReference(),
                    'payment_result' => 'success'
                ]);

                // $customer->notify(new OrderNotification($order));
                Alert::success('Success', 'Order has been refunded');
                return redirect()->back();
            }

        } else {

            $order->update(['order_status'=> $request->order_status]);
            $order->transactions()->create([
                'transaction' => $request->order_status,
                'transaction_number'=> null,
                'payment_result'=> null,
            ]);
            // $customer->notify(new OrderNotification($order));
            Alert::success('Success', 'Order status updated successfully');
            return redirect()->back();

        }
    }
    public function destroy($id)
    {
        //
    }
}
