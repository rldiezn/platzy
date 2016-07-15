@extends('template.login-template')

@section('content')

    <div class="login-box">
        <div class="login-box-body">
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @lang("validation.messages.some-problems")<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="login-box-msg">@lang("titles.title-login")</p>
                <form class="form-horizontal" role="form" method="POST" action="{{route('login')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="email" name="email" id="name" class="form-control" value="{{old('email')}}" placeholder="@lang("placeholder.common.email")">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" id=password"  class="form-control" placeholder="@lang("placeholder.common.password")">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 ">
                            <div class="checkbox icheck">
                                <label class="ios7-switch">
                                    <input id="ios7-checkbox" type="checkbox" >
                                    <span></span>@lang('labels.rememberme')
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 ">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('buttom.login')</button>
                        </div><!-- /.col -->
                    </div>
                </form>


                <div class="social-auth-links text-center">
                </div><!-- /.social-auth-links -->
                <div  class="row">
                    <div class="col-xs-8">
                        <a href="register" class=""> @lang('links.register')</a>
                    </div><!-- /.col -->
                </div>
                <a href="#" class="" ><div>@lang('links.forgot_pass')</div></a><br>
            </div>

        </div><!-- /.login-box-body -->
    </div>

@endsection