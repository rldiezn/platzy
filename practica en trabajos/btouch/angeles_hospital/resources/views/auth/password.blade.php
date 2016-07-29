@extends('template.login-template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default login">
                    {{--<div class="panel-heading">Reset Password</div>--}}
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

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

                        <form class="form-horizontal" id="send_email_angeles" role="form" method="POST" action="/password/email">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h1>@lang('auth.forgot-password-title')</h1>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" data-rule-required="true" data-rule-emailCustom="true" value="{{ old('email') }}" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <button type="submit" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary">
                                        @lang('auth.send-password-reset')
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