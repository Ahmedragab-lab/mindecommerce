@extends('dashboard.layout.master')
@section('title', 'orders')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">orders</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحه التحكم</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header mb-3">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show ">
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-info mb-3 " style="margin-left: 50px;float: left;">
                                    <i class="icon-action-undo"></i> Back to orders
                                </a>
                                <div class="card-body card-dashboard">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex">
                                            <h6 class="m-0 font-weight-bold text-primary">Order ({{ $order->ref_id }})</h6>
                                            <div class="ml-auto">
                                                <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row align-items-center">
                                                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Order status</div>
                                                            </div>
                                                            <select class="form-control" name="order_status" style="outline-style: none;" onchange="this.form.submit()">
                                                                <option value=""> Choose your action </option>
                                                                @foreach($order_status_array as $key => $value)
                                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-8">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                        <tr>
                                                            <th>Ref. Id</th>
                                                            <td>{{ $order->ref_id }}</td>
                                                            <th>Customer</th>
                                                            {{-- <td><a href="{{ route('admin.customers.show', $order->user_id) }}">{{ $order->user->full_name }}</a></td> --}}
                                                            <td><a href="#">{{ $order->user->full_name }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address</th>
                                                            {{-- <td><a href="{{ route('admin.customer_addresses.show', $order->user_address_id) }}">{{ $order->user_address->address_title }}</a></td> --}}
                                                            <td><a href="#">{{ $order->user_address->address_title }}</a></td>
                                                            <th>Shipping Company</th>
                                                            <td>{{ $order->shipping_company->name . '('. $order->shipping_company->code .')' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Created date</th>
                                                            <td>{{ $order->created_at->format('d-m-Y h:i a') }}</td>
                                                            <th>Order status</th>
                                                            <td>{!! $order->statusWithLabel() !!}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                        <tr>
                                                            <th>Subtotal</th>
                                                            <td>{{ $order->currency() . $order->subtotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Discount code</th>
                                                            <td>{{ $order->discount_code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Discount</th>
                                                            <td>{{ $order->currency() . $order->discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Shipping</th>
                                                            <td>{{ $order->currency() . $order->shipping }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>tax</th>
                                                            <td>{{ $order->currency() . $order->tax }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amount</th>
                                                            <td>{{ $order->currency() . $order->total }}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collapse show ">
                                <div class="card-body card-dashboard">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Transaction</th>
                                                                <th>Transaction number</th>
                                                                <th>Payment result</th>
                                                                <th>Action date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($order->transactions as $transaction)
                                                                    <tr>
                                                                        <td>{{ $transaction->status($transaction->transaction) }}</td>
                                                                        <td>{{ $transaction->transaction_number }}</td>
                                                                        <td>{{ $transaction->payment_result }}</td>
                                                                        <td>{{ $transaction->created_at->format('Y-m-d h:i a') }}</td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="4">No transactions found</td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collapse show ">
                                <div class="card-body card-dashboard">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>image</th>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($order->products as $product)
                                                            <tr>
                                                                <td><a href="{{ route('admin.products.show', $product->id) }}">
                                                                    @if($product->firstMedia)
                                                                    <img src="{{ asset('images/products/'.$product->firstMedia->file_name) }}" alt="{{ $product->name }}" class="img-thumbnail" width="50px" height="50px">
                                                                    @else
                                                                    <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $product->name }}" class="img-thumbnail" width="50px">
                                                                    @endif
                                                                    </a>
                                                                </td>
                                                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                                                                <td>{{ $product->pivot->quantity }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="2">No products found</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
