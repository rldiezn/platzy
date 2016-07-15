@extends('template.main')
@section('title')
    @lang('auth.tittle_doctors_list')
@stop
@section('id-table-to-search')
    @lang('#doctor_list')
@stop
@section('content')


    <main>

        <h1 class="title_section	 cyan">Médicos</h1>

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

            <button type="button"
                    id="plus_info"
                    data-url="/doctor/listarDoctoresLimit"
                    data-hospital=""
                    data-especialidad=""
                    data-limit="50"
                    data-rows="50"
                    data-id-table="#doctor_list"
                    data-disabled="0"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir hide"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>
        </section>

    </main>


    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered hide">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.doctors')</b></h2></th>
                    </tr>
                </thead>
            </table>
            <table class="table" id="doctor_list">
                <?php
                foreach ($doctores as $ind=>$aDoctores) {
                ?>
                <tr>
                    <td>
                        <img class="img_profile_list" src="<?php echo $aDoctores['srcImage']?>" >
                    </td>
                    <td width="55%" class="text_aling_left" >
                        <h4>
                            <?php echo $aDoctores['tblDoctorName'] ?> <?php echo $aDoctores['tblDoctorPaterno'] ?> <?php echo $aDoctores['tblDoctorMaterno'] ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                            <span><?php echo $aDoctores['tblLinkedInDrProfHead'] ?></span><br>
                            <span><?php echo $aDoctores['catHospitalName'] ?></span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <a href='<?php echo "/doctor/verPerfil/".$aDoctores['idtblDr'] ?>'><img src="{{url('img/doctoricon.png')}}" width="22px"></a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
                            <!--<a href='<?php echo "/labores/laboresDoctorCalendario/".$aDoctores['idtblDr'] ?>'>-->
                            <a data-toggle="modal" data-target="#createEventModal_<?php echo $aDoctores['idtblDr'] ?>">
                                <i class="icono_espacio fa fa-calendar fa-lg"></i>
                            </a>
                            <!--Modal registrar cita-->
                            <?php echo $aDoctores['modalAgenda'] ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <img src="{{url('img/chaticondoc.png')}}" width="25px">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                           <img src="{{url('img/videocallicon.png')}}" width="25px">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-target="#modal_googlemaps_<?php echo $aDoctores['idcatHospital'] ?>" data-map-show="map_<?php echo $aDoctores['idcatHospital'] ?>" data-latitude="<?php echo $aDoctores['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aDoctores['catHospitalLongitude'] ?>" width="25px">
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



                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
{{--{!! $doctores['render() !!}--}}
            <button type="button"
                    id="plus_info"
                    data-url="/doctor/listarDoctoresLimit"
                    data-limit="50"
                    data-rows="50"
                    data-id-table="#doctor_list"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>
        </div>

    </div>
@stop
