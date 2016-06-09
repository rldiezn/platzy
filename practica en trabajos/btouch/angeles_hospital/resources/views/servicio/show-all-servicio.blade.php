@extends('template.main')
@section('title')
    @lang('auth.tittle_services_list')
@stop
@section('id-table-to-search')
    @lang('#service_list')
@stop
@section('content')
    @include('search-box')
    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.services')</b></h2></th>
                    </tr>
                </thead>
            </table>
            <table class="table" id="service_list">

                <?php
                foreach ($servicios as $ind=>$aServicio) {
                ?>
                <tr>
                    <td>
                        <img class="img_profile_list_hospital" src="<?php echo $aServicio['srcImage'] ?>">
                    </td>
                    <td width="60%" class="text_aling_left" >
                        <h4>
                            <?php

                                /*$patron = explode(".", $aServicio['catservicioname']);
                                echo "".$patron[2];*/
                                echo $aServicio['catservicioname'];

                            ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list_country">
                            <span>Mexico</span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <a  data-toggle="modal" data-target="#modal_hospbyserv_<?php echo $aServicio['idcatservicio'] ?>"><img src="{{url('img/iconhospital.png')}}" width="35px"></a>
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

                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            <button type="button"
                    id="plus_info"
                    data-url="/servicio/listarServiciosLimit"
                    data-limit="50"
                    data-rows="50"
                    data-id-table="#service_list"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>
        </div>

    </div>
@stop
