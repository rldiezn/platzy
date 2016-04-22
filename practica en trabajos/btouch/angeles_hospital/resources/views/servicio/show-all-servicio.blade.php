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

                                $patron = explode(".", $aServicio['catservicioname']);
                                echo "".$patron[2];

                            ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list_country">
                            <span>Mexico</span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <a href='<?php echo "/servicio/verServicio/".$aServicio['idcatservicio'] ?>'><img src="{{url('img/iconhospital.png')}}" width="35px"></a>
                        </div>
                        {{--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <img src="{{url('img/locationicon.png')}}" width="35px">
                        </div>--}}

                    </td>
                </tr>
                <?php
                }
                ?>
            </table>

        </div>

    </div>
@stop
