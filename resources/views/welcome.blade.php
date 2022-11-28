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
                            <div class="hiring-list mt-4 mb-4">
                                <h1 class="text-center">Our Openings</h1>
                                <p class="text-center">We have {{ $jobCount }} Open Positions</p>
                                <ul class="hiring">
                                    @foreach($jobs as $job)
                                    <li class="job">
                                        <div class="job-body">
                                            <a href="{{ route('jobs.info', ['id'=>$job->id]) }}">
                                                <h5>{{ $job->job_title }}</h5>
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
                                <h4 class="text-center"><a href="{{ route('job-hiring') }}">Show more</a></h4>
                            </div>
                            <div class="logo-container">
                                <h1 class="text-center">Our Partners</h1>
                                <div class="row">
                                    @foreach(App\User::where('role', 2)->where('status', 1)->get() as $l)
                                    <div class="col-md-3">
                                    {{ HTML::image('logo/'.$l->name.'/'.$l->logo, 'partners', array('width'=>'100%')) }}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection