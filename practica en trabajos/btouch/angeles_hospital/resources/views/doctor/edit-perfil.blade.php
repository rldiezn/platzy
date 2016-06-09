@extends('template.main')
@section('title')
    Perfil Doctor
@stop
@section('main-title')
    <span>Perfil</span> Doctor
@stop
@section('content')
    <div id="a" class="background-img-profile">
        <img id="img_background_banner" src="/upload/doctores/<?php echo $doctor['infoLinkedin']->idtblDr?>/banner_img/<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
    </div>

    {{--{!! Form::model($doctor,['route'=>['login',$doctor['infoGeneral']->idtblDr],'method'=>'PUT','id'=>'form_perfil_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}--}}
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -7%">
        <div id="b" class="container-input-img-background-profile col-lg-12 col-md-12 col-sm-12 col-xs-12">
            {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_banne_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

                <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>">
                <input type="hidden" name="oldBannerImg" id="oldBannerImg" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
                <input type="hidden" name="oldCV" id="oldCV" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>">
                <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">

                <input type="file" name="tblLinkedInDrBannerImg" id="tblLinkedInDrBannerImg" accept="image/*" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" />
            <div class="editar_banner">
                <label for="tblLinkedInDrBannerImg"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<!--<svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" fill="#fff"/></svg> --><span>@lang('auth.choose_file')</span></label>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionGeneral" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass container">

            <div  id="section_linkedin_show" class="" >

                <div id="container_img_profile" class="col-lg-3 col-md-4  col-sm-4 col-xs-4 z-index-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-4 col-xs-offset-4 z-index-1">

                    <div style="position:absolute;left:-50px;" class="col-lg-12 col-md-12  col-sm-12 col-xs-">
                        {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>">
                            <input type="hidden" name="oldBannerImg" id="oldBannerImg" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
                            <input type="hidden" name="oldCV" id="oldCV" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>">
                            <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                            <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">

                            <input type="file" name="tblLinkedInDrImg" id="tblLinkedInDrImg" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />

                        {!! Form::close() !!}

                    </div>

                    <label id="label_img" for="tblLinkedInDrImg">
                        <img id="img_input_profile_show" class="img_input_profile_show"  src="<?php echo $doctor['infoLinkedin']->srcImage['srcImage']?>" alt="your image" width="100%" />
                        <p class="click_to_upload">@lang('auth.click_image')
                            <img id="" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                        </p>
                    </label>

                    {{--<div class="col-lg-12 col-md-12  col-sm-12 col-xs-1 pen-icon" >
                        <img id="edit_adress" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                    </div>--}}
                </div>

                <div id="container_info_profile" class="col-lg-8 col-md-12 col-sm-12 col-xs-12 box z-index-1">
                    <div class="form-group">
                        <div class="col-lg-9 col-md-9  col-sm-12 col-xs-12">
                            <div class="col-lg-7 col-md-7  col-sm-7 col-xs-8">
                                <h2>
                                    <b>
                                        <div id="doctor_name_show">
                                            <?php echo(isset($doctor['infoGeneral']->tblDoctorName))?$doctor['infoGeneral']->tblDoctorName:"" ?>
                                            <?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorPaterno:"" ?>
                                            <?php echo(isset($doctor['infoGeneral']->tblDoctorMaterno))?$doctor['infoGeneral']->tblDoctorMaterno:"" ?>
                                        </div>
                                    </b>
                                </h2>
                                <div id="doctor_name_edit" class="hide">
                                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                                        <input type="text" name="tblDoctorName" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorName))?$doctor['infoGeneral']->tblDoctorName:"" ?>">
                                        <input type="text" name="tblDoctorPaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorPaterno:"" ?>">
                                        <input type="text" name="tblDoctorMaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorMaterno))?$doctor['infoGeneral']->tblDoctorMaterno:"" ?>">
                                        <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                                        <div class="form-group">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                                <button type="submit" id="edit_section_name_buttom" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1 pen-icon" >
                                <img id="edit_name" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-9  col-md-12 col-sm-9 col-xs-9">
                            <div id="doctor_adress_show">
                                <blockquote style="font-size: 12px">
                                    <p><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrProfHead:"" ?></p>
                                    <p><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrAddress))?$doctor['infoLinkedin']->tblLinkedInDrAddress:"" ?>,<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrCountry))?$doctor['infoLinkedin']->tblLinkedInDrCountry:"" ?></p>
                                </blockquote>
                            </div>
                            <div id="doctor_adress_edit" class="hide">
                                {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_adress_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                                    <input type="text" name="tblLinkedInDrProfHead" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrProfHead:"" ?>">
                                    <input type="text" name="tblLinkedInDrAddress" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrAddress))?$doctor['infoLinkedin']->tblLinkedInDrAddress:"" ?>">
                                    <input type="text" name="tblLinkedInDrCountry" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrCountry))?$doctor['infoLinkedin']->tblLinkedInDrCountry:"" ?>">
                                    <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                                    <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">
                                    <div class="form-group">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                            <button type="submit" id="edit_section_adress_buttom" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1 pen-icon" >
                            <img id="edit_adress" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                        </div>
                    </div>


                    <br>
                    <br>
                    <div class="form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 label-info-show" >Actual:</div>
                        <div class="col-lg-9  col-md-9 col-sm-9 col-xs-8  menos-margin-left" >
                            <?php
                            if($doctor['infoLinkedin']['currentExperiences'] != false){
                                foreach($doctor['infoLinkedin']['currentExperiences'] as $ind=>$currentExperiences){
                                    if((count($doctor['infoLinkedin']['currentExperiences'])-1)==$ind){
                                        echo $currentExperiences['tblExperienceJobTitle'].' ';
                                    }else{
                                        echo $currentExperiences['tblExperienceJobTitle'].', ';
                                    }
                                }
                            }

                            ?>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 label-info-show" >Anterior:</div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 menos-margin-left" >
                            <?php
                            if($doctor['infoLinkedin']['oldExperiences'] != false){
                                foreach($doctor['infoLinkedin']['oldExperiences'] as $ind=>$oldExperiences){
                                    if((count($doctor['infoLinkedin']['oldExperiences'])-1)==$ind){
                                        echo $oldExperiences['tblExperienceJobTitle'].' ';
                                    }else{
                                        echo $oldExperiences['tblExperienceJobTitle'].', ';
                                    }
                                }
                            }

                            ?>
                        </div>
                        <div class="col-lg-3 col-md-3  col-sm-3 col-xs-4  label-info-show" >Educación:</div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 menos-margin-left" >
                            <?php echo (isset($doctor['infoEducation'][0]['tblEducationSchool'] ))?$doctor['infoEducation'][0]['tblEducationSchool'] :''?>
                        </div>
                    </div>
                    <?php
                    /*if(Auth::user()->role =="doctor"){*/
                    ?>
                            <!--<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a id="plus_curso" class="btn btn-info btn-xs " href="/doctor/<?php echo  $doctor['infoGeneral']->idtblDr ?>/edit">
                            <span class="glyphicon glyphicon-pencil"></span> Editar Perfil
                        </a>
                    </div>-->
                    <?php
                    /*}*/
                    ?>

                </div>

            </div>

            <div id="section_linkedin_edit" class="hide">
                {!! Form::model($doctor,['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_linkedin_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div id="container_img_profile" class="col-lg-4 col-md-5 z-index-1">
                        <div class="col-lg-1 over_edit">
                            <span class="glyphicon glyphicon-edit "></span>
                        </div>
                        <input type="file" name="tblLinkedInDrImg" id="tblLinkedInDrImg" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />
                        <label id="label_img" for="tblLinkedInDrImg"><figure><svg xmlns="http://www.w3.org/2000/svg" width="195" height="195" viewBox="0 0 50 50"><path d="M24.827,0C11.138,0,0.001,11.138,0.001,24.827c0,13.689,11.137,24.827,24.826,24.827    c13.688,0,24.826-11.138,24.826-24.827C49.653,11.138,38.517,0,24.827,0z M39.142,38.51c0-0.574,0-0.979,0-0.979    c0-3.386-3.912-4.621-6.006-5.517c-0.758-0.323-2.187-1.011-3.653-1.728c-0.495-0.242-0.941-0.887-0.997-1.438l-0.162-1.604    c1.122-1.045,2.133-2.5,2.304-4.122h0.253c0.398,0,0.773-0.298,0.832-0.663l0.397-2.453c0.053-0.524-0.442-0.842-0.843-0.842    c0.011-0.052,0.02-0.105,0.025-0.149c0.051-0.295,0.082-0.58,0.102-0.857c0.025-0.223,0.045-0.454,0.056-0.693    c0.042-1.158-0.154-2.171-0.479-2.738c-0.33-0.793-0.83-1.563-1.526-2.223c-1.939-1.836-4.188-2.551-6.106-1.075    c-1.306-0.226-2.858,0.371-3.979,1.684c-0.612,0.717-0.993,1.537-1.156,2.344c-0.146,0.503-0.243,1.112-0.267,1.771    c-0.026,0.733,0.046,1.404,0.181,1.947c-0.382,0.024-0.764,0.338-0.764,0.833l0.396,2.453c0.059,0.365,0.434,0.663,0.832,0.663    h0.227c0.36,1.754,1.292,3.194,2.323,4.198l-0.156,1.551c-0.056,0.55-0.502,1.193-0.998,1.438    c-1.418,0.692-2.815,1.358-3.651,1.703c-1.97,0.812-6.006,2.131-6.006,5.517v0.766c-3.288-3.541-5.316-8.266-5.316-13.467    c0-10.932,8.894-19.826,19.826-19.826c10.933,0,19.826,8.894,19.826,19.826C44.653,30.133,42.548,34.946,39.142,38.51z" fill="#31B0D5"/></svg></figure> <span>Foto de Perfil&hellip;</span></label>
                        <img id="img_input_profile" class=""  src="/upload/doctores/<?php echo $doctor['infoLinkedin']->idtblDr?>/profile_img/<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>" alt="your image" width="205" height="205" />
                    </div>

                    <div id="container_info_profile" class="col-lg-8 col-md-7 z-index-1">
                        <div class="form-group">
                            <label for="inputName" class="control-label col-lg-3 col-md-3">Nombre:</label>
                            <div class="col-lg-9 col-md-12">
                                <input type="name" name="tblDoctorName" id="tblDoctorName" class="form-control" placeholder="Nombre" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorName))?$doctor['infoGeneral']->tblDoctorName:"" ?>">
                                <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>">
                                <input type="hidden" name="oldBannerImg" id="oldBannerImg" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
                                <input type="hidden" name="oldCV" id="oldCV" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">@lang('validation.attributes.apellido_paterno')</label>
                            <div class="col-lg-9  col-md-12">
                                <input type="name" name="tblDoctorPaterno" id="tblDoctorPaterno" class="form-control" placeholder="@lang('validation.attributes.apellido_paterno')" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorPaterno:"" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">@lang('validation.attributes.apellido_materno')</label>
                            <div class="col-lg-9  col-md-12">
                                <input type="name" name="tblDoctorMaterno" id="tblDoctorMaterno" class="form-control" placeholder="@lang('validation.attributes.apellido_materno')" value="<?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorMaterno:"" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">Especalización:</label>
                            <div class="col-lg-9  col-md-12">
                                <input type="text" id="tblLinkedInDrProfHead"  name="tblLinkedInDrProfHead" class="form-control" placeholder="Especalización"  value="<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrProfHead:"" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">País:</label>
                            <div class="col-lg-9  col-md-12">
                                <input type="text" id="tblLinkedInDrCountry"  name="tblLinkedInDrCountry" class="form-control" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCountry ?>" placeholder="País">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDireccion" class="control-label col-lg-3 col-md-3 ">Dirección:</label>
                            <div class="col-lg-9  col-md-12">
                                <textarea rows="3" id="tblLinkedInDrAddress" name="tblLinkedInDrAddress" class="form-control limitChar" placeholder="Dirección"  ><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrAddress:"" ?></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10 col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                            <button type="button" id="edit_section_linkedin_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>


        </div>

        <div id="sectionExtracto" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass extracto-padding sectionPerfilClassMarginTop">
            <div class="page-header style-header col-lg-12 col-md-12 col-sm-12 ol-md-12 col-xs-12">
                <div class="col-lg-11 col-md-11 col-sm-11 ol-md-11 col-xs-11 paddin_none">
                    Extracto
                </div>
                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" style="z-index:2">
                    <img id="edit_summary" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                </div>
            </div>
            <div class="col-lg-12 container-fluid">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                        <div id="doctor_summary_show" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="justify-italic-paragraf">
                                "<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrSummary))?$doctor['infoLinkedin']->tblLinkedInDrSummary:"" ?>"
                            </p>
                        </div>
                        <div id="doctor_summary_edit" class="hide">
                            {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_summary_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                            <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                            <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">
                            <textarea rows="3" id="tblLinkedInDrSummary" data-rule-noSpecialCharts="true"   name="tblLinkedInDrSummary" class="form-control limitChar" placeholder="Extracto"><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrSummary))?$doctor['infoLinkedin']->tblLinkedInDrSummary:"" ?></textarea>
                                <div class="form-group">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                        <button type="submit" id="edit_section_summary_buttom" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionExperiencia" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass sectionPerfilClassMarginTop container-fluid">

            <div class="page-header style-header container-fluid">
                <div class="col-lg-10 col-md-8 col-sm-7 col-xs-7 ">Experiencia</div>
                <button type="button" id="plus_exp" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid">
                    <span class="glyphicon glyphicon-plus"></span> Añadir Experiencia
                </button>
            </div>

                <div id="clone_exp" class="col-lg-12 paddin_exp hide doctor_experience_add" >
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_save_experience_doctor_0','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                    <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-9"></h4>
                    <button type="button" id="remove_0" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-2 col-xs-2  remove_element boton_eliminar"
                            data-container-id="0"
                            data-container-id="0"
                            data-button-toactivate="#plus_exp"
                            data-idto-delete="">
                        <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                    </button>
                    <br><br>
                </div>
                <div class="form-group">
                    <label for="inputCargo_0" class="control-label col-lg-2">Cargo:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputCargo_0" name="tblExperienceJobTitle"  data-rule-required="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Cargo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputHospital_0" class="control-label col-lg-2">Hospital:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputHospital_0" name="tblExperienceCompany"  data-rule-required="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Hospital">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngreso_0" class="control-label col-lg-2">Fecha Ingreso:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngreso_0" name="tblExperienceStartDate"  data-rule-required="true" class="form-control datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFin_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFin_0" name="tblExperienceEndDate"  data-rule-required="true" class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_exp_0" name="tblExperienceCurrent" type="checkbox" value="S"> Actual.
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCargo_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCargo_0" name="tblExperienceDescriptionJob" data-rule-required="true"  data-rule-noSpecialCharts="true" class="form-control" placeholder="Descripción Cargo"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                    <div class="form-group">
                        <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                            <button type="submit" id="send_new_experience_0"
                                    data-loading-text="@lang('auth.buttom-loading-text')"
                                    data-form-new=""
                                    data-type-add="1"
                                    class="btn btn-primary edit_section_send_buttom send_new_item">@lang('auth.buttom-send')</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>

            <div id="space_clone_exp">
                <?php
                    foreach($doctor['infoExperience'] as $ind=>$infoExperience){
                ?>
                <div id="doctor_experience_show_<?php echo $infoExperience['idtblExperience'] ?>" class="doctor_experience_show container-fluid" style="position: relative">
                    <div id="clone_exp_<?php echo $infoExperience['idtblExperience'] ?>" class="col-lg-12 paddin_exp " >
                        <div class="form-group">
                            <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
                                <h4>
                                    <?php echo $infoExperience['tblExperienceJobTitle']?>
                                </h4>
                            </div>
                            <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" >
                                <img class="edit edit_section edit_section_dinamyc_buttom"
                                     data-container-show="#doctor_experience_show_<?php echo $infoExperience['idtblExperience'] ?>"
                                     data-container-edit="#doctor_experience_edit_<?php echo $infoExperience['idtblExperience'] ?>"
                                     data-id-edit="<?php echo $infoExperience['idtblExperience'] ?>"
                                     data-type-edit="1"
                                     data-class-show=".doctor_experience_show"
                                     data-class-edit=".doctor_experience_edit"
                                     width="20" src="{{url('/img/pencilforlinke.png')}}">
                            </div>
                            <div class="col-lg-10 col-md-11 col-sm-10 col-xs-10" style="margin-top: -10px">
                                <?php echo $infoExperience['tblExperienceCompany']?>
                            </div>
                            <div class="col-lg-10  col-md-11 col-sm-10 col-xs-10">
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartExp = new DateTime($infoExperience['tblExperienceStartDate']);
                                $dateEndExp = new DateTime($infoExperience['tblExperienceEndDate']);
                                ?>
                                <?php echo $dateStartExp->format('M-Y')?> - <?php echo ($infoExperience['tblExperienceCurrent']=='S')?"Actualidad": $dateEndExp->format('M-Y') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-paragraf">
                                <?php echo $infoExperience['tblExperienceDescriptionJob']?>
                            </div>
                        </div>


                    </div>
                </div>
                    <div id="modal_delete_exp_<?php echo $infoExperience['idtblExperience'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Alerta</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Seguro que desea eliminar este registro?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary remove_element" data-loading-text="Cargando..." data-container-modal="#modal_delete_exp_<?php echo $infoExperience['idtblExperience'] ?>" data-container-id="#clone_exp_<?php echo $infoExperience['idtblExperience'] ?>"  data-idto-delete="<?php echo $infoExperience['idtblExperience'] ?>" data-url-delete="1" >Aceptar</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <div id="doctor_experience_edit_<?php echo $infoExperience['idtblExperience'] ?>" class="hide doctor_experience_edit">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_experience_doctor_'.$infoExperience['idtblExperience'],'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div id="clone_exp_<?php echo $infoExperience['idtblExperience'] ?>" class="col-lg-12 paddin_exp" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                            <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-9"></h4>
                            <a id="remove_<?php echo $infoExperience['idtblExperience'] ?>" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-2 col-xs-2  boton_eliminar" data-toggle="modal" data-target="#modal_delete_exp_<?php echo $infoExperience['idtblExperience'] ?>"  >
                                <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                            </a>
                            <br><br>

                        </div>
                        <div class="form-group">
                            <label for="inputCargo_<?php echo $infoExperience['idtblExperience']?>" class="control-label col-lg-2">Cargo:</label>
                            <div class="col-lg-10">
                                <input type="text" id="inputCargo_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceJobTitle" data-rule-required="true"  data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo $infoExperience['tblExperienceJobTitle']?>" class="form-control" placeholder="Cargo">
                                <input type="hidden" id="idExp_<?php echo $infoExperience['idtblExperience']?>" name="idtblExperience" value="<?php echo $infoExperience['idtblExperience']?>" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputHospital_<?php echo $infoExperience['idtblExperience']?>" class="control-label col-lg-2">Hospital:</label>
                            <div class="col-lg-10">
                                <input type="text" id="inputHospital_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceCompany" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo $infoExperience['tblExperienceCompany']?>" class="form-control" placeholder="Hospital">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFechaIngreso_<?php echo $infoExperience['idtblExperience']?>" class="control-label col-lg-2">Fecha Ingreso:</label>
                            <div class="col-lg-3">
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartExp = new DateTime($infoExperience['tblExperienceStartDate']);
                                $dateEndExp = new DateTime($infoExperience['tblExperienceEndDate']);
                                ?>
                                <input type="text" id="inputFechaIngreso_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceStartDate"  data-rule-required="true" value="<?php echo $dateStartExp->format('Y-m')?>" class="form-control datepicker" placeholder="Fecha Ingreso">
                            </div>

                            <label for="inputFechaFin_<?php echo $infoExperience['idtblExperience']?>" class="control-label col-lg-2">Fecha Fin:</label>
                            <div class="col-lg-3">
                                <input type="text" id="inputFechaFin_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceEndDate"  data-rule-required="true" value="<?php echo ($infoExperience['tblExperienceCurrent']=='S')?date('Y-m'):$dateEndExp->format('Y-m') ?>" class="form-control  datepicker" placeholder="Fecha Fin">
                            </div>
                            <div class="col-lg-2">
                                <label class="checkbox-inline">
                                    <input id="actual_exp_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceCurrent" type="checkbox" value="S" <?php echo ($infoExperience['tblExperienceCurrent']=='S')?"checked":"" ?>> Actual.
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescripcionCargo_<?php echo $infoExperience['idtblExperience']?>" class="control-label col-lg-2">Descripción:</label>
                            <div class="col-lg-10">
                                <textarea rows="3" id="inputDescripcionCargo_<?php echo $infoExperience['idtblExperience']?>" name="tblExperienceDescriptionJob" data-rule-required="true" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="Descripción Cargo"><?php echo $infoExperience['tblExperienceDescriptionJob']?></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-9  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                <button type="submit" id=""
                                        data-loading-text="@lang('auth.buttom-loading-text')"
                                        data-container-show="#doctor_experience_show_<?php echo $infoExperience['idtblExperience'] ?>"
                                        data-container-edit="#doctor_experience_edit_<?php echo $infoExperience['idtblExperience'] ?>"
                                        data-id-edit="<?php echo $infoExperience['idtblExperience'] ?>"
                                        data-type-edit="1"
                                        class="btn btn-primary edit_section_send_buttom">@lang('auth.buttom-send')</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

        <div id="sectionEstudios" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass sectionPerfilClassMarginTop  container-fluid">
            <div class="page-header style-header container-fluid">
                <div class="col-lg-10 col-md-8 col-sm-7 col-xs-7 ">Estudios</div>
                <button  type="button" id="plus_est" class="btn btn-default btn-sm col-lg-2 col-md-4 col-sm-5 col-xs-5 boton_anadir">
                    <span class="glyphicon glyphicon-plus "></span> Añadir Estudio
                </button>

            </div>

            <div id="clone_est" class="col-lg-12 paddin_est hide doctor_education_add">
                {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_save_education_doctor_0','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                    <h4 class="col-lg-10 col-md-10 col-sm-9 col-xs-9"></h4>
                    <button type="button" id="remove_est_0" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-3 col-xs-3 remove_element boton_eliminar"
                            data-container-id="0"
                            data-container-id="0"
                            data-button-toactivate="#plus_est"
                            data-idto-delete="">
                        <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                    </button>
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="inputCarrera_0" class="control-label col-lg-2">Carrera:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputCarrera_0" name="tblEducationFieldOfStudy"  data-rule-required="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Carrera o título">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUniversidad_0" class="control-label col-lg-2">Universidad:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputUniversidad_0" name="tblEducationSchool"  data-rule-required="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Universidad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngresoUniv_0" class="control-label col-lg-2">Fecha Ingreso:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngresoUniv_0"  name="tblEducationStartDate"  data-rule-required="true" class="form-control  datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFinUniv_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFinUniv_0"  name="tblEducationEndDate"  data-rule-required="true"  class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <!--<div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_est_0" name="actual_est[]" type="checkbox" value="1"> Actual.
                        </label>
                    </div>-->
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCarrera_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCarrera_0" name="tblEducationDescription" data-rule-required="true"  data-rule-noSpecialCharts="true" class="form-control " placeholder="Descripción Carrera"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-9  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                        <button type="submit" id="send_new_education_0"
                                data-loading-text="@lang('auth.buttom-loading-text')"
                                data-form-new=""
                                data-type-add="2"
                                class="btn btn-primary edit_section_send_buttom send_new_item">@lang('auth.buttom-send')</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div id="space_clone_est" class="">
                <?php
                foreach($doctor['infoEducation'] as $ind=>$infoEducation){
                ?>
                    <div id="doctor_education_show_<?php echo $infoEducation['idtblEducation'] ?>" class="doctor_education_show " style="position: relative">
                        <div id="clone_est_<?php echo $infoEducation['idtblEducation'] ?>" class="col-lg-12 paddin_est container-fluid" >
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-10 col-sm-10 col-xs-10">
                                    <h4>
                                        <?php echo $infoEducation['tblEducationFieldOfStudy']?>
                                    </h4>
                                </div>
                                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" >
                                    <img class="edit edit_section edit_section_dinamyc_buttom"
                                         data-container-show="#doctor_education_show_<?php echo $infoEducation['idtblEducation'] ?>"
                                         data-container-edit="#doctor_education_edit_<?php echo $infoEducation['idtblEducation'] ?>"
                                         data-class-show=".doctor_education_show"
                                         data-class-edit=".doctor_education_edit"
                                         width="20" src="{{url('/img/pencilforlinke.png')}}">
                                </div>
                                <div class="col-lg-12 col-lg-10 col-sm-10 col-xs-10" style="margin-top: -10px">
                                    <?php echo $infoEducation['tblEducationSchool']?>
                                </div>
                                <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                    <?php
                                    setlocale(LC_TIME, 'de_DE.UTF-8');
                                    $dateStartEst = new DateTime($infoEducation['tblEducationStartDate']);
                                    $dateEndEst = new DateTime($infoEducation['tblEducationEndDate']);
                                    ?>
                                    <?php echo $dateStartEst->format('M-Y')?> - <?php echo ($infoEducation['tblEducationCurrent']==1)?"Actualidad":$dateEndEst->format('M-Y') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12 justify-paragraf">
                                    <?php echo $infoEducation['tblEducationDescription']?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="doctor_education_edit_<?php echo $infoEducation['idtblEducation'] ?>" class="doctor_education_edit hide  container-fluid" style="position: relative">
                        {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_education_doctor_'.$infoEducation['idtblEducation'],'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <div id="clone_est_<?php echo $infoEducation['idtblEducation'] ?>" class="col-lg-12 paddin_exp" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                                <h4 class="col-lg-10 col-md-10 col-sm-9 col-xs-9"></h4>
                                <a id="remove_est_<?php echo $infoEducation['idtblEducation'] ?>" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-3 col-xs-3 boton_eliminar" data-toggle="modal" data-target="#modal_delete_est_<?php echo $infoEducation['idtblEducation'] ?>" >
                                    <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                                </a>
                                <br><br>
                            </div>
                            <div id="modal_delete_est_<?php echo $infoEducation['idtblEducation'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Alerta</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que desea eliminar este registro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary remove_element" data-loading-text="Cargando..." data-container-modal="#modal_delete_est_<?php echo $infoEducation['idtblEducation'] ?>" data-container-id="#clone_est_<?php echo $infoEducation['idtblEducation'] ?>"  data-idto-delete="<?php echo $infoEducation['idtblEducation'] ?>" data-url-delete="2" >Aceptar</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="form-group">
                                <label for="inputCarrera_<?php echo $infoEducation['idtblEducation'] ?>" class="control-label col-lg-2">Carrera:</label>
                                <div class="col-lg-10">
                                    <input type="text" id="inputCarrera_<?php echo $infoEducation['idtblEducation'] ?>" name="tblEducationFieldOfStudy" data-rule-required="true"  data-rule-noSpecialChartsName="true" value="<?php echo $infoEducation['tblEducationFieldOfStudy'] ?>" class="form-control" placeholder="Carrera o título">
                                    <input type="hidden" id="idEst_<?php echo $infoEducation['idtblEducation'] ?>" name="idtblEducation" value="<?php echo $infoEducation['idtblEducation'] ?>" class="form-control" placeholder="Carrera o título">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUniversidad_<?php echo $infoEducation['idtblEducation'] ?>" class="control-label col-lg-2">Universidad:</label>
                                <div class="col-lg-10">
                                    <input type="text" id="inputUniversidad_<?php echo $infoEducation['idtblEducation'] ?>" name="tblEducationSchool" data-rule-required="true"  data-rule-noSpecialChartsName="true" value="<?php echo $infoEducation['tblEducationSchool'] ?>" class="form-control" placeholder="Universidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputFechaIngresoUniv_<?php echo $infoEducation['idtblEducation'] ?>" class="control-label col-lg-2">Fecha Ingreso:</label>
                                <div class="col-lg-3">
                                    <?php
                                    setlocale(LC_TIME, 'de_DE.UTF-8');
                                    $dateStartEst = new DateTime($infoEducation['tblEducationStartDate']);
                                    $dateEndEst = new DateTime($infoEducation['tblEducationEndDate']);
                                    ?>
                                    <input type="text" id="inputFechaIngresoUniv_<?php echo $infoEducation['idtblEducation'] ?>"  name="tblEducationStartDate"  data-rule-required="true"  value="<?php echo $dateStartEst->format('Y-m'); ?>" class="form-control  datepicker" placeholder="Fecha Ingreso">
                                </div>
                                <label for="inputFechaFinUniv_<?php echo $infoEducation['idtblEducation'] ?>"  data-rule-required="true" class="control-label col-lg-2">Fecha Fin:</label>
                                <div class="col-lg-3">
                                    <input type="text" id="inputFechaFinUniv_<?php echo $infoEducation['idtblEducation'] ?>"  name="tblEducationEndDate"  data-rule-required="true" value="<?php echo $dateEndEst->format('Y-m'); ?>"   class="form-control  datepicker" placeholder="Fecha Fin">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescripcionCarrera_<?php echo $infoEducation['idtblEducation'] ?>" class="control-label col-lg-2">Descripción:</label>
                                <div class="col-lg-10">
                                    <textarea rows="3" id="inputDescripcionCarrera_<?php echo $infoEducation['idtblEducation'] ?>" name="tblEducationDescription" data-rule-required="true"  data-rule-noSpecialCharts="true" class="form-control " placeholder="Descripción Carrera"><?php echo $infoEducation['tblEducationDescription'] ?></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-9  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                    <button type="submit" id=""
                                            data-loading-text="@lang('auth.buttom-loading-text')"
                                            data-container-show="#doctor_education_show_<?php echo $infoEducation['idtblEducation'] ?>"
                                            data-container-edit="#doctor_education_edit_<?php echo $infoEducation['idtblEducation'] ?>"
                                            data-id-edit="<?php echo $infoEducation['idtblEducation'] ?>"
                                            data-type-edit="2"
                                            class="btn btn-primary edit_section_send_buttom">@lang('auth.buttom-send')</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div id="sectionCourse" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass sectionPerfilClassMarginTop">
            <div class="page-header style-header container-fluid">
                <div class="col-lg-10 col-md-8 col-sm-7 col-xs-7  ">@lang('auth.title_courses')</div>
                <button  type="button" id="plus_curso" class="btn btn-default  col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir">
                    <span class="glyphicon glyphicon-plus"></span> Añadir Curso
                </button>
            </div>

            <div id="clone_curso" class="col-lg-12 paddin_est hide">
                {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_save_course_doctor_0','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                    <h4 class="col-lg-10 col-md-10 col-sm-9 col-xs-9"></h4>
                    <button  type="button" id="remove_curso_0" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-3 col-xs-3 remove_element boton_eliminar"
                             data-container-id="0"
                             data-button-toactivate="#plus_curso"
                             data-container-id="0" data-idto-delete="">
                        <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                    </button>
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="nombreCurso_0" class="control-label col-lg-2">@lang('auth.title_courses')</label>
                    <div class="col-lg-10">
                        <input type="text" id="nombreCurso_0" name="tblCoursesName" data-rule-required="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Curso">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputInstitucion_0" class="control-label col-lg-2">Institución:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputInstitucion_0" name="tblCoursesInstitution" data-rule-required="true"  data-rule-noSpecialChartsName="true"  data-rule-noSpecialChartsName="true" class="form-control" placeholder="Institucion">
                    </div>
                </div>
                <div class="form-group">
                    <label for="asociadoCon_0" class="control-label col-lg-2">Asociado con:</label>
                    <div class="col-lg-10">
                        <input type="text" id="asociadoCon_0" name="idtblExperience"  data-rule-noSpecialCharts="true" class="form-control" placeholder="Asociado con">
                        <span class="help-block">¿El curso fue financiado por alguna institución de su experiencia o fue inversión personal?</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngresoCurso_0" class="control-label col-lg-2">Fecha inicio:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngresoCurso_0"  name="tblCoursesDateInit"  data-rule-required="true" class="form-control  datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFinCurso_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFinCurso_0"  name="tblCoursesDateEnd"  data-rule-required="true"  class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <!--<div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_curso_0" name="actual_curso[]" type="checkbox" value="1"> Actual.
                        </label>
                    </div>-->
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCarrera_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCurso_0" name="tblCoursesDescription" data-rule-required="true"  data-rule-noSpecialCharts="true" class="form-control " placeholder="Descripción Curso"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-9  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                        <button type="submit" id="send_new_course_0"
                                data-loading-text="@lang('auth.buttom-loading-text')"
                                data-form-new=""
                                data-type-add="3"
                                class="btn btn-primary send_new_item">@lang('auth.buttom-send')</button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div id="space_clone_course">
                <?php
                foreach($doctor['infoCourse'] as $ind=>$infoCourse){?>
                    <div id="doctor_course_show_<?php echo $infoCourse['idtblCourses'] ?>" class="doctor_course_show">
                        <div id="clone_curso_<?php echo $infoCourse['idtblCourses'] ?>" class="col-lg-12 paddin_course container-fluid" >
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-10 col-sm-10 col-xs-10">
                                    <h4>
                                        <?php echo $infoCourse['tblCoursesName']?>
                                    </h4>
                                </div>
                                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" >
                                    <img class="edit edit_section edit_section_dinamyc_buttom"
                                         width="20"
                                         data-container-show="#doctor_course_show_<?php echo $infoCourse['idtblCourses'] ?>"
                                         data-container-edit="#doctor_course_edit_<?php echo $infoCourse['idtblCourses'] ?>"
                                         data-class-show=".doctor_course_show"
                                         data-class-edit=".doctor_course_edit"
                                         src="{{url('/img/pencilforlinke.png')}}">
                                </div>
                                <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: -10px">
                                    <?php echo $infoCourse['tblCoursesInstitution']?>
                                </div>
                                <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                    <?php echo $infoCourse['idtblExperience']?>
                                </div>
                                <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                    <?php
                                    setlocale(LC_TIME, 'de_DE.UTF-8');
                                    $dateStartCourse = new DateTime($infoCourse['tblCoursesDateInit']);
                                    $dateEndCourse = new DateTime($infoCourse['tblCoursesDateEnd']);
                                    ?>
                                    <?php echo $dateStartCourse->format('M-Y')?> - <?php echo ($infoCourse['tblCoursesCurrent']==1)?"Actualidad": $dateEndCourse->format('M-Y') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-10 col-sm-10 col-xs-10">
                                    <?php echo $infoCourse['tblCoursesDescription']?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="doctor_course_edit_<?php echo $infoCourse['idtblCourses'] ?>" class="doctor_course_edit hide">
                        {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_course_doctor_'.$infoCourse['idtblCourses'],'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <div id="clone_curso_<?php echo $infoCourse['idtblCourses'] ?>" class="col-lg-12 paddin_est">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xd-12 container-fluid paddin_none">
                                <h4 class="col-lg-10 col-md-10 col-sm-9 col-xs-9"></h4>
                                <a id="remove_curso_0" class="btn btn-danger btn-xs col-lg-2 col-md-2 col-sm-3 col-xs-3 boton_eliminar" data-toggle="modal" data-target="#modal_delete_course_<?php echo  $infoCourse['idtblCourses'] ?>">
                                    <span class="glyphicon glyphicon-remove"></span> @lang('auth.buttom-delete')
                                </a>
                                <br><br>
                            </div>

                            <div id="modal_delete_course_<?php echo $infoCourse['idtblCourses'] ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Alerta</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Seguro que desea eliminar este registro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary remove_element" data-loading-text="Cargando..." data-container-modal="#modal_delete_course_<?php echo $infoCourse['idtblCourses'] ?>" data-container-id="#clone_curso_<?php echo $infoCourse['idtblCourses'] ?>"  data-idto-delete="<?php echo $infoCourse['idtblCourses'] ?>" data-url-delete="3" >Aceptar</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="form-group">
                                <label for="nombreCurso_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">@lang('auth.title_courses')</label>
                                <div class="col-lg-10">
                                    <input type="text" id="nombreCurso_<?php echo $infoCourse['idtblCourses'] ?>" name="tblCoursesName" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo $infoCourse['tblCoursesName'] ?>" class="form-control" placeholder="Carrera o título">
                                    <input type="hidden" id="idCourse_<?php echo $infoCourse['idtblCourses'] ?>" name="idtblCourses" value="<?php echo $infoCourse['idtblCourses'] ?>" class="form-control" placeholder="Carrera o título">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputInstitucion_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">Institución:</label>
                                <div class="col-lg-10">
                                    <input type="text" id="inputInstitucion_<?php echo $infoCourse['idtblCourses'] ?>" name="tblCoursesInstitution" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo $infoCourse['tblCoursesInstitution'] ?>" class="form-control" placeholder="Institución">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="asociadoCon_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">Asociado con:</label>
                                <div class="col-lg-10">
                                    <input type="text" id="asociadoCon_<?php echo $infoCourse['idtblCourses'] ?>" name="idtblExperience" data-rule-noSpecialCharts="true" value="<?php echo $infoCourse['idtblExperience'] ?>" class="form-control"  placeholder="Asociado con">
                                    <span class="help-block">¿El curso fue financiado por alguna institución de su experiencia o fue inversión personal?</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartCourse = new DateTime($infoCourse['tblCoursesDateInit']);
                                $dateEndCourse = new DateTime($infoCourse['tblCoursesDateEnd'] );

                                ?>
                                <label for="inputFechaIngresoCurso_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">Fecha inicio:</label>
                                <div class="col-lg-3">
                                    <input type="text" id="inputFechaIngresoCurso_<?php echo $infoCourse['idtblCourses'] ?>"  name="tblCoursesDateInit" data-rule-required="true" value="<?php echo $dateStartCourse->format('Y-m'); ?>"  class="form-control  datepicker" placeholder="Fecha Ingreso">
                                </div>
                                <label for="inputFechaFinCurso_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">Fecha Fin:</label>
                                <div class="col-lg-3">
                                    <input type="text" id="inputFechaFinCurso_<?php echo $infoCourse['idtblCourses'] ?>"  name="tblCoursesDateEnd" data-rule-required="true" value="<?php echo $dateEndCourse->format('Y-m'); ?>"  class="form-control  datepicker" placeholder="Fecha Fin">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescripcionCarrera_<?php echo $infoCourse['idtblCourses'] ?>" class="control-label col-lg-2">Descripción:</label>
                                <div class="col-lg-10">
                                    <textarea rows="3" id="inputDescripcionCurso_<?php echo $infoCourse['idtblCourses'] ?>" name="tblCoursesDescription" data-rule-required="true" data-rule-noSpecialCharts="true" class="form-control " placeholder="Descripción Curso"><?php echo $infoCourse['tblCoursesDescription'] ?></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-9  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                                    <button type="submit" id=""
                                            data-loading-text="@lang('auth.buttom-loading-text')"
                                            data-container-show="#doctor_course_show_<?php echo $infoCourse['idtblCourses'] ?>"
                                            data-container-edit="#doctor_course_edit_<?php echo $infoCourse['idtblCourses'] ?>"
                                            data-id-edit="<?php echo $infoCourse['idtblCourses'] ?>"
                                            data-type-edit="3"
                                            class="btn btn-primary edit_section_send_buttom">@lang('auth.buttom-send')</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>


                <?php
                }
                ?>
            </div>
        </div>

        <div id="sectionCV" class="col-lg-12 col-md-11 col-sm-11 col-xs-12  sectionPerfilClass sectionPerfilClassMarginTop container">
            <div id="doctor_cv_show">
                <a class="btn btn-default btn-lg col-lg-4 col-md-4  col-sm-5 col-xs-5" target="<?php echo $doctor['infoLinkedin']->srcImage['targetCV']?>" <?php echo $doctor['infoLinkedin']->srcImage['srcCV']?>><span class="glyphicon glyphicon-list-alt"></span> <?php echo $doctor['infoLinkedin']->srcImage['msgCV']?></a>
                <div class="col-lg-1 col-md-1  col-sm-1 col-xs-1" >
                    <img id="edit_cv" class="edit edit_section" width="20" src="{{url('/img/pencilforlinke.png')}}">
                </div>
            </div>
            <div id="doctor_cv_edit" class="hide">
                {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_cv_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

                    <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>">
                    <input type="hidden" name="oldBannerImg" id="oldBannerImg" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
                    <input type="hidden" name="oldCV" id="oldCV" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>">
                    <input type="hidden" name="idtblDr" value="<?php echo $doctor['infoGeneral']->idtblDr; ?>">
                    <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">
                    <input type="file" name="tblLinkedInDrCV" id="tblLinkedInDrCV" accept="application/pdf" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
                    <label for="tblLinkedInDrCV"><span></span> <strong style="background-color: #a7a7a7"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" ><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> @lang('auth.upload_cv')</strong></label>
                    <div class="form-group">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                            <button type="button" id="edit_section_cv_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>



        </div>

        <!--<div id="sectionCV" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass">
            <a class="btn btn-default btn-lg" target="_blank" href="/upload/doctores/<?php echo $doctor['infoLinkedin']->idtblDr?>/cv/<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>"><span class="glyphicon glyphicon-list-alt"></span> Curriculum</a>
        </div>-->

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
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_crop','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span>@lang('auth.tittle-info-img-crop')</span><br>
                            @lang('auth.info-img-crop')
                        </div>
                        <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrImg?>">
                            <input type="hidden" name="oldBannerImg" id="oldBannerImg" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrBannerImg?>">
                            <input type="hidden" name="oldCV" id="oldCV" value="<?php echo $doctor['infoLinkedin']->tblLinkedInDrCV?>">
                            <input type="hidden" name="idtblLinkedInDr" value="<?php echo $doctor['infoLinkedin']->idtblLinkedInDr; ?>">
                            <div class="featured_image">
                                <img id="crop-change-img" src="" alt="" />
                            </div>
                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="edit_section_profile_crop_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="<?php echo $doctor['infoLinkedin']->idtblDr?>" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
