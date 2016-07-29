@extends('template.main')
@section('title')
    @lang('auth.tittle_doctors_list')
@stop
@section('id-table-to-search')
    @lang('#doctor_list')
@stop
@section('content')


    <main>

        <h1 class="title_section cyan">Médicos
            <button type="button" id="plus_exp_doctor" data-toggle="modal" data-target="#modal_new_doctor" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid" style="float: right">
                <span class="glyphicon glyphicon-plus"></span> Nuevo Médico
            </button>
        </h1>


        <section class="filtros_medicos">

            <div class="input-group">
                <span class="input-group-addon">Hospital</span>
                <select id="select_hospital" name="select_hospital" class="form-control" data-rule-required="true">
                    <option class="cyan" value="">Seleciona una opción</option>
                    <?php
                        foreach ($hospitales as $ind=>$h){
                    ?>
                    <option value="<?php echo $h['catSiglas'] ?>" class="cyan"><?php echo $h['catHospitalName'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon">Especialidad</span>
                <select id="select_especialidad" name="select_especialidad" class="form-control">
                    <option class="cyan" value="">Seleciona una opción</option>
                    <?php
/*                    foreach ($especialidades as $ind=>$e){
                    */?><!--
                    <option value="<?php /*echo $e->tblLinkedInDrProfHead */?>" class="cyan"><?php /*echo $e->tblLinkedInDrProfHead    */?></option>
                    --><?php
/*                    }
                    */?>
                </select>
            </div>
            <div class="input-group hide">
                <span class="input-group-addon">Título</span>
                <select class="form-control">
                    <option>Seleciona una opción</option>
                </select>
            </div>
            <button id="send_searching" class="btn btn-block" data-loading-text="@lang('auth.buttom-searching-text')">Buscar</button>
        </section>

        <section class="padding">

            <div class="list-group list_ang" id="doctor_list">
                <?php
                /*foreach ($doctores as $ind=>$aDoctores) {
                ?>
                    <div class="list-group-item">
                        <a href="<?php echo "/doctor/verPerfil/".$aDoctores['idtblDr'] ?>">
                            <img src="<?php echo $aDoctores['srcImage']?>" >
                            <h4 class="list-group-item-heading"><?php echo $aDoctores['tblDoctorName'] ?> <?php echo $aDoctores['tblDoctorPaterno'] ?> <?php echo $aDoctores['tblDoctorMaterno'] ?></h4>
                            <p class="list-group-item-text">
                                <strong><?php echo $aDoctores['tblLinkedInDrProfHead'] ?></strong>
                                <span><?php echo $aDoctores['catHospitalName'] ?></span>
                                <b>5.4 Km</b>
                            </p>
                        </a>
                        <div class="btn-group" role="group" aria-label="">
                            <a data-toggle="modal" data-target="#createEventModal_<?php echo $aDoctores['idtblDr'] ?>" class="btn btn-default hide"><i class="icono_espacio fa fa-calendar fa-lg" style="font-size: 17pt; position: absolute; top: 9px; left: 9px;"></i></a>
                            <a href="#" class="btn btn-default"><i class="icon-angeles-chat"></i></a>
                            <a href="#" class="btn btn-default"><i class="icon-angeles-video"></i></a>
                            <a href="#" class="btn btn-default"><i class="fa fa-map-marker" data-toggle="modal" data-target="#modal_googlemaps_<?php echo $aDoctores['idcatHospital'] ?>" data-map-show="map_<?php echo $aDoctores['idcatHospital'] ?>" data-latitude="<?php echo $aDoctores['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aDoctores['catHospitalLongitude'] ?>" ></i></a>
                        </div>
                        <div id="modal_googlemaps_<?php echo $aDoctores['idcatHospital'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <br><br>
                                        <div class="container">
                                            <div id="map_<?php echo $aDoctores['idcatHospital'] ?>" class="space_map" ></div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog --->
                        </div><!-- /.modal --->
                        <!--Modal registrar cita-->
                        <?php echo $aDoctores['modalAgenda'] ?>
                    </div>
                <?php
                }*/
                ?>

            </div>

        <!--<button type="button"
                    id="plus_info"
                    data-url="/doctor/listarDoctoresLimit"
                    data-hospital=""
                    data-especialidad=""
                    data-limit="50"
                    data-rows="50"
                    data-id-table="#doctor_list"
                    data-disabled=""
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir hide"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>-->
        </section>

    </main>

    <div id="modal_new_doctor" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        Nuevo Doctor
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        Registre el nuevo Doctor
                    </div>
                    @include('partials/errors')
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_new_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>
                        </div>
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select id="cathospital" name="cathospital" class="form-control" data-rule-required="true">
                                        <option value="">Seleciona una opción</option>
                                        <?php
                                        foreach ($hospitales as $ind=>$h){
                                        ?>
                                        <option value="<?php echo $h['catSiglas'] ?>" ><?php echo $h['catHospitalName'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="name" id="name" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('name') }}" placeholder="@lang('validation.attributes.name')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="aPaterno" id="aPaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aPaterno') }}" placeholder="@lang('validation.attributes.apellido_paterno')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="aMaterno" id="aMaterno" data-rule-required="true" data-rule-noSpecialChartsName="true" value="{{ old('aMaterno') }}" placeholder="@lang('validation.attributes.apellido_materno')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control " name="email" id="email" data-rule-required="true" data-rule-emailCustom="true" data-rule-emailUnique="true" value="{{ old('email') }}" placeholder="@lang('validation.attributes.email')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="tblLinkedInDrProfHead" id="tblLinkedInDrProfHead" data-rule-required="true" value="{{ old('tblLinkedInDrProfHead') }}" placeholder="Especialidad">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control " name="password" id="password" data-rule-required="true" data-rule-minlength="6" placeholder="@lang('validation.attributes.password')">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <input type="password" class="form-control " name="password_confirmation" id="password_confirmation" data-rule-required="true" data-rule-maxlength="6" data-rule-equalto="#password"  placeholder="@lang('validation.attributes.password_confirmation')">
                                </div>
                            </div>

                            <br>

                        </div>

                    </div>
                    <div id="success_doctor" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none hide">
                        <label class="label-success col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none text-center" style="color: #fff;">
                            Doctor registrado con exito!
                        </label>

                    </div>
                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="form_new_doctor_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_new_hospital" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
