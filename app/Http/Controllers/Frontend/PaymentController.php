<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\Product;
use App\Models\User;
use App\Services\OmnipayService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Cart;

class PaymentController extends Controller
{
    public function checkout_now(Request $request){
        // return 'checkout now';
        $order = (new OrderService)->createOrder($request->except(['_token', 'submit']));
        $omniPay = new OmnipayService('PayPal_Express');
        $response = $omniPay->purchase([
            'amount' => $order->total,
            'transactionId' => $order->ref_id,
            'currency' => $order->currency,
            'cancelUrl' => $omniPay->getCancelUrl($order->id),
            'returnUrl' => $omniPay->getReturnUrl($order->id),
        ]);

        if ($response->isRedirect()) {
            $response->redirect();
        }

        toast($response->getMessage(), 'error');
        // Alert::error('Error', $response->getMessage());
        return redirect()->route('home');
    }
    public function cancelled($order_id){
        $order = Order::find($order_id);
        $order->update([
            'order_status' => Order::CANCELED
        ]);
        $order->products()->each(function ($order_product) {
            $product = Product::whereId($order_product->pivot->product_id)->first();
            $product->update([
                'quantity' => $product->quantity + $order_product->pivot->quantity
            ]);
        });

        toast('You have cancelled your order payment!', 'error');
        // Alert::error('Error', 'You have cancelled your order payment!');
        return redirect()->route('home');
    }
    public function completed($order_id)
    {
        $order = Order::with('products', 'user', 'payment_method')->find($order_id);
        // dd($order);
        $omniPay = new OmnipayService('PayPal_Express');
        $response = $omniPay->complete([
            'amount' => $order->total,
            'transactionId' => $order->ref_id,
            'currency' => $order->currency,
            'cancelUrl' => $omniPay->getCancelUrl($order->id),
            'returnUrl' => $omniPay->getReturnUrl($order->id),
            'notifyUrl' => $omniPay->getNotifyUrl($order->id),
        ]);
        dd($response);
        if ($response->isSuccessful()) {
            $order->update(['order_status' => Order::PAYMENT_COMPLETED]);
            $order->transactions()->create([
                'transaction' => OrderTransaction::PAYMENT_COMPLETED,
                'transaction_number' => $response->getTransactionReference(),
                'payment_result' => 'success'
            ]);

            if (session()->has('coupon')) {
                $coupon = Coupon::whereCode(session()->get('coupon')['code'])->first();
                $coupon->increment('used_times');
            }

            Cart::instance('cart')->destroy();
            session()->forget([
                'coupon',
                'saved_customer_address_id',
                'saved_shipping_company_id',
                'saved_payment_method_id',
                'shipping',
            ]);

            // User::whereHas('roles', function($query) {
            //     $query->whereIn('name', ['admin', 'supervisor']);
            // })->each(function ($admin, $key) use ($order) {
            //     $admin->notify(new OrderCreatedNotification($order));
            // });


            // $data = $order->toArray();
            // $data['currency_symbol'] = $order->currency == 'USD' ? '$' : $order->currency;
            // $pdf = PDF::loadView('layouts.invoice', $data);
            // $saved_file = storage_path('app/pdf/files/' . $data['ref_id'] . '.pdf');
            // $pdf->save($saved_file);

            // $customer = User::find($order->user_id);
            // $customer->notify(new OrderThanksNotification($order, $saved_file));
            toast('Your recent payment is successful with reference code: ' . $response->getTransactionReference(), 'success');
            // Alert::success('Success', 'Your recent payment is successful with reference code: ' . $response->getTransactionReference());
            return redirect()->route('home');
        } else {
            $order->update(['order_status' => Order::PAYMENT_FAILED]);
            $order->transactions()->create([
                'transaction' => OrderTransaction::PAYMENT_FAILED,
                'transaction_number' => $response->getTransactionReference(),
                'payment_result' => 'failed'
            ]);
            toast('Your recent payment is failed with reference code: '
             . $response->getTransactionReference() . $response->getMessage(), 'error');
            // Alert::error('Error', 'Your recent payment is failed with reference code: ' . $response->getTransactionReference());
            return redirect()->route('home');
        }
    }
    public function webhook($order , $env){

    }
}


