@extends('layouts.app')

@section('content')
<section class="bg-account-pages">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-option">
                            <div class="col-12">
                                <a href="{{ route('register') }}" class="account-btn" >Apply for a job?</a>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('company.registration') }}" class="account-btn" >Want to be our partner?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center">
                                    <span>{{ HTML::image('img/ua-logo.png', 'UA', array('style' => 'height:100%')) }}</span>
                                </h2>
                            </div>
                            <div class="account-content">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress" class="font-weight-medium">Username</label>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="text" id="emailaddress" required="" placeholder="Enter your username">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="font-weight-medium">Password</label>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                        <a href="#" class="text-muted float-right"><small>Forgot your password?</small></a>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col-12">
                                            <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <p><a href="/">< back to homepage</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
