@extends('layouts.appfront')
@section('content')
    @include('global.front_topnav')
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                    {{ HTML::image('img/banner.png', 'UA', array('width'=>'100%')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <div class="info-container mt-4">
                                <div class="col-12">
                                    <h2>About the {{ $job->job_title }}</h2>
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Job Title:</span> {{ $job->job_title }}
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Company</span> {{ $job->company }}
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Job Type:</span> {{ $job->job_type }}
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Job Description:</span> {{ $job->job_description }}
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Job Responsibilities:</span> {{ $job->job_responsibilities }}
                                </div>
                                <div class="col-12">
                                    <span class="job_label">Job Requirements:</span> {{ $job->job_requiremnts }}
                                </div>
                            </div>
                            @auth
                            <div class="apply-btn-container">
                                <a><button data-id="{{ $job->id }}" data-user="{{ Auth::user()->id }}" class="apply-btn btn btn-primary">Apply Now</button></a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection