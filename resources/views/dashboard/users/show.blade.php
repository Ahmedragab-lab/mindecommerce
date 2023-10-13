@extends('dashboard.layout.master')
@section('title', 'user page')
@section('css')

@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">User Show</h3>
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
                                <div class="card-header">
                                    <h4 class="card-title">User show </h4>
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
                                <div class="card-content collapse show">
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-info mb-3 " style="margin-left: 50px;float: left;">
                                        <i class="icon-action-undo"></i> Back to User
                                    </a>
                                    <a class="btn btn-success" href="{{ route('admin.users.edit',$user->id )}}" title="edit" style="margin-left: 50px;float: left;">
                                        <i class="icon-note"></i> Edit user
                                    </a>
                                    <div class="card-body card-dashboard">
                                        <div class="row" id="ui">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-content collapse show">
                                                        <div class="table-responsive">
                                                            <table class="table table-responsive table-bordered mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td>{{  $user->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Customer Name</td>
                                                                        <td>{{ $user->full_name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Phone</td>
                                                                        <td > <span class="badge badge-success">{{ $user->phone}}</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status</td>
                                                                        <td>{{ $user->status() }}</td>
                                                                    </tr>
                                                                    {{-- <tr>
                                                                        <td>Title</td>
                                                                        <td>{{ $user->addresses }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Product Name</td>
                                                                        <td>{{ $user->roles->name }}</td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <td>User Image</td>
                                                                        <td>
                                                                            @if($user->image)
                                                                            <img src="{{ $user->userImage() }}" alt="{{ $user->full_name }}" class="img-thumbnail" width="100px">
                                                                            @else
                                                                            <img src="{{ asset('images/no-image.jpg') }}" alt="{{ $user->full_name }}" class="img-thumbnail" width="100px">
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Created At</td>
                                                                        <td>{{ $user->created_at() }}</td>
                                                                    </tr>
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
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
