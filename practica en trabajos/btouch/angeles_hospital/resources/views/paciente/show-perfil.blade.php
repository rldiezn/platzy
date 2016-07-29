@extends('template.main')
@section('title')
    @lang('auth.profile-patient')
@stop
@section('content')

    <main>

        <section class="back_fix paciente"></section>

        <article class="doctor padding">
            {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $paciente[0]->tblpacienteimgprofile?>">
            <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
            <input type="file" name="tblpacienteimgprofile" id="tblpacienteimgprofile" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />

            {!! Form::close() !!}
            <div class="image_profile" style="/*background-image:url(<?php echo $paciente[0]->srcImage['srcImage']?>)*/">
                <label id="label_img" for="tblpacienteimgprofile">
                <img id="img_input_profile_show " class="img_input_profile_show"  src="<?php echo $paciente[0]->srcImage['srcImage']?>" alt="your image" width="100%" />
                {{--<input type="file">--}}
                <a href=""><i class="ion-edit edit edit_section"></i></a>
                </label>
            </div>

            <h1 class="editable">
                <span id="patient_name_show">
                    <?php echo(isset($paciente[0]->tblpacientename))?$paciente[0]->tblpacientename:"" ?>
                    <?php echo(isset($paciente[0]->tblpacientepaterno))?$paciente[0]->tblpacientepaterno:"" ?>
                    <?php echo(isset($paciente[0]->tblpacientematerno))?$paciente[0]->tblpacientematerno:"" ?>
                </span>
                <a href="#"><i id="pen_edit_name" class="ion-edit"></i></a>
                {{--<div id="patient_name_edit" class="">--}}
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="tblpacientename" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientename))?$paciente[0]->tblpacientename:"" ?>">
                    <input type="text" name="tblpacientepaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientepaterno))?$paciente[0]->tblpacientepaterno:"" ?>">
                    <input type="text" name="tblpacientematerno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientematerno))?$paciente[0]->tblpacientematerno:"" ?>">
                    <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                    {!! Form::close() !!}
                {{--</div>--}}
                <button type="button" id="edit_section_patient_name_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>

            </h1>



            <div class="panel panel-default">
                <div class="panel-heading">Datos <a href="#" class="edit"><i class="ion-edit"></i></a></div>
                <div class="panel-body">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_address_P_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                    <input type="hidden" name="idtblcontacto" value="<?php echo $paciente[0]->idtblcontacto; ?>">
                    <p>
                        <strong>Dirección</strong>
                        <span><?php echo(isset($paciente[0]->tblpacienteaddress))?$paciente[0]->tblpacienteaddress:"" ?></span>
                        <input type="text" id="tblpacienteaddress"  name="tblpacienteaddress" data-rule-required="" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="@lang("auth.address-p")"  value="<?php echo(isset($paciente[0]->tblpacienteaddress))?$paciente[0]->tblpacienteaddress:"" ?>">
                    </p>
                    <p>
                        <strong>Teléfono</strong>
                        <span><?php echo(isset($paciente[0]->tbltelefonootro))?$paciente[0]->tbltelefonootro:"" ?></span>
                        <input type="text" name="tbltelefonootro" data-rule-required="" data-rule-noSpecialChartsName="true" data-rule-number="true" data-rule-minlength="8" data-rule-maxlength="8" value="<?php echo(isset($paciente[0]->tbltelefonootro))?$paciente[0]->tbltelefonootro:"" ?>" placeholder="Telf." >
                    </p>
                    <p>
                        <strong>RFC</strong>
                        <span><?php echo(isset($paciente[0]->tblpacienterfc))?$paciente[0]->tblpacienterfc:"" ?></span>
                        <input type="text" name="tblpacienterfc" class="text-upper" data-rule-required=""  value="<?php echo(isset($paciente[0]->tblpacienterfc))?$paciente[0]->tblpacienterfc:"" ?>">
                    </p>
                    <p>
                        <strong>Celular</strong>
                        <span><?php echo(isset($paciente[0]->tbltelefonocel))?$paciente[0]->tbltelefonocel:"" ?></span>
                        <input type="text" name="tbltelefonocel" data-rule-required="" data-rule-noSpecialChartsName="true"data-rule-number="true" data-rule-minlength="10" data-rule-maxlength="10" value="<?php echo(isset($paciente[0]->tbltelefonocel))?$paciente[0]->tbltelefonocel:"" ?>" placeholder="Telf.">
                    </p>
                    {!! Form::close() !!}
                </div>
                <div class="panel-footer">
                    <button type="button" id="edit_section_patient_address_P_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Dirección Fiscal <i id="pen_close_fiscal" class="ion-close-round hide" style="font-size: 1.4em;position: absolute; right: 1%;color: #3373ba;cursor:pointer"></i><img id="edit_address_F" class="edit edit_section" width="17" style="position: absolute;right: 1%;" src="{{url('/img/pencilforlinke.png')}}"></div>
                <div class="panel-body">

                        <strong>Dirección</strong>
                        <div id="patient_address_F_show">
                            <span><?php echo(isset($paciente[0]->tblpacientefiscal))?$paciente[0]->tblpacientefiscal:"" ?></span>
                        </div>

                    <div id="patient_address_F_edit" class="hide">
                        {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_address_F_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                        <input type="hidden" name="idtblcontacto" value="<?php echo $paciente[0]->idtblcontacto; ?>">
                        <textarea rows="3" id="tblpacientefiscal"  name="tblpacientefiscal" data-rule-required="" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="@lang("auth.address-f")"><?php echo(isset($paciente[0]->tblpacientefiscal))?$paciente[0]->tblpacientefiscal:"" ?></textarea>
                        <!--<div class="form-group">
                            <div class="col-lg-offset-11 col-md-offset-11 col-sm-offset-11 col-xs-offset-11 col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                <button type="button" id="edit_section_patient_address_F_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                            </div>
                        </div>-->
                        {!! Form::close() !!}
                    </div>

                </div>
                <div id="footer_patient_address_F" class="panel-footer">
                    <button type="button" id="edit_section_patient_address_F_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                </div>
            </div>

            <a href="#" class="btn btn-block btn-primary hide" data-toggle="modal" data-target="#modalInfo">Añadir información</a>



        </article>

    </main>
    
    <div id="modal_profile_img" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        @lang('auth.click_image')
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        @lang('auth.tittle-custom-img-crop')
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_patient_crop','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span>@lang('auth.tittle-info-img-crop')</span><br>
                            @lang('auth.info-img-crop')
                        </div>
                        <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $paciente[0]->tblpacienteimgprofile?>">
                            <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                            <div class="featured_image">
                                <img id="crop-change-img" src="" alt="" />
                            </div>
                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="edit_section_profile_crop_buttom_patient" data-id-patient="<?php echo $paciente[0]->idtblpaciente; ?>" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
