@extends('template.main')
@section('title')
    @lang('auth.profile-service')
@stop
@section('content')
<!--    --><?php //echo '<pre>'; print_r($servicio[0]);exit; ?>
<form class="form-horizontal" id="form_perfil_doctor" method="POST">

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass">

            <div class="col-lg-3  col-md-4 col-sm-3">
                <img src="<?php echo  $producto->srcImage['srcImage'] ?>" class="show-profile-img" width="200" height="200" >
            </div>

            <div class="col-lg-7  col-md-7 col-sm-12">
                <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h3><?php
                            /*$patron = explode(".", $servicio->catservicioname);
                            echo "".$patron[2];*/
                                echo $producto->productoname;
                            ?></h3><span><?php echo $producto->catHospitalName; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <blockquote style="font-size: 12px">
                            <p>
                            <?php
                                if(count($producto->hospitales)>0 && isset($producto->hospitales[0]->catunidadservicio)){
                                    echo $producto->hospitales[0]->catunidadservicio;
                                }
                                    echo "Costo: $500 "
                            ?><i class="icono_espacio fa fa-calendar fa-lg"></i>
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionBanner" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none" >

            <div class="col-lg-12 col-md-12 col-sm-12 top-image paddin_none">
                {{--<img src="/img/hospital2.jpg" width="100%" >--}}
                <img src="<?php echo  $producto->srcImage['srcImageBanner'] ?>" width="100%" >
            </div>

            <div id="container-banner" class=" col-lg-12 col-md-12 col-sm-12 paddin_none" >
                <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital">
                    <p><?php echo $producto->productodescripcion ?></p>
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                    <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                        <ul class="nav nav-tabs">
                            {{--<li class="active" ><a data-toggle="tab" href="#servicios_tab">@lang('auth.hospitals')</a></li>--}}
                            <li class="active"><a data-toggle="tab" href="#directorio_tab" >@lang('auth.medical-chart-title')</a></li>
                            <li ><a data-toggle="tab" href="#mapa_tab" class="location"
                                    data-map-show="map_<?php echo $producto->idcatHospital ?>"
                                    data-latitude="<?php echo $producto->catHospitalLatitude ?>"
                                    data-target=""
                                    data-longitude="<?php echo $producto->catHospitalLongitude ?>">@lang('auth.location-title')</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="servicios_tab" class="tab-pane fade hide">
                                <ul class="list_tab_style">
                                    <?php
                                    if(count($producto->hospitales)>0){
                                    foreach ($producto->hospitales as $ind=>$hospital){
                                    ?>
                                    <a href="/hospital/verHospital/<?php echo $hospital->idcatHospital ?>">
                                        <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div ><?php echo $hospital->catHospitalName ?></div>
                                        </li>
                                    </a>

                                    <?php
                                    }
                                    }else{
                                    ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3"></div>
                                    <?php
                                    }
                                    ?>
                                </ul>

                            </div>
                            <div id="directorio_tab" class="tab-pane fade in active">
                                <h4 class="font-cursiver ">@lang('auth.medical-chart-title') :</h4>
                            </div>
                            <div id="mapa_tab" class="tab-pane fade in container-fluid">
                                <div id="map_<?php echo $producto->idcatHospital ?>" class="space_map" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</form>
@stop
