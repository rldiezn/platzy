@extends('template.main')
@section('title')
    @lang('auth.profile-service')
@stop
@section('content')
<!--    --><?php //echo '<pre>'; print_r($servicio[0]);exit; ?>


<main>

    <a href="/servicio/listadoServicios"><h1 class="title_section	 purple"><?php echo $servicio->catservicioname; ?> <small>Hospitales con este servicio</small></h1></a>

    <section class="padding">

        <div class="list-group list_ang">
            <?php
            if(count($servicio->hospitales)>0){
            foreach ($servicio->hospitales as $ind=>$hospital){
                if(isset($isDoctor['datos'][0]->role) && $isDoctor['datos'][0]->role == 'admin'){
                    $url="/servicio/editServicio/$hospital->idcatHospital/$servicio->idcatservicio";
                }else{
                    $url="/servicio/verServicio/$hospital->idcatHospital/$servicio->idcatservicio";
                }
            ?>
                <div class="list-group-item">
                    <a href="<?php echo $url ?>">
                        <img src="<?php echo $hospital->srcImageHospital['srcImage'] ?>" >
                        <h4 class="list-group-item-heading"><?php echo $hospital->catHospitalName ?></h4>
                        <p class="list-group-item-text">
                            <strong><?php echo $hospital->catHospitalAddress ?></strong>
                        </p>
                    </a>
                </div>

            <?php
            }
            }
            ?>

        </div>

    </section>

</main>




<form class="form-horizontal hide" id="form_perfil_doctor" method="POST">

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass">

            <div class="col-lg-3  col-md-4 col-sm-3">
                <img src="<?php echo $servicio->srcImage['srcImage'] ?>" class="show-profile-img" width="200" height="200" >
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
                <img src="<?php echo  $servicio->srcImage['srcImageBanner'] ?>" width="100%" >
            </div>

            <div id="container-banner" class=" col-lg-12 col-md-12 col-sm-12 paddin_none" >
                <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital">
                    <p><?php echo $servicio->catserviciodescription ?></p>
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                    <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                        <ul class="nav nav-tabs">
                            <li class="active" ><a data-toggle="tab" href="#servicios_tab">@lang('auth.hospitals')</a></li>
                            {{--<li class="active"><a data-toggle="tab" href="#directorio_tab" >@lang('auth.medical-chart-title')</a></li>--}}
                        </ul>

                        <div class="tab-content">
                            <div id="servicios_tab" class="tab-pane fade in active">
                                <ul class="list_tab_style">
                                    <?php
                                    if(count($servicio->hospitales)>0){
                                    foreach ($servicio->hospitales as $ind=>$hospital){
                                    ?>
                                    <a href="/servicio/verServicio/<?php echo $hospital->idcatHospital ?>/<?php echo $servicio->idcatservicio ?>">
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
                            <div id="directorio_tab" class="tab-pane fade in active hide">
                                <h4 class="font-cursiver ">@lang('auth.medical-chart-title') :</h4>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div>

</form>
@stop
