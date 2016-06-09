@extends('template.main')
@section('title')
    @lang('auth.tittle_calendar_doctor')
@stop
@section('content')
    <div class="container-fluid paddin_none">
        <div class="agenda_angeles">

            <div class="col-lg-3 lateral_agenda">
                <div id="calendar-mini"></div>
                <div><h4><b>Agenda del Dr(a):</b> <?php echo  (isset($Labores[0]))? $Labores[0]->tblDoctorName.' '.$Labores[0]->tblDoctorPaterno.' '.$Labores[0]->tblDoctorMaterno:'Doctor Test'; ?></h4></div>
                <!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createEventModal"><i class="fa fa-plus fa-lg"></i> Nueva Cita</button>-->
                <!--<a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-history fa-lg"></i> Historial de Citas</button></a>-->
            </div>


            <div class="col-lg-9 vista_calendario">

                <div id="calendar"></div>

            </div>

        </div>
    </div>
    <!--Modal registrar cita-->
    <?php echo $modalAgenda ?>
    <!--Modal show resumen cita-->
    <?php echo $modalShowResumen ?>




@stop
