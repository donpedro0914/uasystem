@extends('layouts.app')
@section('content')
    @include('global.header')
    @include('global.sidebar')
    <div id="wrapper">
	    <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ol>
                        <h4 class="page-title">{{ $user->name }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('admin.update.user', ['id'=>$user->id]) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xs-12">
                                            <labe>Full Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" />
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" />
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" readonly/>
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"/>
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                                    <div class="clearfix text-right mt-3">
                                                <button type="submit" class="btn btn-success">
                                                    Update User
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var success = "{!! session('success') !!}";
        var error = "{!! session('error') !!}";

        if(success) {
            swal({
                position: 'middle-center',
                type: 'success',
                title: success,
                showConfirmButton: false,
                timer: 1000
            })
        }

        if(error) {
            swal({
                position: 'middle-center',
                type: 'error',
                title: error,
                showConfirmButton: false,
                timer: 1000
            })  
        }
    });
</script>
@endpush