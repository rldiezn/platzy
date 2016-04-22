@extends('template.login-template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">@lang('auth.register_title')</div>--}}
                    <div class="panel-body">
                        @include('partials/errors')
                        <form class="form-horizontal" id="register_angeles" role="form" method="POST" action={{route('register')}}>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="text" class="form-control border-radio-none" name="rfc" data-rule-required="true" data-rule-rfc="true" value="{{ old('RFC') }}" placeholder="@lang('validation.attributes.RFC')">
                                </div>
                            </div>

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="text" class="form-control border-radio-none" name="name" id="name" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('name') }}" placeholder="@lang('validation.attributes.name')">
                                </div>
                            </div>

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="text" class="form-control border-radio-none" name="aPaterno" id="aPaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aPaterno') }}" placeholder="@lang('validation.attributes.apellido_paterno')">
                                </div>
                            </div>

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="text" class="form-control border-radio-none" name="aMaterno" id="aMaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aMaterno') }}" placeholder="@lang('validation.attributes.apellido_materno')">
                                </div>
                            </div>

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="email" class="form-control border-radio-none" name="email" id="email" data-rule-required="true" data-rule-emailCustom="true" value="{{ old('email') }}" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group margin-register ">
                                <div class="col-md-12">
                                    <input type="password" class="form-control border-radio-none" name="password" id="password" data-rule-required="true" data-rule-minlength="6" placeholder="@lang('validation.attributes.password')">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <input type="password" class="form-control border-radio-none" name="password_confirmation" id="password_confirmation" data-rule-required="true" data-rule-maxlength="6" data-rule-equalto="#password"  placeholder="@lang('validation.attributes.password_confirmation')">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12 border-radio-none">
                                        @lang('auth.register_button')
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-6">
                                <a class="forgot-link" href="{{route('login')}}">@lang('auth.back_login')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection