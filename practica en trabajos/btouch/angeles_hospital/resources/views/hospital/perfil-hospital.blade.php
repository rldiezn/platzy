@extends('template.main')
@section('title')
    @lang('auth.profile-hospital')
@stop
@section('content')

    <main>

        <section class="back_fix" style="background-image:url(/img/bg_hospital.jpg)"></section>

        <article class="hospital padding">

            <div class="image_profile" style="background-image:url(<?php echo $hospital->srcImage['srcImage'] ?>)"></div>

            <h1><?php echo $hospital->catHospitalName ?></h1>
            <h2><?php echo $hospital->catHospitalAddress ?></h2>
            <a class="urgencias"><i class="fa fa-phone urgencias"></i> Urgencias: <?php echo $hospital->catHospitalUrgencias ?></a>
            <p><?php echo $hospital->catHospitalDescription ?></p>


            <div class="panel panel-default">
                <div class="panel-heading"><a href="/hospital/directorio_medico/<?php echo $hospital->idcatHospital ?>">Directorio Médico</a></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/hospital/directorio_servicio/<?php echo $hospital->idcatHospital ?>">Servicios</a></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#">Paquetes y promociones</a></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#">Farmacias Ángeles</a></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Tecnología</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Instalaciones</div>
            </div>

        </article>

    </main>

@stop
