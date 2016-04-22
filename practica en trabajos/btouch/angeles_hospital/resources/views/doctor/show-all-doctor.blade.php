@extends('template.main')
@section('title')
    @lang('auth.tittle_doctors_list')
@stop
@section('id-table-to-search')
    @lang('#doctor_list')
@stop
@section('content')
    @include('search-box')

    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered">

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
                            <?php echo $aDoctores['tblDoctorName'] ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                            <span><?php echo $aDoctores['tblLinkedInDrCountry'] ?></span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <a href='<?php echo "/doctor/verPerfil/".$aDoctores["idtblDr"] ?>'><img src="{{url('img/doctoricon.png')}}" width="25px"></a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <img src="{{url('img/chaticondoc.png')}}" width="25px">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                           <img src="{{url('img/videocallicon.png')}}" width="25px">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
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
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </td>
                </tr>
                <?php
                }
                ?>
            </table>

        </div>

    </div>
@stop
