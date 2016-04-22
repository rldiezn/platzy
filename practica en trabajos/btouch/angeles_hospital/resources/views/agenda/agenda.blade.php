@extends('template.main')
@section('title')
    @lang('auth.tittle_calendar_doctor')
@stop
@section('content')
    <div class="container-fluid paddin_none">
        <div class="agenda_angeles">

            <div class="col-lg-3 lateral_agenda">

                <div id="calendar-mini"></div>

                <h1><i class="fa fa-th-list"></i> Opciones</h1>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createEventModal"><i class="fa fa-plus fa-lg"></i> Nueva Cita</button>
                <button type="button" class="btn btn-primary btn-block"><i class="fa fa-history fa-lg"></i> Historial de Citas</button>
            </div>


            <div class="col-lg-9 vista_calendario">

                <div id="calendar"></div>

            </div>

        </div>
    </div>

    <div id="createEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 id="myModalLabel1">Nueva cita</h3>
                </div>
                <div class="modal-body">
                    <form id="createAppointmentForm" class="form-horizontal">
                        <div class="control-group">

                            <div class="controls">

                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-bookmark"></i> Nombre</span>
                                    <input type="text" name="nombre" id="nombre" class="form-control" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" placeholder="" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar-o"></i> Fecha</span>
                                    <input type="text" name="" id="fecha" class="form-control" placeholder="" aria-describedby="basic-addon3">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon5"><i class="fa fa-clock-o"></i> Hora de inicio</span>
                                    <input type="text" name="" id="horaIn" class="form-control" placeholder="" aria-describedby="basic-addon5">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon6"><i class="fa fa-clock-o"></i> Hora de termino</span>
                                    <input type="text" name="" id="horaOut" class="form-control" placeholder="" aria-describedby="basic-addon6">
                                </div>

                            </div>
                        </div>
                        <div class="control-group">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </div>
        </div>
    </div>
@stop
