@extends('template.login-template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default login">
                    {{--<div class="panel-heading">@lang('auth.register_title')</div>--}}
                    <div class="panel-body">
                        @include('partials/errors')
                        <form class="form-horizontal" id="register_angeles" role="form" method="POST" action={{route('register')}}>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h1>@lang('auth.register-title')</h1>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="rfc" data-rule-required="true" data-rule-rfc="true" value="{{ old('RFC') }}" placeholder="@lang('validation.attributes.RFC')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="name" id="name" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('name') }}" placeholder="@lang('validation.attributes.name')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="aPaterno" id="aPaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aPaterno') }}" placeholder="@lang('validation.attributes.apellido_paterno')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="aMaterno" id="aMaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aMaterno') }}" placeholder="@lang('validation.attributes.apellido_materno')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control " name="email" id="email" data-rule-required="true" data-rule-emailCustom="true" value="{{ old('email') }}" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control " name="password" id="password" data-rule-required="true" data-rule-minlength="6" placeholder="@lang('validation.attributes.password')">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <input type="password" class="form-control " name="password_confirmation" id="password_confirmation" data-rule-required="true" data-rule-maxlength="6" data-rule-equalto="#password"  placeholder="@lang('validation.attributes.password_confirmation')">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12 ">
                                        @lang('auth.login_button')
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <a class="forgot-link" href="{{route('login')}}">@lang('auth.back_login')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection