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
                            <li class="breadcrumb-item active">Job Hiring</li>
                        </ol>
                        <h4 class="page-title">Job Hiring</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addJob" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">Add Job</button>
                                @include('modal.job')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header">
                                    <table id="table" class="table table-bordered dataTable no-footer table-striped ajax-jobs">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Job Title</th>
                                                <th># of Applicants</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Jobs::all() as $j)
                                            <tr class="text-center">
                                                <td>{{ $j->job_title }}</td>
                                                @forelse(App\Applications::selectRaw('count(job_id) as totalCount')->where('job_id', $j->id)->get() as $total)
                                                <td>{{ $total->totalCount }}</td>
                                                @empty
                                                <td>0</td>
                                                @endforelse
                                                <td>
                                                    @if ($j->status == 1)
                                                            <span class="badge badge-primary">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('jobs.edit', ['id'=>$j->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                    <a data-id="{{ $j->id }}" data-name="{{ $j->title }}" class="btn btn-xs btn-default btn-delete"><i class="text-danger mdi mdi-close-circle"></i></a>
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

        $("#summernote-editor").summernote({height:250,minHeight:null,maxHeight:null,focus:!1});

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
