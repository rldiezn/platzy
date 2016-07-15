<div id="first" class="">
    <div class="register-box-body">

        <img id="first_next_buttom_register" src="/img/nextbutton.png" class="next_buttom_register" >
        <img id="first_next_buttom_register" src="/img/helpbutton.png" class="help_buttom_register" class="help_buttom_register_2" data-toggle="tooltip" data-placement="bottom" title="¿Podemos ayudarte?" >
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
            <form class="form-horizontal" id="first_register_form" role="form" method="POST" action="{{route('register')}}">
                <div class="simple-chat-popup chat-menu-toggle hide">
                    <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                        <div style="width:100px">
                            <div class="semi-bold">David Nester</div>
                            <div class="message">Hey you there </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control border_input_login" name="nombrecliente" id="nombrecliente" data-rule-required="true" value="{{ old('nombrecliente') }}" placeholder="@lang("placeholder.register-form.client-name")">
                    <span class="glyphicon  form-control-feedback"><img src="/img/companynameicon.png" width="25px" style="margin-top: -7px"> </span>
                </div>
                <div class="form-group has-feedback">
                    <select name="idcatcantidadempleados" id="idcatcantidadempleados" class="form-control border_input_login"  data-rule-required="true">
                        <option value="">@lang("placeholder.register-form.amount-contributors")</option>
                        <?php
                        foreach ($catcantidadempleados as $ind=>$ce){
                        ?>
                        <option value="<?php echo $ce->idcatcantidadempleados ?>" ><?php echo $ce->catcantidadempleados ?></option>
                        <?php

                        }
                        ?>
                    </select>
                    <span class="glyphicon form-control-feedback"><img src="/img/colaboradoresicono.png" width="20px" style="margin-top: -7px"></span>
                </div>
                <div class="form-group has-feedback">
                    <p class="text-center">@lang("titles.other-country")&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="ios7-switch">
                            <input id="ios7-checkbox" type="checkbox" >
                            <span></span>
                        </label>
                    </p>


                </div>
                <div id="container_country" class="form-group has-feedback hide">
                    <input id="tagsinput_select" name="tagsinput_select" data-rule-required="true" class="tagsinput_select border_input_login col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none" type="text" value="" data-role="tagsinput" placeholder="@lang("placeholder.register-form.countries")">
                    <!--<select name="idcatpais" id="idcatpais" class="form-control border_input_login"  data-rule-required="true">
                            <option value="">País</option>
                            <?php
                    foreach ($catpais as $ind=>$cp){
                    ?>
                            <option value="<?php echo $cp->idcatpais ?>" ><?php echo $cp->pais ?></option>
                            <?php

                    }
                    ?>
                            </select>-->
                    <span class="glyphicon form-control-feedback"><img src="/img/paisesicon.png" width="30px" style="margin-top: -7px"></span>
                </div>
                <div class="form-group has-feedback hide">
                    <input type="text" class="form-control border_input_login" name="dominio" id="dominio" data-rule-required="true" data-rule-domaindName="true" data-rule-domainIsset="true" value="{{ old('dominio') }}" placeholder="@lang("placeholder.register-form.domaind")">
                    <span class="glyphicon glyphicon-globe form-control-feedback"></span>
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
            <img class="opacity_register_under_icon" src="/img/undercircle.png" width="50px" >
            <img class="opacity_register_under_icon" src="/img/underusericon.png" width="50px" >
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <img  class="opacity_register_under_icon" src="/img/underline.png" style="position: absolute;top: -19px;left: -86px;width: 288px;height: 95px" >
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img  class="opacity_register_under_icon" src="/img/undercircle.png" width="50px"  >
            <img  class="opacity_register_under_icon" src="/img/undergoalicon.png" width="50px" >
        </div>
    </div>
</div>