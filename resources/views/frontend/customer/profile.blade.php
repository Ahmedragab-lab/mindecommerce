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
                <form action="{{ route('customer.update_profile') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('patch')
                    <div class="row ">
                        <div class="col-lg-12 text-center mb-4">
                            @if (auth()->user()->image )
                                <img src="{{ Auth::user()->userImage() }}" alt="{{ auth()->user()->full_name }}" class="img-thumbnail img-preview" width="120">
                                <div class="mt-2">
                                    <a href="{{ route('customer.remove_profile_image') }}" class="btn btn-sm btn-outline-danger">Remove image</a>
                                </div>
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" alt="{{ auth()->user()->full_name }}" class="img-thumbnail " width="120">
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="first_name">First name</label>
                            <input class="form-control form-control-lg" name="first_name" type="text" value="{{ old('first_name', auth()->user()->firstname) }}" placeholder="Enter your first name">
                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="last_name">Last name</label>
                            <input class="form-control form-control-lg" name="last_name" type="text" value="{{ old('last_name', auth()->user()->lastname) }}" placeholder="Enter your last name">
                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="email">Email address</label>
                            <input class="form-control form-control-lg" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" placeholder="e.g. Jason@example.com">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="mobile">Mobile number</label>
                            <input class="form-control form-control-lg" name="mobile" type="tel"
                            maxlength="11" minlength="11"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                            value="{{ old('mobile', auth()->user()->phone) }}" placeholder="e.g. 966512345678" >
                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="password">Password <small class="ml-auto text-danger">(Optional)</small></label>
                            <input class="form-control form-control-lg" name="password" type="password">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="password_confirmation">Re-Password <small class="ml-auto text-danger">(Optional)</small></label>
                            <input class="form-control form-control-lg" name="password_confirmation" type="password">
                            @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group mb-3 ">
                            <label class="form-label text-sm text-uppercase" for="user_image">Image</label>
                            <input class="form-control form-control-lg img"  name="user_image" type="file" accept="image/*">
                            <span class="form-text text-muted">Image width should be 500px x 500px</span>
                            @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-4">
                            @if(auth()->user()->image)
                            <img src="{{ asset('images/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->full_name }}" class="img-thumbnail img-preview" width="100px">
                            @else
                              <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-thumbnail img-preview" width="100px">
                            @endif
                        </div>
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Update profile</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                @include('frontend.customer._sidebar')
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
<script>
    $('input[name="user_image"]').on('change', function() {
    // $(".img").change(function() {
        console.log('changed');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection

