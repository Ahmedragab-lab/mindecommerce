<div>
    <div class="container">
        <!-- HERO SECTION-->
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('images/sliders/slider-3.jpg') }})">
            <div class="container py-5">
                <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    <p class="btn btn-dark small  text-white mb-2">New Inspiration 2020</p>
                    <h1 class="h2 text-white mb-3">محلات صبايا ترحب بكم</h1><a class="btn btn-dark" href="shop.html">Browse collections</a>
                </div>
                </div>
            </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <div class="row">
            <div class="col-lg-8">
                <h2 class="h5 text-uppercase mb-4" style="color: #12b369;" >Shipping Addresses</h2>
                <div class="row mb-4">
                    @forelse($addresses as $address)
                        <div class="col-6 form-group">
                            <div class="form-check">
                                <input
                                    type="radio"
                                    id="address-{{ $address->id }}"
                                    class=" form-check-input"
                                    wire:model="customer_address_id"
                                    wire:click="updateShippingCompanies()"
                                    {{ intval($customer_address_id) == $address->id ? 'checked' : '' }}
                                    value="{{ $address->id }}">
                                <label for="address-{{ $address->id }}" class="custom-control-label text-small">
                                    <b>{{ $address->address_title }}</b>
                                    <small>
                                        {{ $address->address }}<br>
                                        {{ $address->country->name }} - {{ $address->state->name }} - {{ $address->city->name }}
                                    </small>
                                </label>
                            </div>
                        </div>
                    @empty
                        <p>No addresses found</p>
                        <a href="#">Add an address</a>
                    @endforelse
                </div>
                @if ($customer_address_id != 0)
                    <h2 class="h5 text-uppercase mb-4" style="color: #12b369;" >Shipping Way</h2>
                    <div class="row mb-4" >
                        @forelse($shipping_companies as $shipping_company)
                            <div class="col-6 form-group">
                                <div class="custom-control custom-radio">
                                    <input
                                        type="radio"
                                        id="shipping-company-{{ $shipping_company->id }}"
                                        class="form-check-input"
                                        wire:model="shipping_company_id"
                                        wire:click="updateShippingCost()"
                                        {{ intval($shipping_company_id) == $shipping_company->id ? 'checked' : '' }}
                                        value="{{ $shipping_company->id }}">
                                    <label for="shipping-company-{{ $shipping_company->id }}" class="custom-control-label text-small">
                                        <b>{{ $shipping_company->name }}</b>
                                        <small>
                                            {{ $address->description }} - (LE {{ $shipping_company->cost }})
                                        </small>
                                    </label>
                                </div>
                            </div>
                        @empty
                            <p>No shipping companies found</p>
                        @endforelse
                    </div>
                @endif
                {{-- address{{ $customer_address_id }} ****** company{{ $shipping_company_id }} ****** payment{{ $payment_method_id }} --}}
                @if ($customer_address_id != 0 && $shipping_company_id != 0)
                    <h2 class="h5 text-uppercase mb-4" style="color: #12b369;" >Payment Way</h2>
                    <div class="row mb-4">
                        @forelse($payment_methods as $payment_method)
                            <div class="col-4 form-group">
                                <div class="custom-control custom-radio">
                                    <input
                                        type="radio"
                                        id="payment-method-{{ $payment_method->id }}"
                                        class="form-check-input"
                                        wire:model="payment_method_id"
                                        wire:click="updatePaymentMethod()"
                                        {{ intval($payment_method_id) == $payment_method->id ? 'checked' : '' }}
                                        value="{{ $payment_method->id }}">
                                    <label for="payment-method-{{ $payment_method->id }}" class="custom-control-label text-small">
                                        <b>{{ $payment_method->name }}</b>
                                    </label>
                                </div>
                            </div>
                        @empty
                            <p>No payment way found</p>
                        @endforelse
                    </div>
                @endif
                @if ($customer_address_id != 0 && $shipping_company_id != 0 && $payment_method_id != 0)
                    @if (\Str::lower($payment_method_code) == 'ppex')
                        <form action="{{ route('checkout.payment') }}" method="post">
                            @csrf
                            <input type="hidden" name="customer_address_id" value="{{ old('customer_address_id', $customer_address_id) }}" class="form-control">
                            <input type="hidden" name="shipping_company_id" value="{{ old('shipping_company_id', $shipping_company_id) }}" class="form-control">
                            <input type="hidden" name="payment_method_id" value="{{ old('payment_method_id', $payment_method_id) }}" class="form-control">
                            <button type="submit" name="submit" class="btn btn-success btn-sm btn-block">
                                Continue to checkout with PayPal
                            </button>
                        </form>
                     @elseif(\Str::lower($payment_method_code) == 'visa')
                        <section class="py-5">
                            <!-- BILLING ADDRESS-->
                            <h2 class="h5 text-uppercase mb-4">Billing details</h2>
                            {{-- @if(Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('stripe_error') }}
                                </div>
                            @endif --}}
                            <div class="row">
                              <div class="col-lg-12">
                                <form   wire:submit.prevent="paymentmode()" >
                                  <div class="row gy-3">
                                    <div class="col-lg-6">
                                      <label class="form-label text-sm text-uppercase" for="card-no">Card Number:<span>*</span></label>
                                      <input class="form-control form-control-lg" type="text" name="card-no" value="" placeholder="Card No" wire:model='card_no'>
                                      @error('card_no')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label text-sm text-uppercase" for="exp-month">Expiry Month:<span>*</span></label>
                                      <input class="form-control form-control-lg" type="text" name="exp-month" value="" placeholder="MM" wire:model='exp_month'>
                                      @error('exp_month')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label text-sm text-uppercase" for="exp-year">Expiry Year:<span>*</span></label>
                                      <input class="form-control form-control-lg" type="text" name="exp-year" value="" placeholder="YYYY" wire:model='exp_year'>
                                      @error('exp_year')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label text-sm text-uppercase" for="cvc">CVC:<span>*</span></label>
                                      <input class="form-control form-control-lg" type="password" name="cvc" value="" placeholder="CVC" wire:model='cvc'>
                                      @error('cvc')
                                      <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                    <div class="col-lg-12 form-group">
                                      <button class="btn btn-dark" type="submit">Place order</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                        </section>
                     @else
                     cash
                    @endif
                @endif
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Your order</h5>
                  <ul class="list-unstyled mb-0">

                    <table class="table text-nowrap">
                        <thead class="bg-light">
                          <tr>
                            <th class="border-0 " scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                            <th class="border-0 " scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                            <th class="border-0 " scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="border-0 align-middle" title="{{$item->name}}">
                                        <img src="{{ asset('images/products/' . $item->model->firstMedia->file_name) }}"
                                            alt=" {{ $item->model->name }}" width="40"/>
                                    </td>
                                    <td class="border-0 align-middle">{{$item->qty}}</td>
                                    <td class="border-0 align-middle">LE {{$item->subtotal}}</td>
                                </tr>
                          @empty
                          @endforelse
                        </tbody>
                    </table>
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="text-uppercase small font-weight-bold">Subtotal</strong>
                            <span >LE {{ $cart_subtotal }}</span>
                        </li>
                        @if(session()->has('coupon'))
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="small font-weight-bold">Discount <small>({{ getNumbers()->get('discount_code') }})</small></strong>
                                <span style="color: red;">- LE ({{ $cart_discount }})</span>
                            </li>
                        @endif
                        @if(session()->has('shipping'))
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="small font-weight-bold">Shipping <small>({{ getNumbers()->get('shipping_code') }})</small></strong>
                                <span class=" small font-weight-bold">LE {{ $cart_shipping }}</span>
                            </li>
                        @endif
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="text-uppercase small fw-bold">Tax</strong>
                            <span style="color: rgb(119, 156, 209);">({{ getNumbers()->get('taxText') }})</span>
                            <span>LE {{ $cart_tax }}</span>
                        </li>
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between mb-3">
                            <strong class="text-uppercase small fw-bold">Total</strong>
                            <span>LE {{ $cart_total }}</span>
                        </li>
                    <li>
                        <label class="checkbox-field mb-3">
                            <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
                                wire:model='havecoupon_code' >
                            <span class="text-uppercase small ">I have coupon code</span>
                        </label>
                        @if($havecoupon_code == 1)
                        <form wire:submit.prevent="applyDiscount()">
                            <div class="input-group mb-0">
                                @if (!session()->has('coupon'))
                                    <input type="text" wire:model="code" class="form-control" placeholder="Enter your coupon">
                                @endif
                                @if(session()->has('coupon'))
                                    <button type="button" wire:click.prevent="removeCoupon()" class="btn btn-danger btn-sm w-100">
                                        <i class="fas fa-trash-alt mr-2"></i> Remove coupon
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-dark btn-sm w-100" >
                                        <i class="fas fa-gift me-2"></i> Apply coupon
                                    </button>
                                @endif
                                @error('code')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                        @endif
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
</div>
