@extends('template.main')
@section('title')
    @lang('auth.profile-service')
@stop
@section('content')
<!--    --><?php //echo '<pre>'; print_r($servicio[0]);exit; ?>

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass">

            <div class="col-lg-3  col-md-4 col-sm-3">
                <img src="<?php echo  $servicio->srcImage['srcImage'] ?>" class="show-profile-img" width="200" height="200" >
            </div>

            <div class="col-lg-7  col-md-7 col-sm-12">
                <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h3><?php
                            /*$patron = explode(".", $servicio->catservicioname);
                            echo "".$patron[2];*/
                                echo $servicio->catservicioname;
                            ?></h3><span><?php echo $servicio->catHospitalName; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <blockquote style="font-size: 12px">
                            <p>
                            <?php
                                if(count($servicio->hospitales)>0 && isset($servicio->hospitales[0]->catunidadservicio)){
                                    echo $servicio->hospitales[0]->catunidadservicio;
                                }
                                    echo "Costo: $500 "
                            ?>
                                <i data-toggle="modal" data-target="#createEventModal_<?php echo $servicio->idcatservicio ?>" class="icono_espacio fa fa-calendar fa-lg"></i>
                                <?php echo $servicio->modalAgenda ?>

                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionBanner" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none" >

            <div class="col-lg-12 col-md-12 col-sm-12 top-image paddin_none">
                {{--<img src="/img/hospital2.jpg" width="100%" >--}}
                <img src="<?php echo  $servicio->srcImage['srcImageBanner'] ?>" width="100%" >
            </div>

            <div id="container-banner" class=" col-lg-12 col-md-12 col-sm-12 paddin_none" >
                <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital">
                    <p><?php echo $servicio->catserviciodescription ?></p>
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                    <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                        <ul class="nav nav-tabs">
                            {{--<li class="active" ><a data-toggle="tab" href="#servicios_tab">@lang('auth.hospitals')</a></li>--}}
                            <li class="active"><a data-toggle="tab" href="#directorio_tab" >@lang('auth.medical-chart-title')</a></li>
                            <li ><a data-toggle="tab" href="#mapa_tab" class="location"
                                    data-map-show="map_<?php echo $servicio->idcatHospital ?>"
                                    data-latitude="<?php echo $servicio->catHospitalLatitude ?>"
                                    data-target=""
                                    data-longitude="<?php echo $servicio->catHospitalLongitude ?>">@lang('auth.location-title')</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="servicios_tab" class="tab-pane fade hide">
                                <ul class="list_tab_style">
                                    <?php
                                    if(count($servicio->hospitales)>0){
                                    foreach ($servicio->hospitales as $ind=>$hospital){
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
                                <?php echo $servicio->tblserviciocuadrom ?>
                            </div>
                            <div id="mapa_tab" class="tab-pane fade in container-fluid">
                                <div id="map_<?php echo $servicio->idcatHospital ?>" class="space_map" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-40">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h4 class="font-cursiver">Sitio Web:</h4>
                        <div> www.btouch.com</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h4 class="font-cursiver">Año Fundacion:</h4>
                        <div>2015</div>
                    </div>
                </div>--}}

                {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ver_mas" style="position: absolute;bottom: 0px">
                    <p class="value_boton">Ver Mas</p>
                    <p id="ver_mas_value" class="value_boton" style="display: none">Ver Menos</p>
                </div>--}}

            </div>

        </div>

        <!--<div id="sectionPosts" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none">
            <div class="page-header" style="">
                <h4 class="">Actualizaciones recientes</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 container-post">
                <p>
                    <span class="hospital_span">Hospital Angeles</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor sagittis tortor, et consequat dolor.
                    Curabitur ultricies velit a tempor dignissim. Nullam nisi nunc, porttitor ac dolor nec, placerat euismod dui. Donec eu rhoncus nunc,
                    in congue lacus. Integer eu mollis orci. Integer felis nisi, tempor non blandit ac, lacinia sit amet orci. Etiam tempor sit amet neque et pretium.
                </p>
                <div class="col-lg-12 col-md-12 col-sm-12 container-image-post">
                    <img src="/img/HospitalAngelesAcoxpa.jpg">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 time-post">Hace 9 días</div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 container-post">
                <p>
                    <span class="hospital_span">Hospital Angeles</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor sagittis tortor, et consequat dolor.
                    Curabitur ultricies velit a tempor dignissim. Nullam nisi nunc, porttitor ac dolor nec, placerat euismod dui. Donec eu rhoncus nunc,
                    in congue lacus. Integer eu mollis orci. Integer felis nisi, tempor non blandit ac, lacinia sit amet orci. Etiam tempor sit amet neque et pretium.
                </p>
                <div class="col-lg-12 col-md-12 col-sm-12 container-image-post">
                    <img src="/img/Hospitales%20Angeles.jpg">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 time-post">Hace 20 días</div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 container-post">
                <p>
                    <span class="hospital_span">Hospital Angeles</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent porttitor sagittis tortor, et consequat dolor.
                    Curabitur ultricies velit a tempor dignissim. Nullam nisi nunc, porttitor ac dolor nec, placerat euismod dui. Donec eu rhoncus nunc,
                    in congue lacus. Integer eu mollis orci. Integer felis nisi, tempor non blandit ac, lacinia sit amet orci. Etiam tempor sit amet neque et pretium.
                </p>
                <div class="col-lg-12 col-md-12 col-sm-12 container-image-post">
                    <img src="/img/icon175x175.png">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 time-post">Hace 2 meses</div>
            </div>
        </div>-->

    </div>
@stop
