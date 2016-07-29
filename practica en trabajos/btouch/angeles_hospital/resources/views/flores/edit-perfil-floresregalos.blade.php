@extends('template.main')
@section('title')
    @lang('auth.profile-hospital')
@stop
@section('content')

    <main>

        <section class="back_fix" style="background-image:url(/img/bg_hospital.jpg)"></section>

        <article class="doctor padding">

            {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_edit_img_profile_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $flores->img_principal?>">
                <input type="hidden" name="idtblpaciente" value="<?php echo $flores->idfloresregalos; ?>">
                <input type="file" name="catHospitalProfileImg" id="catHospitalProfileImg" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />

            {!! Form::close() !!}

            <div class="image_profile" style="/*background-image:url(<?php echo $flores->srcImage['srcImage'] ?>)*/">
                <label id="label_img" for="">
                    <img id="img_input_profile_show " class="img_input_profile_show"  src="<?php echo $flores->srcImage['srcImage']?>" alt="your image" width="100%" />
                    {{--<input type="file">--}}
                    <a href="" class="hide"><i class="ion-edit edit edit_section "></i></a>
                </label>
            </div>

            <h1 class="editable" >
                <span id="fr_name_show">
                    <?php echo $flores->nombrefr ?>
                </span>
                <a href="#"><i id="pen_edit_name" class="ion-edit"></i></a>
                <div id="fr_name_edit" class="hide">
                {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_name_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="nombrefr" data-rule-required="true" data-rule-noSpecialChartsName="true" value="<?php echo(isset($flores->nombrefr))?$flores->nombrefr:"" ?>">
                    <input type="hidden" name="idfloresregalos" value="<?php echo $flores->idfloresregalos; ?>">
                {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_fr_name_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h1>

            <h2 class="editable">
                <span id="fr_price_show">
                    <?php echo $flores->precio ?> $
                </span>
                <a href="#"><i id="pen_edit_price" class="ion-edit"></i></a>
                <div id="fr_price_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_price_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <input type="text" name="precio" style="width: 80%;" data-rule-required="true" data-rule-noSpecialCharts="true" value="<?php echo(isset($flores->precio))?$flores->precio:"" ?>">
                        <input type="hidden" name="idfloresregalos" value="<?php echo $flores->idfloresregalos; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_fr_price_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>

            <h2 class="editable">
                <span id="fr_description_show">
                    <?php echo $flores->descripcion ?>
                </span>
                <a href="#"><i id="pen_edit_description" class="ion-edit"></i></a>
                <div id="fr_description_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_description_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <textarea type="text" name="descripcion" style="width: 80%;" rows="5" data-rule-required="true" ><?php echo(isset($flores->descripcion))?$flores->descripcion:"" ?></textarea>
                        <input type="hidden" name="idfloresregalos" value="<?php echo $flores->idfloresregalos; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_fr_description_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>

            <h2 class="editable">
                <span id="fr_send_show">
                    <?php echo $flores->condiciones_envio ?>
                </span>
                <a href="#"><i id="pen_edit_send" class="ion-edit"></i></a>
                <div id="fr_send_edit" class="hide text-center">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_send_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <!--<input type="text" name="condiciones_envio" style="width: 80%;" data-rule-required="true" data-rule-noSpecialCharts="true" value="<?php echo(isset($flores->condiciones_envio))?$flores->condiciones_envio:"" ?>">-->
                    <textarea type="text" name="condiciones_envio" style="width: 80%;" rows="5" data-rule-required="true" ><?php echo(isset($flores->condiciones_envio))?$flores->condiciones_envio:"" ?></textarea>
                    <input type="hidden" name="idfloresregalos" value="<?php echo $flores->idfloresregalos; ?>">
                    {!! Form::close() !!}
                    <button type="button" id="edit_section_fr_send_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
                </div>
            </h2>

            <h2 class="editable">
                <span id="fr_img_show">
                    <?php echo $flores->img_principal ?> $
                </span>
                <a href="#"><i id="pen_edit_img" class="ion-edit"></i></a>
                <div id="fr_img_edit" class="hide">
                    {!! Form::open(['route'=>['login',''],'method'=>'PUT','id'=>'form_edit_img_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="text" name="img_principal" style="width: 80%;" data-rule-required="true" value="<?php echo(isset($flores->img_principal))?$flores->img_principal:"" ?>">
                    <input type="hidden" name="idfloresregalos" value="<?php echo $flores->idfloresregalos; ?>">
                    {!! Form::close() !!}
                </div>
                <button type="button" id="edit_section_fr_img_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary hide">@lang('auth.buttom-send')</button>
            </h2>




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

                            <input type="hidden" name="oldImgProfile" id="oldImgProfile" value="<?php echo $flores->img_principal?>">
                            <input type="hidden" name="idcatHospital" value="<?php echo $flores->idfloresregalos; ?>">
                            <div class="featured_image">
                                <img id="crop-change-img" src="" alt="" />
                            </div>
                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="edit_section_profile_crop_buttom_hospital" data-id-hospital="<?php echo $flores->idfloresregalos; ?>" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
