@extends('frontend.layout.master')
@section('title', 'Home')
@section('css')

@endsection
@section('content')



 <livewire:frontend.product-modal-shared />
  <!-- HERO SECTION-->
  <div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('images/sliders/slider-1.jpg') }})">
      <div class="container py-5">
        <div class="row px-4 px-lg-5">
          <div class="col-lg-6">
            <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
            <h1 class="h2 text-uppercase mb-3">محلات صبايا ترحب بكم</h1><a class="btn btn-dark" href="shop.html">Browse collections</a>
          </div>
        </div>
      </div>
    </section>
    <!-- CATEGORIES SECTION-->
    <section class="pt-5">
        <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
        </header>
        {{-- start product categories --}}
            <div class="row">
                <div class="col-md-4">
                    <a class="category-item" href="{{ route('category', $categorys[0]->slug) }}">
                        @if($categorys[0]->cover)
                        <img src="{{ asset('images/product_categories/'.$categorys[0]->cover) }}" alt="{{ $categorys[0]->name }}" class="img-fluid">
                        @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $categorys[0]->name }}" class="img-fluid" >
                        @endif
                        <strong class="category-item-title">{{ $categorys[0]->name }}</strong>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="category-item mb-4" href="{{ route('category', $categorys[1]->slug) }}">
                        @if($categorys[1]->cover)
                            <img src="{{ asset('images/product_categories/'.$categorys[1]->cover) }}" alt="{{ $categorys[1]->name }}" class="img-fluid">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $categorys[1]->name }}" class="img-fluid" >
                        @endif
                        <strong class="category-item-title">{{ $categorys[1]->name }}</strong>
                    </a>
                    <a class="category-item" href="{{ route('category', $categorys[2]->slug) }}">
                        @if($categorys[2]->cover)
                            <img src="{{ asset('images/product_categories/'.$categorys[2]->cover) }}" alt="{{ $categorys[2]->name }}" class="img-fluid">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $categorys[2]->name }}" class="img-fluid" >
                        @endif
                        <strong class="category-item-title">{{ $categorys[2]->name }}</strong>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="category-item" href="{{ route('category', $categorys[3]->slug) }}">
                        @if($categorys[3]->cover)
                            <img src="{{ asset('images/product_categories/'.$categorys[3]->cover) }}" alt="{{ $categorys[3]->name }}" class="img-fluid">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $categorys[3]->name }}" class="img-fluid" >
                        @endif
                        <strong class="category-item-title">{{ $categorys[3]->name }}</strong>
                    </a>
                </div>
            </div>
        {{-- End product categories --}}
    </section>
    <!-- TRENDING PRODUCTS-->
    <livewire:frontend.featured-product />
    <!-- SERVICES-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row text-center gy-3">
          <div class="col-lg-4">
            <div class="d-inline-block">
              <div class="d-flex align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#delivery-time-1"> </use>
                </svg>
                <div class="text-start ms-3">
                  <h6 class="text-uppercase mb-1">Free shipping</h6>
                  <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-inline-block">
              <div class="d-flex align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#helpline-24h-1"> </use>
                </svg>
                <div class="text-start ms-3">
                  <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                  <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-inline-block">
              <div class="d-flex align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#label-tag-1"> </use>
                </svg>
                <div class="text-start ms-3">
                  <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                  <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- NEWSLETTER-->
    <section class="py-5">
      <div class="container p-0">
        <div class="row gy-3">
          <div class="col-lg-6">
            <h5 class="text-uppercase">Let's be friends!</h5>
            <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
          </div>
          <div class="col-lg-6">
            <form action="#">
              <div class="input-group">
                <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('.glightbox').glightbox();
    });
</script>

@endsection
