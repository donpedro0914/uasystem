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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">UA System</a></li>
                        <li class="breadcrumb-item">Jobs</li>
                        <li class="breadcrumb-item active">{{ $job->job_title }}</li>
                        </ol>
                        <h4 class="page-title">{{ $job->job_title }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('jobs.update', ['id'=>$job->id]) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-8">
                                            <h5 class="col-12">Job Details</h5>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Job Title</label>
                                                    <input type="text" class='form-control' name='title' value="{{ $job->job_title }}" />
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Company</label>
                                                    <input type="text" class='form-control' name='company' value="{{ $job->company }}"/>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Job Description</label>
                                                    <textarea class="form-control" name='description'>{{ $job->job_description }}</textarea>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Job Responsibilities</label>
                                                    <textarea class="form-control" name='responsibilities'>{{ $job->job_responsibilities }}</textarea>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Job Requirements</label>
                                                    <textarea class="form-control" name='requiremnts'>{{ $job->job_requiremnts }}</textarea>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Job Status</label>
                                                    @php
                                                        $status = array(
                                                            '1' => 'Active',
                                                            '0' => 'Inactive',
                                                        )
                                                    @endphp
                                                    {{ Form::select('status', $status, $job->status, ['class' => 'form-control']) }}
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="clearfix text-right mt-3">
                                                        <button type="submit" id="jobFormBtn" class="btn btn-success">
                                                            Update Job
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 bg-dark">
                                            <div class="row">
                                                <h5 class="col-12 text-white">Applicants</h5>
                                                <ul>
                                                @foreach(App\Applications::where('job_id', $job->id)->get() as $user)
                                                    @foreach(App\User::where('id', $user->user_id)->get() as $u)
                                                        <li><a href="{{ route('company.applicant.view', ['id'=>$user->id]) }}">{{ $u->name }}</a></li>
                                                    @endforeach
                                                @endforeach
                                                </ul>
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