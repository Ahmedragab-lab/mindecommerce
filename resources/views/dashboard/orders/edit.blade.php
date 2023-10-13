@extends('dashboard.layout.master')
@section('title', 'payment_method')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block"> edit payment method</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحه التحكم</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.payment_method.index') }}">payment method</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Payment Method
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('admin.payment_method.update',$payment_method->id) }}" method="post" >
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="Name"
                                                                   name="name"
                                                                   value="{{ old('name',$payment_method->name) }}" >
                                                            @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="code">code</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="code"
                                                                   name="code"
                                                                   value="{{ old('code',$payment_method->code) }}" >
                                                            @error('code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="sandbox">sandbox</label>
                                                        <select name="sandbox" class="form-control">
                                                            <option value="1" {{ old('sandbox',$payment_method->sandbox) == '1' ? 'selected' : null }}>Sandbox</option>
                                                            <option value="0" {{ old('sandbox',$payment_method->sandbox) == '0' ? 'selected' : null }}>Live</option>
                                                        </select>
                                                        @error('sandbox')<span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="status">Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="1" {{ old('status',$payment_method->status) == '1' ? 'selected' : null }}>Active</option>
                                                            <option value="0" {{ old('status',$payment_method->status) == '0' ? 'selected' : null }}>Inactive</option>
                                                        </select>
                                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="merchant_email">Merchant Email</label>
                                                            <input type="email"
                                                                   class="form-control"
                                                                   placeholder="merchant_email"
                                                                   name="merchant_email"
                                                                   value="{{ old('merchant_email',$payment_method->marchant_email) }}" >
                                                            @error('merchant_email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="client_id">client_id</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="client_id"
                                                                   name="client_id"
                                                                   value="{{ old('client_id',$payment_method->client_id) }}" >
                                                            @error('client_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="secret">client_secret</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="client_secret"
                                                                   name="client_secret"
                                                                   value="{{ old('client_secret',$payment_method->client_secret) }}" >
                                                            @error('client_secret')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sandbox_merchant_email">sandbox merchant email</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="sandbox_merchant_email"
                                                                   name="sandbox_merchant_email"
                                                                   value="{{ old('sandbox_merchant_email',$payment_method->sandbox_merchant_email) }}" >
                                                            @error('sandbox_merchant_email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sandbox_client_id">Sandbox client id</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="sandbox_client_id"
                                                                   name="sandbox_client_id"
                                                                   value="{{ old('sandbox_client_id',$payment_method->sandbox_client_id) }}" >
                                                            @error('sandbox_client_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sandbox_secret">sandbox_client_secret</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="sandbox_client_secret"
                                                                   name="sandbox_client_secret"
                                                                   value="{{ old('sandbox_client_secret', $payment_method->sandbox_client_secret) }}" >
                                                            @error('sandbox_client_secret')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> update payment method
                                                </button>
                                            </div>
                                        </form>
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
