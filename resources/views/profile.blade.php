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
                            <h2>My Profile</h2>
                            <form method="post" action="{{ route('profile.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
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
                                            )
                                        @endphp
                                        {{ Form::select('gender', $option, $user->gender, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Date of birth</label>
                                        <input type="text" class="form-control" name="dob" value="{{ $user->dob }}" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Upload CV</label> @if(!empty($user->cv))<a target="_blank" href="{{ route('downloadcv', ['file' => $user->cv]) }}" download>{{ $user->cv }}</a> @endif
                                        <input type="file" name="cv" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <div class="clearfix text-right mt-3">
                                            <button type="submit" id="jobFormBtn" class="btn btn-success">
                                                Update Profile
                                            </button>
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
@endsection