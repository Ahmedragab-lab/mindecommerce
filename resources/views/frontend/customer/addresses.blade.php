@extends('layouts.master2')
@section('title', 'Home')
@section('css')

@endsection
@section('content')
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
    <section class="py-5">
        <div class="row ">
            <div class="col-lg-8 pt-2">
                <livewire:frontend.customer.addresses-component />
            </div>
            <div class="col-lg-4">
                @include('frontend.customer._sidebar')
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

@endsection

