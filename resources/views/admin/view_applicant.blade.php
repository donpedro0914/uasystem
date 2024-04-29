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
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                                            <input type="text" class="form-control" name="fname" value="{{ $user->name }}" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender</label>
                                            @php
                                                $option = array(
                                                    'm' => 'Male',
                                                    'f' => 'Female',
                                                );
                                            @endphp
                                            {{ Form::select('gender', $option, '$user->gender', ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of birth</label>
                                            <input type="text" class="form-control" name="dob" value="{{ $user->dob }}" >
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>CV</label> @if(!empty($user->cv))<a target="_blank" href="{{ route('downloadcv', ['file' => $user->cv]) }}" download>{{ $user->cv }}</a> @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4>History of Applications</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach($jobHistory as $jh)
                                        <tr>
                                            <td>{{ $jh->job_title }}</td>
                                            <td>{{ $jh->company }}</td>
                                            <td>{{ $jh->status }}</td>
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
@endsection