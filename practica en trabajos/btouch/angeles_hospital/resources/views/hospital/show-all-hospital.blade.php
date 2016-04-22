@extends('template.main')
@section('title')
    @lang('auth.tittle_hospitals_list')
@stop
@section('id-table-to-search')
    @lang('#hospital_list')
@stop
@section('content')
    @include('search-box')
    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.hospitals')</b></h2></th>
                    </tr>
                </thead>
            </table>
            <table class="table" id="hospital_list">

                <?php
                foreach ($hospitales as $ind=>$aHospitales) {
                ?>
                <tr>
                    <td>
                        <img class="img_profile_list_hospital" src="<?php echo $aHospitales['srcImage'] ?>">
                    </td>
                    <td width="60%" class="text_aling_left" >
                        <h4>
                            <?php echo $aHospitales['catHospitalName'] ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list_country">
                            <span>Mexico</span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <a href='<?php echo "/hospital/verHospital/".$aHospitales['idcatHospital'] ?>'><img src="{{url('img/iconhospital.png')}}" width="35px"></a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>" data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">
                                <!--<img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>"  data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">-->
                        </div>

                        <div id="modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <br><br>
                                        <div class="container">
                                            <?php
                                             $nameHospital=explode(" ", $aHospitales['catHospitalName']);
                                            ?>
                                                <div id="map_<?php echo $aHospitales['idcatHospital'] ?>" class="space_map" >

                                                </div>

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

        <br><br>

    </div>

@stop
