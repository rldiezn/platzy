@extends('template.main')
@section('title')
    @lang('auth.profile-hospital')
@stop
@section('content')

    <main>

        <section class="back_fix" style="background-image:url(/img/bg_hospital.jpg)"></section>

        <article class="doctor padding">

            {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $hospital->catHospitalProfileImg?>">
                <input type="hidden" name="idtblpaciente" value="<?php echo $hospital->idcatHospital; ?>">
                <input type="file" name="catHospitalProfileImg" id="catHospitalProfileImg" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />

            {!! Form::close() !!}

            <div class="image_profile" style="/*background-image:url(<?php echo $hospital->srcImage['srcImage'] ?>)*/">
                <label id="label_img" for="catHospitalProfileImg">
                    <img id="img_input_profile_show " class="img_input_profile_show"  src="<?php echo $hospital->srcImage['srcImage']?>" alt="your image" width="100%" />
                    {{--<input type="file">--}}
                    <a href=""><i class="ion-edit edit edit_section"></i></a>
                </label>
            </div>

            <h1 class="editable" >
                <span id="hospital_name_show">
                    <?php echo $hospital->catHospitalName ?>
                </span>
                <a href="#"><i id="pen_edit_name" class="ion-edit"></i></a>
                <div id="hospital_name_edit" class="hide">
                {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="catHospitalName" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($hospital->catHospitalName))?$hospital->catHospitalName:"" ?>">
                    <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_hospital_name_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h1>

            <h2 class="editable">
                <span id="hospital_address_show">
                    <?php echo $hospital->catHospitalAddress ?>
                </span>
                <a href="#"><i id="pen_edit_address" class="ion-edit"></i></a>
                <div id="hospital_address_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_address_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="text" name="catHospitalAddress" style="width: 80%;" data-rule-required="true" data-rule-noSpecialCharts="true" value="<?php echo(isset($hospital->catHospitalAddress))?$hospital->catHospitalAddress:"" ?>">
                        <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_hospital_address_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>
            <h2 class="editable">
                <i class="fa fa-phone urgencias "></i> Urgencias:
                <span id="hospital_turg_show">
                     <?php echo $hospital->catHospitalUrgencias ?>
                </span>
                <a href="#"><i id="pen_edit_turg" class="ion-edit"></i></a>
                <div id="hospital_turg_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_turg_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="text" name="catHospitalUrgencias" data-rule-required="true" data-rule-number="true" value="<?php echo(isset($hospital->catHospitalUrgencias))?$hospital->catHospitalUrgencias:"" ?>">
                        <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_hospital_turg_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>
            <h2 class="editable">
                <i class="fa fa-phone urgencias "></i> Télefono:
                <span id="hospital_tlfn_show">
                     <?php echo $hospital->catHospitalTelefono ?>
                </span>
                <a href="#"><i id="pen_edit_tlfn" class="ion-edit"></i></a>
                <div id="hospital_tlfn_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_tlfn_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="text" name="catHospitalTelefono" data-rule-required="true" data-rule-number="true" value="<?php echo(isset($hospital->catHospitalTelefono))?$hospital->catHospitalTelefono:"" ?>">
                        <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_hospital_tlfn_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>
            <h2 class="editable">
                <span id="hospital_description_show">
                    <?php echo $hospital->catHospitalDescription ?>
                </span>
                <a href="#"><i id="pen_edit_description" class="ion-edit"></i></a>
                <div id="hospital_description_edit" class="hide text-center">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_description_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="catHospitalDescription" style="width: 80%;" data-rule-required="true" data-rule-noSpecialCharts="true" value="<?php echo(isset($hospital->catHospitalDescription))?$hospital->catHospitalDescription:"" ?>">
                    <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                    {!! Form::close() !!}
                    <button type="button" id="edit_section_hospital_description_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
                </div>
            </h2>

            <h2 class="editable">

                <span id="hospital_geo_show">
                Latitud:
                     <?php echo $hospital->catHospitalLatitude ?><br>
                Latitud:
                     <?php echo $hospital->catHospitalLongitude ?>
                </span>
                <a href="#"><i id="pen_edit_geo" class="ion-edit"></i></a>
                <div id="hospital_geo_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_geo_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="catHospitalLatitude" data-rule-required="true"  value="<?php echo(isset($hospital->catHospitalLatitude))?$hospital->catHospitalLatitude:"" ?>">
                    <input type="text" name="catHospitalLongitude" data-rule-required="true" value="<?php echo(isset($hospital->catHospitalLongitude))?$hospital->catHospitalLongitude:"" ?>">
                    <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_hospital_geo_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>

            <div class="hide">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/hospital/directorio_medico/<?php echo $hospital->idcatHospital ?>">Directorio Médico</a></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/hospital/directorio_servicio/<?php echo $hospital->idcatHospital ?>">Servicios</a></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#">Paquetes y promociones</a></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#">Farmacias Ángeles</a></div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Tecnología</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Instalaciones</div>
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
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_hospital_crop','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <span>@lang('auth.tittle-info-img-crop')</span><br>
                            @lang('auth.info-img-crop')
                        </div>
                        <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $hospital->catHospitalProfileImg?>">
                            <input type="hidden" name="idcatHospital" value="<?php echo $hospital->idcatHospital; ?>">
                            <div class="featured_image">
                                <img id="crop-change-img" src="" alt="" />
                            </div>
                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="edit_section_profile_crop_buttom_hospital" data-id-hospital="<?php echo $hospital->idcatHospital; ?>" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
