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
                            <li class="breadcrumb-item active">Applicants</li>
                        </ol>
                        <h4 class="page-title">Applicants</h4>
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
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\User::where('role', 1)->get() as $user)
                                            <tr class="text-center">
                                                <td><a href="{{ route('company.applicant.view', ['id'=>$user->id]) }}">{{ $user->name }}</a></td>
                                                <td><a href="{{ route('company.applicant.view', ['id'=>$user->id]) }}">{{ $user->phone }}</a></td>
                                                <td><a href="{{ route('company.applicant.view', ['id'=>$user->id]) }}">{{ $user->email }}</a></td>
                                                <td><a href="{{ route('company.applicant.view', ['id'=>$user->id]) }}">{{ $user->gender }}</a></td>
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