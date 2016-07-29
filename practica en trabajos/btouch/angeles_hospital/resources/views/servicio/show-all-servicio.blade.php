@extends('template.main')
@section('title')
    @lang('auth.tittle_services_list')
@stop
@section('id-table-to-search')
    @lang('#service_list')
@stop
@section('content')

    <main>

        <h1 class="title_section	 purple">Servicios</h1>

        <section class="padding">
            <div class="container-fluid text-right" >
                <button type="button" id="plus_exp_hospital" data-toggle="modal" data-target="#modal_new_servicio" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid" style="float: right">
                    <span class="glyphicon glyphicon-plus"></span> Nuevo Servicio
                </button>
            </div>
            <div class="list-group list_ang" id="service_list">
                <?php
                foreach ($servicios as $ind=>$aServicio) {
                ?>
                    <div class="list-group-item">
                        <a data-toggle="none" data-target="#modal_hospbyserv_<?php echo $aServicio['idcatservicio'] ?>" href="/servicio/verServicioHospital/<?php echo $aServicio['idcatservicio'] ?>">
                            <img src="<?php echo $aServicio['srcImage'] ?>" >
                            <h4 class="list-group-item-heading"><?php echo $aServicio['catservicioname']; ?></h4>
                            <p class="list-group-item-text">
                                <strong><?php echo $aServicio['catserviciodescription']; ?></strong>
                            </p>
                        </a>
                    </div>
                    <div id="modal_hospbyserv_<?php echo $aServicio['idcatservicio'] ?>" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-body container-fluid">
                                    <div class="header-custom">
                                        Hospitales donde se encuentra el servicio
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="tittle-custom">
                                        Elige el hospital de tu preferencia
                                    </div>
                                    <br><br>
                                    <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 15px">
                                        <ul class="list_tab_style">
                                            <?php
                                            foreach ($aServicio['servicioHospitales'] as $ind=>$sa){
                                            ?>
                                            <a href='<?php echo "/servicio/verServicio/".$sa->idcatHospital."/".$sa->idcatservicio ?>'>
                                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    {{--<img src="{{url('img/iconhospital.png')}}" width="35px">--}}
                                                    <?php echo $sa->catHospitalName?>
                                                </li>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <!--<div id="map_<?php //echo $aHospitales['idcatHospital'] ?>" class="space_map" >

                                            </div>-->

                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php
                }
                ?>
            </div>
            <button type="button"
                    id="plus_info"
                    data-url="/servicio/listarServiciosLimit"
                    data-limit="50"
                    data-rows="50"
                    data-disabled="0"
                    data-id-table="#service_list"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>
        </section>

    </main>

    <div id="modal_new_servicio" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        Nuevo Servicio
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        Registre el nuevo Servicio
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_new_servicio','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>
                        </div>
                        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1  col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catservicioname"  id="catservicioname" data-rule-required="true" value="{{ old('catSiglas') }}" placeholder="Nombre del Servicio">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catserviciodescription"  id="catserviciodescription" data-rule-required="true" value="{{ old('catHospitalDescription') }}" placeholder="Descripción">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    Hospitales asociados al servicio
                                </div>
                            </div>
                            <div class="form-group container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none">
                                <?php
                                    foreach ($hospitales as $ind=>$h){
                                ?>

                                        <div class="container-fluid col-lg-4 col-md-4 col-sm-4 col-xs-4 paddin_none">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 paddin_none" style="padding-top: 10px">
                                                        <label for="idcathospital_<?php echo $h['idcatHospital'] ?>"><?php echo $h['catHospitalName'] ?></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 paddin_none">
                                                <input type="checkbox" class="form-control " name="idcathospital[]"  id="idcathospital_<?php echo $h['idcatHospital'] ?>" value="<?php echo $h['idcatHospital'] ?>" data-rule-required="true" >
                                                <input type="hidden" class="form-control " name="hospital[<?php echo $h['idcatHospital'] ?>]"  id="hospital_<?php echo $h['idcatHospital'] ?>" value="<?php echo $h['catSiglas'] ?>" data-rule-required="true" >
                                            </div>


                                        </div>

                                <?php
                                    }
                                ?>
                            </div>

                            <br>

                        </div>

                    </div>
                    <div id="success_servicio" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none hide">
                        <label class="label-success col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none text-center" style="color: #fff;">
                            Servicio registrado con exito!
                        </label>
                    </div>
                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="form_new_servicio_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_new_servicio" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
