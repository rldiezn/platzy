@extends('template.main')

@section('content')
    <div id="result_search" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid"></div>
    <div id="result_search_not_found" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col-centered container-fluid"><span id="not_found" class="not_found hide">@lang('auth.not_found')</span></div>

    <main>
        <div class="mainWithImg">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none container_buscador">
                    <div class="col-lg-12 menuBox-container">
                        <a href="/doctor/verPerfil/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="menuBox">
                            <i class="icon-angeles-perfil blue"></i>
                            <strong class="blue">@lang('auth.my-profile-title')</strong>
                        <span>
                            @lang('auth.my-profile-home')
                        </span>
                        </a>
                        <a href="/doctor/listadoDoctores" class="menuBox">
                            <i class="icon-angeles-medicos cyan"></i>
                            <strong class="cyan">Médicos</strong>
                        <span>
                            @lang('auth.medic-home')
                        </span>
                        </a>
                        <a href="/hospital/listadoHospitales" class="menuBox">
                            <i class="icon-angeles-hospitales blue"></i>
                            <strong class="blue">Hospitales</strong>
                        <span>
                            @lang('auth.hospital-home')
                        </span>
                        </a>
                        <a href="/servicio/listadoServicios" class="menuBox">
                            <i class="icon-angeles-servicios purple"></i>
                            <strong class="purple">Servicios</strong>
                        <span>
                            @lang('auth.service-home')
                        </span>
                        </a>
                        <a href="#" class="menuBox">
                            <i class="icon-angeles-regalos purple2"></i>
                            <strong class="purple2">Flores y Regalos</strong>
                        <span>
                            @lang('auth.flowers-home')
                        </span>
                        </a>
                        <a href="#" class="menuBox">
                            <i class="icon-angeles-chat green"></i>
                            <strong class="green">Chat</strong>
                        <span>
                            @lang('auth.chat-home')
                        </span>
                        </a>
                        <a href="#" class="menuBox">
                            <i class="icon-angeles-chat green"></i>
                            <strong class="green">Video</strong>
                        <span>
                            @lang('auth.video-home')
                        </span>
                        </a>
                        <a href="/labores/laboresDoctor/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="menuBox">
                            <i class="icon-angeles-citas red"></i>
                            <strong class="red">Mi Agenda</strong>
                        <span>
                            @lang('auth.agend-home')
                        </span>
                        </a>
                        <a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="menuBox">
                            <i class="icon-angeles-historial orange"></i>
                            <strong class="orange">Pacientes</strong>
                        <span>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore
                        </span>
                        </a>
                        <a href="#" class="menuBox">
                            <i class="icon-angeles-notificaciones yellow"></i>
                            <strong class="yellow">Notificaciones</strong>
                        <span>
                            @lang('auth.notificaciones-med-home')
                        </span>
                        </a>
                        <a href="#" class="menuBox">
                            <i class="icon-angeles-ayuda blue"></i>
                            <strong class="blue">Servicio en línea</strong>
                        <span>
                            @lang('auth.services-online-home')
                        </span>
                        </a>

                    </div>



                </div>
            </div>

        </div>

    </main>

@endsection