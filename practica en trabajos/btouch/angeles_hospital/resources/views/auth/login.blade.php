@extends('template.login-template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default login">
                    {{--<div class="panel-heading">@lang('auth.login_title')</div>--}}
                    <div class="panel-body">
                        <h1>@lang('auth.login-title')</h1>
                        @include('partials/errors')
                        <form class="form-horizontal" id="login_angeles" role="form" method="POST" action="{{route('login')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="email"  value="{{old('email')}}" class="form-control" data-rule-required="true" data-rule-emailCustom="true" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <input name="password" type="password" data-rule-required="true" class="form-control" placeholder="@lang('validation.attributes.password')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="col-md-12 col-md-12 col-sm-12 col-xs-12 btn btn-primary" >
                                        @lang('auth.login_button')
                                    </button>
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> @lang('auth.remember')
                                        </label>
                                    </div>
                                </div>
                            </div>--}}
                        </form>
                        <div class="row text-center">
                            <div class="col-md-6">
                                <a class="forgot-link" href="/password/email">@lang('auth.forgot_link')</a>
                            </div>
                            <div class="col-md-6">
                                <a class="forgot-link" href="{{route('register')}}">@lang('auth.register_link')</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection