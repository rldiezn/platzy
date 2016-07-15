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

            <div class="list-group list_ang" id="service_list">
                <?php
                foreach ($servicios as $ind=>$aServicio) {
                ?>
                    <div class="list-group-item">
                        <a data-toggle="none" data-target="#modal_hospbyserv_<?php echo $aServicio['idcatservicio'] ?>" href="/servicio/verServicioHospital/<?php echo $aServicio['idcatservicio'] ?>">
                            <img src="<?php echo $aServicio['srcImage'] ?>" >
                            <h4 class="list-group-item-heading"><?php echo $aServicio['catservicioname']; ?></h4>
                            <p class="list-group-item-text">
                                <strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</strong>
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

@stop
