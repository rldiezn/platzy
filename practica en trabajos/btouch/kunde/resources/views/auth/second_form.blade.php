<div id="second" class="hide">
    <div class="register-box-body">
        <img id="second_next_buttom_register" src="/img/nextbutton.png" class="next_buttom_register" >
        <img id="second_previous_buttom_register" src="/img/previousbutton.png" class="previous_buttom_register" >
        <img id="first_next_buttom_register" src="/img/helpbutton.png" class="help_buttom_register_2" data-toggle="tooltip" data-placement="bottom" title="¿Podemos ayudarte?"  >
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>@lang("validation.messages.whoops")</strong> @lang("validation.messages.some-problems")<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" id="second_register_form" role="form" method="POST" action="{{route('register')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="nombrecliente" id="nombrecliente" value="">
                <input type="hidden" name="idcatcantidadempleados" id="idcatcantidadempleados" value="">
                <input type="hidden" name="tagsinput_select" id="tagsinput_select" value="">
                <input type="hidden" name="dominio" id="dominio" value="">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control border_input_login" name="name" id="name" data-rule-required="true" value="{{ old('name') }}" placeholder="@lang("placeholder.register-form.name")">
                    <span class="glyphicon  form-control-feedback"><img src="/img/nombreicon.png" width="30px" style="margin-top: -7px"> </span>
                </div>
                <div class="container-fluid padding_none col-lg-12 col-md-12 col-sm-12 col-xs-12 z-index-2" >
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none">
                        <div class="form-group has-feedback ">
                            <input type="text" class="form-control border_input_login" name="paterno" id="paterno" data-rule-required="true" value="{{ old('paterno') }}" placeholder="@lang("placeholder.register-form.lastname")">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control border_input_login" name="materno" id="materno" value="{{ old('materno') }}" placeholder="@lang("placeholder.register-form.second-lastname")">
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none" >
                        <input type="text" class="form-control border_input_login" name="puesto" id="puesto" data-rule-required="true" value="{{ old('puesto') }}" placeholder="@lang("placeholder.register-form.job-tittle")">
                        <span class="glyphicon  form-control-feedback"><img src="/img/nombreicon.png" width="30px" style="margin-top: -7px"> </span>
                    </div>
                </div>
                <div class="row form-group has-feedback container-fluid padding_none" style="position: relative">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none" >
                        <input type="text" class="form-control border_input_login" name="email" id="email" value="{{ old('email') }}"  data-rule-required="true" data-rule-emailCustom="true" placeholder="@lang("placeholder.register-form.email")">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div id="tu_dominio_empresarial" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none hide" style="padding-top: 6px;">

                    </div>
                </div>
                <div class="container-fluid padding_none col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none">
                        <div class="form-group has-feedback ">
                            <input type="password" class="form-control border_input_login" name="password" id="password"  data-rule-required="true" placeholder="@lang("placeholder.register-form.password")">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control border_input_login" name="password_confirmation" id="password_confirmation"  data-rule-required="true" data-rule-equalto="#password"  placeholder="@lang("placeholder.register-form.re-password")">
                        </div>
                    </div>
                </div>
                <div class="container-fluid padding_none col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="g-recaptcha" data-sitekey="6LdUnCITAAAAAHbiTlGgcenO36vl6SpIKCW4ycmy" data-callback="correctCaptcha" ></div>
                    <span id="errorCaptcha" class="errorCaptcha hide" ></span>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-8">
                        <label class="ios7-switch">
                            <input name="terminosCondiciones" id="terminosCondiciones" type="checkbox" >
                            <span></span>
                        </label>
                        @lang("labels.i-accept") <a href="" class="" data-toggle="modal" data-target="#terminos" >@lang("links.terms")</a>

                    </div><!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="" class="" data-toggle="modal" data-target="#leyes" >@lang("links.privacy-policy")</a>
                    </div><!-- /.col -->
                </div>
            </form>
        </div>

    </div>

    <div class="container-fluid padding_none container-progress-bar" >
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none">
            <img src="/img/undercircle.png" width="50px" style="margin-left: 8px" >
            <img src="/img/undercompanyicon.png" width="50px" >
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <img src="/img/underline.png" style="position: absolute;top: -19px;left: -96px;width: 301px;height: 95px" >
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img class="" src="/img/undercircle.png" width="50px" >
            <img class="" src="/img/underusericon.png" width="50px" >
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <img  class="" src="/img/underline.png" style="position: absolute;top: -19px;left: -86px;width: 288px;height: 95px" >
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img  class="opacity_register_under_icon" src="/img/undercircle.png" width="50px"  >
            <img  class="opacity_register_under_icon" src="/img/undergoalicon.png" width="50px" >
        </div>
    </div>
</div>