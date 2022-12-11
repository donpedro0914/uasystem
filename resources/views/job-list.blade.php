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
                            <div class="hiring-list mt-4">
                                <div class="text-separator">
                                    <div>
                                        <span>Our Openings</span>
                                    </div>
                                </div>
                                <p class="text-center">We have {{ $jobCount }} Open Positions</p>
                                <ul class="hiring">
                                    @foreach($jobs as $job)
                                    <li class="job">
                                        <div class="job-body">
                                            <a href="{{ route('jobs.info', ['id'=>$job->id]) }}">
                                                <h3>{{ $job->job_title }}</h3>
                                            </a>
                                            <span><b>{{ $job->company }}</b></span><br>
                                            <span>{{ $job->job_type }}</span>
                                        </div>
                                        <a href="{{ route('jobs.info', ['id'=>$job->id]) }}">
                                            <button class="btn btn-primary">Apply</button>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
