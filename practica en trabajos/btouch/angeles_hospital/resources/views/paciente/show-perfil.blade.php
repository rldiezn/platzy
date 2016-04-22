@extends('template.main')
@section('title')
    @lang('auth.profile-patient')
@stop
@section('content')

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass container-fluid">

            <div id="container_img_profile" class="col-lg-3 col-md-4  col-sm-4 col-xs-4 z-index-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-4 col-xs-offset-4 z-index-1">
                {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

                <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $paciente[0]->tblpacienteimgprofile?>">
                <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">

                <input type="file" name="tblpacienteimgprofile" id="tblpacienteimgprofile" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />

                {!! Form::close() !!}
                <label id="label_img" for="tblpacienteimgprofile">
                    <img id="img_input_profile_show" class="img_input_profile_show"  src="<?php echo $paciente[0]->srcImage['srcImage']?>" alt="your image" width="100%" />
                    <p class="click_to_upload">@lang('auth.click_image')
                        <img id="" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                    </p>
                </label>
            </div>

            <div id="container_info_profile" class="col-lg-8 col-md-12 col-sm-12 col-xs-12 box z-index-1">
                <div class="form-group">
                    <div class="col-lg-9 col-md-9  col-sm-12 col-xs-12">
                        <div class="col-lg-7 col-md-7  col-sm-7 col-xs-8">
                            <h2>
                                <b>
                                    <div id="patient_name_show">
                                        <?php echo(isset($paciente[0]->tblpacientename))?$paciente[0]->tblpacientename. ' '.$paciente[0]->tblpacientepaterno.' '.$paciente[0]->tblpacientematerno:'' ; ?>
                                    </div>
                                </b>
                            </h2>
                            <div id="patient_name_edit" class="hide">
                                {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                                    <input type="text" name="tblpacientename" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientename))?$paciente[0]->tblpacientename:"" ?>">
                                    <input type="text" name="tblpacientepaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientepaterno))?$paciente[0]->tblpacientepaterno:"" ?>">
                                    <input type="text" name="tblpacientematerno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacientematerno))?$paciente[0]->tblpacientematerno:"" ?>">
                                    <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                                    <div class="form-group">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                            <button type="button" id="edit_section_patient_name_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1 pen-icon" >
                            <img id="edit_name_patient" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12  col-md-12 col-sm-9 col-xs-9">
                        <div id="patient_info_show">
                            <blockquote style="font-size: 12px">
                                <p>@lang('validation.attributes.RFC-label') <?php echo(isset($paciente[0]->tblpacienterfc))?$paciente[0]->tblpacienterfc:"" ?></p>
                                <p>@lang('validation.attributes.email-label') <?php echo($paciente[0]->tblpacienteemail)?$paciente[0]->tblpacienteemail:"" ?></p>
                                <p>@lang('validation.attributes.phone-label') <?php echo($paciente[0]->tbltelefonocel)?$paciente[0]->tbltelefonocel.' - '.$paciente[0]->tbltelefonootro:"" ?></p>
                            </blockquote>
                        </div>
                        <div id="patient_info_edit" class="hide">
                            {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_info_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                                <input type="text" name="tblpacienterfc" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tblpacienterfc))?$paciente[0]->tblpacienterfc:"" ?>">
                                <input type="text" name="tblpacienteemail" data-rule-required="true" data-rule-emailCustom="true" value="<?php echo(isset($paciente[0]->tblpacienteemail))?$paciente[0]->tblpacienteemail:"" ?>">
                                <input type="text" name="tbltelefonocel" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tbltelefonocel))?$paciente[0]->tbltelefonocel:"" ?>" placeholder="Telf.">
                                <input type="text" name="tbltelefonootro" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($paciente[0]->tbltelefonootro))?$paciente[0]->tbltelefonootro:"" ?>" placeholder="Telf." >
                                <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                                <input type="hidden" name="idtblcontacto" value="<?php echo $paciente[0]->idtblcontacto; ?>">
                                <div class="form-group">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                        <button type="button" id="edit_patient_section_info_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>

                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1 pen-icon" >
                    <img id="edit_info_patient" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                </div>
            </div>

        </div>

        <div id="sectionDireccionParticular" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass extracto-padding sectionPerfilClassMarginTop container">
            <div class="page-header style-header container  col-lg-12 col-md-12 col-sm-12 ol-md-12 col-xs-12 container">
                <div class="col-lg-11 col-md-11 col-sm-11 ol-md-11 col-xs-11 paddin_none">
                    <img src="/img/summary-icon copy.png" width="50px"> Dirección Particular
                </div>
                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" style="z-index:2">
                    <img id="edit_address_P" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div id="patient_address_P_show" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="justify-italic-paragraf">
                            "<?php echo(isset($paciente[0]->tblpacienteaddress))?$paciente[0]->tblpacienteaddress:"" ?>"
                        </p>

                    </div>

                    <div id="patient_address_P_edit" class="hide">
                        {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_address_P_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                        <input type="hidden" name="idtblcontacto" value="<?php echo $paciente[0]->idtblcontacto; ?>">
                        <textarea rows="3" id="tblpacienteaddress"  name="tblpacienteaddress" data-rule-required="true" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="@lang("auth.address-p")"><?php echo(isset($paciente[0]->tblpacienteaddress))?$paciente[0]->tblpacienteaddress:"" ?></textarea>
                        <div class="form-group">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                <button type="button" id="edit_section_patient_address_P_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>


        <div id="sectionDireccionFiscal" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass extracto-padding sectionPerfilClassMarginTop container" >
            <div class="page-header style-header container  col-lg-12 col-md-12 col-sm-12 ol-md-12 col-xs-12">
                <div class="col-lg-11 col-md-11 col-sm-11 ol-md-11 col-xs-11 paddin_none">
                    <img src="/img/summary-icon copy.png" width="50px"> Dirección Fiscal
                </div>
                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" style="z-index:2">
                    <?php
                        if($paciente[0]->tblpacientefiscal == ""){
                     ?>
                    <a  id="edit_address_F" style="text-decoration: none;">
                        <span class="glyphicon glyphicon-plus edit_section"></span>
                    </a>
                    <?php
                        }else{
                        ?>
                        <a  id="remove_address_F" style="text-decoration: none;color:red">
                            <span class="glyphicon glyphicon-remove edit_section"></span>
                        </a>
                        <img id="edit_address_F" class="edit edit_section" width="20" style="margin-top: -25%" src="{{url('/img/pencilforlinke.png')}}">
                        <?php
                        }
                        ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div id="patient_address_F_show" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="justify-italic-paragraf">
                            "<?php echo(isset($paciente[0]->tblpacientefiscal))?$paciente[0]->tblpacientefiscal:"" ?>"
                        </p>

                    </div>

                    <div id="patient_address_F_edit" class="hide">
                        {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_address_F_patient','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="idtblpaciente" value="<?php echo $paciente[0]->idtblpaciente; ?>">
                        <input type="hidden" name="idtblcontacto" value="<?php echo $paciente[0]->idtblcontacto; ?>">
                        <textarea rows="3" id="tblpacientefiscal"  name="tblpacientefiscal" data-rule-required="true" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="@lang("auth.address-f")"><?php echo(isset($paciente[0]->tblpacientefiscal))?$paciente[0]->tblpacientefiscal:"" ?></textarea>
                        <div class="form-group">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                <button type="button" id="edit_section_patient_address_F_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>


    </div>
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
