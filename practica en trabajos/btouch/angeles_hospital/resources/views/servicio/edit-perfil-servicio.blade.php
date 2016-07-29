@extends('template.main')
@section('title')
    @lang('auth.profile-service')
@stop
@section('content')


    <main>

        <section class="back_fix servicio" style=" background-image:url(/img/topservicios/11.jpg)"></section>

        <article class="doctor padding">

            {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_service','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $servicio->catservicioimage?>">
            <input type="hidden" name="idcatHospital" value="<?php echo $servicio->idcatHospital; ?>">
            <input type="hidden" name="idcatservicio" value="<?php echo $servicio->idcatservicio; ?>">
            <input type="file" name="catservicioimage" id="catservicioimage" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />
            {!! Form::close() !!}

            <div class="image_profile" style="/*background-image:url(<?php echo $servicio->srcImage['srcImage'] ?>)*/">
                <label id="label_img" for="catservicioimage">
                    <img id="img_input_profile_show " class="img_input_profile_show"  src="<?php echo $servicio->srcImage['srcImage']?>" alt="your image" width="100%" />
                    {{--<input type="file">--}}
                    <a href=""><i class="ion-edit edit edit_section"></i></a>
                </label>
            </div>

            <h1 class="editable" >
                <span id="service_name_show">
                    <?php echo $servicio->catservicioname; ?>
                </span>
                - <?php echo $servicio->catHospitalName; ?>
                <a href="#"><i id="pen_edit_name" class="ion-edit"></i></a>
                <div id="service_name_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_service','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="text" name="catservicioname" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($servicio->catservicioname))?$servicio->catservicioname:"" ?>">
                        <input type="hidden" name="idcatservicio" value="<?php echo $servicio->idcatservicio; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_service_name_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h1>

            <h2 class="editable">
                <span id="service_description_show">
                    <?php echo $servicio->catserviciodescription; ?>
                </span>
                <a href="#"><i id="pen_edit_description" class="ion-edit"></i></a>
                <div id="service_description_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_description_service','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="catserviciodescription" style="width: 100%" data-rule-required="true" data-rule-noSpecialCharts="true" value="<?php echo(isset($servicio->catserviciodescription))?$servicio->catserviciodescription:"" ?>">
                    <input type="hidden" name="idcatservicio" value="<?php echo $servicio->idcatservicio; ?>">
                    <input type="hidden" name="idcathospital" value="<?php echo $servicio->idcathospital; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_service_description_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>

            <div class="panel panel-default">
                <div class="panel-heading">Cuadro Médico <a href="#" id="pen_edit_cm" class="edit"><i class="ion-edit"></i></a></div>
                <div class="panel-body">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_cuadro_m_service','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="idcatservicio" value="<?php echo $servicio->idcatservicio; ?>">
                        <input type="hidden" name="idcathospital" value="<?php echo $servicio->idcathospital; ?>">
                            <?php
                                if($servicio->cuadroMedico!=false){
                                    foreach ($servicio->cuadroMedico as $ind=>$ca){
                            ?>

                                <p>
                                    <strong>Represetante del Servicio: </strong>
                                    <span><?php echo $ca->tblresponsableservicio ?></span>
                                    <input type="text" id="tblresponsableservicio"  name="tblresponsableservicio" data-rule-required="" data-rule-noSpecialCharts="true" class="form-control limitChar" placeholder="Represetante del Servicio"  value="<?php echo(isset( $ca->tblresponsableservicio))? $ca->tblresponsableservicio:"" ?>">
                                </p>
                                <p>
                                    <strong>Horario del Servicio: </strong>
                                    <span><?php echo $ca->tblhorarioservicio  ?></span>
                                    <input type="text" id="tblhorarioservicio"  name="tblhorarioservicio" data-rule-required="" class="form-control limitChar" placeholder="Horario del Servicio"  value="<?php echo(isset( $ca->tblhorarioservicio))? $ca->tblhorarioservicio:"" ?>">
                                </p>
                                <p>
                                    <strong>Teléfono (ext): </strong>
                                    <span><?php echo $ca->tbltelefonoservicio  ?>(<?php echo $ca->tblextservicio  ?>)</span>
                                    <input type="text" id="tbltelefonoservicio"  name="tbltelefonoservicio" data-rule-required="" class="form-control limitChar" placeholder="Teléfono"  value="<?php echo(isset( $ca->tbltelefonoservicio))? $ca->tbltelefonoservicio:"" ?>">
                                    <input type="text" id="tblextservicio"  name="tblextservicio" data-rule-required="" class="form-control limitChar" placeholder="ext"  value="<?php echo(isset( $ca->tblextservicio))? $ca->tblextservicio:"" ?>">
                                </p>
                            <?php
                                    }

                                }
                            ?>
                    {!! Form::close() !!}
                </div>
                <div class="panel-footer">
                    <button type="button" id="edit_section_service_cuadro_m_buttom" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Hospitales del servicio <a href="#" id="pen_edit_hs" class="edit"><i class="ion-edit"></i></a></div>
                <div class="panel-body">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_hospitales_s_service','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="hidden" name="idcatservicio" value="<?php echo $servicio->idcatservicio; ?>">
                        <input type="hidden" name="catserviciodescription" value="<?php echo $servicio->catserviciodescription; ?>">
                        <input type="hidden" name="catservicioname" value="<?php echo $servicio->catservicioname; ?>">
                            <?php
                                if($servicio->listaHospitales!=false){
                                    foreach ($servicio->listaHospitales as $ind=>$ca){
                            ?>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 container-fluid">
                                    <!--<strong>Represetante del Servicio: </strong>-->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <!--<span><?php echo $ca['catHospitalName'] ?></span>-->
                                        <label class="label_hs_check " for="idcathospital_<?php echo $ca['idcatHospital'] ?>"><?php echo $ca['catHospitalName'] ?></label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="checkbox" id="idcathospital_<?php echo $ca['idcatHospital'] ?>"  name="idcathospital[<?php echo $servicio->idcatservicio; ?>][]" class="form-control limitChar" <?php echo(isset( $ca['checked']))? $ca['checked']:"" ?>   value="<?php echo $ca['idcatHospital'] ?>">
                                        <input type="hidden" id="catSiglas_<?php echo $ca['idcatHospital'] ?>"  name="catSiglas[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar" <?php echo(isset( $ca['checked']))? $ca['checked']:"" ?>   value="<?php echo $ca['catSiglas'] ?>">
                                        <input type="hidden" id="catservicioimage_<?php echo $ca['idcatHospital'] ?>"  name="catservicioimage[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['catservicioimage']))? $ca['catservicioimage']:"" ?>">
                                        <input type="hidden" id="catservicioimagebanner_<?php echo $ca['idcatHospital'] ?>"  name="catservicioimagebanner[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['catservicioimagebanner']))? $ca['catservicioimagebanner']:"" ?>">
                                        <input type="hidden" id="tbltelefonoservicio_<?php echo $ca['idcatHospital'] ?>"  name="tbltelefonoservicio[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['tbltelefonoservicio']))? $ca['tbltelefonoservicio']:"" ?>">
                                        <input type="hidden" id="tblextservicio_<?php echo $ca['idcatHospital'] ?>"  name="tblextservicio[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['tblextservicio']))? $ca['tblextservicio']:"" ?>">
                                        <input type="hidden" id="tblresponsableservicio_<?php echo $ca['idcatHospital'] ?>"  name="tblresponsableservicio[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['tblresponsableservicio']))? $ca['tblresponsableservicio']:"" ?>">
                                        <input type="hidden" id="tblhorarioservicio_<?php echo $ca['idcatHospital'] ?>"  name="tblhorarioservicio[<?php echo $servicio->idcatservicio; ?>][<?php echo $ca['idcatHospital'] ?>]" class="form-control limitChar"  value="<?php echo(isset( $ca['tblhorarioservicio']))? $ca['tblhorarioservicio']:"" ?>">
                                    </div>

                                </div>
                            <?php
                                    }

                                }
                            ?>
                    {!! Form::close() !!}
                </div>
                <div class="panel-footer">
                    <button type="button" id="edit_section_service_hospitales_s_buttom" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                </div>
            </div>

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
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_service_crop','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span>@lang('auth.tittle-info-img-crop')</span><br>
                            @lang('auth.info-img-crop')
                        </div>
                        <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $servicio->catHospitalProfileImg?>">
                            <input type="hidden" name="idcatHospital" value="<?php echo $servicio->idcatHospital; ?>">
                            <div class="featured_image">
                                <img id="crop-change-img" src="" alt="" />
                            </div>
                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="edit_section_profile_crop_buttom_service" data-id-service="<?php echo $servicio->idcatservicio; ?>" data-id-hospital="<?php echo $servicio->idcatHospital; ?>" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@stop
