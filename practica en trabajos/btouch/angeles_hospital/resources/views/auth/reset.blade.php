@extends('template.login-template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default login">
                    {{--<div class="panel-heading">Reset Password</div>--}}
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>@lang('auth.whoops')</strong> @lang('auth.whoops-text')<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" id="reset_angeles" role="form" method="POST" action="/password/reset">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" id="email" data-rule-required="true" data-rule-emailCustom="true" value="{{ old('email') }}" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password" id="password" data-rule-required="true" data-rule-minlength="6" placeholder="@lang('validation.attributes.password')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password_confirmation" data-rule-required="true" data-rule-minlength="6" data-rule-equalto="#password"  id="password_confirmation" placeholder="@lang('validation.attributes.password_confirmation')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <button type="submit" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary">
                                        @lang('validation.attributes.reset_password_botton')
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
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