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
                            <li class="breadcrumb-item">Applicant</li>
                            <li class="breadcrumb-item active">{{ $application->name }}</li>
                        </ol>
                        <h4 class="page-title">Applicants</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="fname" value="{{ $application->name }}" readonly >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $application->email }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $application->phone }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $application->gender }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of birth</label>
                                            <input type="text" class="form-control" name="dob" value="{{ $application->dob }}" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Job Status</label>
                                            <input type="text" class="form-control" name="dob" value="{{ $application->jobstatus }}" readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>CV</label> @if(!empty($application->cv))<a target="_blank" href="{{ route('downloadcv', ['file' => $application->cv]) }}" download>{{ $application->cv }}</a> @endif
                                        </div>
                                    </div>
                                </form>
                                <div class="form-row">
                                    <div class="btn-group">
                                        @if(Auth::user()->user_role == 'marketing')
                                        <button class="btn btn-primary text-white approvebtn" data-id="{{ $application->id }}">Approve</button>
                                        <button class="btn btn-danger text-white rejectbtn" data-id="{{ $application->id }}">Reject</button>
                                        @endif
                                        @if(Auth::user()->role == 2)
                                        <button class="btn initialbtn" data-id="{{ $application->id }}">Initial Interview</button>
                                        <button class="btn btn-secondary exambtn" data-id="{{ $application->id }}">Exam</button>
                                        <button class="btn btn-success finalbtn" data-id="{{ $application->id }}">Final Interview</button>
                                        @endif
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