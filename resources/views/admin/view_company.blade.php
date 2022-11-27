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
                        <li class="breadcrumb-item">Company</li>
                        <li class="breadcrumb-item active">{{ $company->name }}</li>
                        </ol>
                        <h4 class="page-title">{{ $company->name }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('company.update', ['id'=>$company->id]) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Company Name</label>
                                                    <input type="text" class='form-control' name='name' value="{{ $company->name }}" />
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Email</label>
                                                    <input type="text" class='form-control' name='email' value="{{ $company->email }}"/>
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" name='phone' value="{{ $company->phone }}">
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Status</label>
                                                    @php
                                                        $status = array(
                                                            '1' => 'Active',
                                                            '0' => 'Inactive',
                                                        )
                                                    @endphp
                                                    {{ Form::select('status', $status, $company->status, ['class' => 'form-control']) }}
                                                </div>
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <div class="clearfix text-right mt-3">
                                                        <button type="submit" id="jobFormBtn" class="btn btn-success">
                                                            Update Company
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-xs-12">
                                                    <label>Logo</label>
                                                    <input type="file" class="form-control" id="logo" name="logo">
                                                    @if($company->logo)
                                                    <div class="storeLogoPreview_container">
                                                        {{ HTML::image('logo/'.$company->name.'/'.$company->logo, $company->name, array('class' => '')) }}
                                                    </div>
                                                    @endif
                                                </div>
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