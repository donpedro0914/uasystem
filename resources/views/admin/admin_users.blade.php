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
                            <li class="breadcrumb-item active">Admin Users</li>
                        </ol>
                        <h4 class="page-title">Admin Users</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addUser" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">Add User</button>
                                @include('modal.user')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header">
                                    <table id="table" class="table table-bordered dataTable no-footer table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr class="text-center">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->user_role }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
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
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $('#table').DataTable({
            keys: true
        });

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