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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title"># of Jobs</h4>
                                <div class="mb-3 mt-4">
                                    <h2 class="font-weight-light">{{ $jobCount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title"># of Applicants</h4>
                                <div class="mb-3 mt-4">
                                    <h2 class="font-weight-light">{{ $applicants }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection