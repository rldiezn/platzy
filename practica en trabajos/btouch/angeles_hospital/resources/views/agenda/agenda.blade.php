@extends('template.main')
@section('title')
    @lang('auth.tittle_calendar_doctor')
@stop
@section('content')
    <div class="container-fluid paddin_none">
        <div class="agenda_angeles">

            <div class="col-lg-3 lateral_agenda">

                <div id="calendar-mini"></div>
                <!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createEventModal"><i class="fa fa-plus fa-lg"></i> Nueva Cita</button>-->
                <!--<a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-history fa-lg"></i> Historial de Citas</button></a>-->
            </div>


            <div class="col-lg-9 vista_calendario">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading_calendar">
                    <img class="col-lg-offset-2 col-lg-8 col-md-9 col-sm-0 col-xs-9" src="/img/LoadingCallendar.gif" style="height: 460px;" >
                </div>
                <div id="calendar"></div>

            </div>

        </div>
    </div>
    <!--Modal registrar cita-->
    <?php echo $modalAgenda ?>
    <!--Modal show resumen cita-->
    <?php echo $modalShowResumen ?>




@stop
