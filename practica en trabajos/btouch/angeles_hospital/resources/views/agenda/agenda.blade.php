@extends('template.main')
@section('title')
    @lang('auth.tittle_calendar_doctor')
@stop
@section('content')

    <main>


        <div class="container-fluid paddin_none">
            <div class="agenda_angeles">

                <div class="col-lg-3 col-md-4 col-sm-5 lateral_agenda">

                    <div id="calendar-mini"></div>

                    <h1><i class="fa fa-th-list"></i> Opciones</h1>
                    <p class="confirmar"><i class="fa fa-circle"></i> Pendientes por confirmar</p>
                    <p class="cerrar"><i class="fa fa-circle"></i> Pendientes por cerrar</p>
                    <p class="vacaciones"><i class="fa fa-circle"></i> Vacaciones</p>
                    <a href="" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createEventModal"><i class="fa fa-plus fa-lg"></i> Nueva Cita</a>
                    <a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="btn btn-primary btn-block"><i class="fa fa-clipboard fa-lg"></i> Historial</a>
                    <a href="/doctor/configurar_agenda/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="btn btn-primary btn-block"><i class="fa fa-cog fa-lg"></i> Configuración de Agenda</a>
                </div>


                <div class="col-lg-9 col-md-8 col-sm-7 vista_calendario">

                    <div id="calendar"></div>

                </div>
            </div>
        </div>

    </main>




    <div class="container-fluid paddin_none hide">
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
<!--    --><?php //echo $modalAgenda ?>
    <!--Modal show resumen cita-->
<!--    --><?php //echo $modalShowResumen ?>

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
                                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-user"></i> Paciente</span>
                                    <input type="text" name="paciente" id="paciente" class="form-control" placeholder="" aria-describedby="basic-addon2" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon"><i class="fa fa-plus-square"></i> Síntoma</span>
                                    <input type="text" name="sintoma" id="sintoma" class="form-control" placeholder="ej: Dolor de estomago" aria-describedby="basic-addon">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i> Fecha</span>
                                    <input type="text" name="" id="fecha" class="form-control datepicker" placeholder="" aria-describedby="basic-addon3" readonly  required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon5"><i class="fa fa-clock-o"></i> Hora</span>
                                    <input type="text" name="" id="horaIn" class="form-control timepicker" placeholder="" aria-describedby="basic-addon5"  required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon8"><i class="fa fa-map-marker"></i> Lugar</span>
                                    <!--select name="" id="lugar"  aria-describedby="basic-addon8" class="form-control">
                                    </select-->
                                    <input type="text" name="" id="lugar" class="form-control" placeholder="" aria-describedby="basic-addon8" readonly  required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon8"><i class="fa fa-heartbeat"></i> Especialidad</span>
                                    <select name="servicio" id="especialidad" class="form-control" aria-describedby="basic-addon8"  required>
                                        <option>Radiología</option>
                                        <option>Oncología</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-medkit"></i> Servicio</span>
                                    <select name="servicio" id="servicio" class="form-control" aria-describedby="basic-addon4"  required>
                                        <option>Consulta Médica</option>
                                        <option>Rehabilitación</option>
                                        <option>Cirugía</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-info"></i>Descripción</span>
                                    <textarea name="" id="description" class="form-control" placeholder="" aria-describedby="basic-addon7"  required></textarea>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon9"><i class="fa fa-paperclip"></i> Ajuntar archivos</span>
                                    <input type="file" name="" id="archivos" class="form-control" placeholder="" aria-describedby="basic-addon9">
                                </div>

                            </div>
                        </div>
                        <div class="control-group">
                            <ul class="adjuntos"></ul>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div id="eventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3>Detalle de cita</h3>
                </div>
                <div class="modal-body">
                    <p class="confirmacion"></p>
                    <p class="sintoma"></p>
                    <p class="medicina">
                        <span class="especialidad"></span> -
                        <span class="servicio"></span>
                    </p>
                    <p class="fecha"></p>
                    <p class="hora">
                        <span class="inicio"></span> -
                        <span class="termino"></span>
                    </p>
                    <p class="lugar"></p>
                    <p class="descripcion"></p>

                    <ul class="adjuntos"></ul>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-square-o"></i> Confirmar cita</button>
                    <button type="submit" class="btn btn-primary" id="editar"><i class="fa fa-pencil"></i> Editar</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#cerrarCitaModal"><i class="fa fa-times-circle"></i> Cerrar cita</button>
                </div>
            </div>
        </div>
    </div>


    <div id="cerrarCitaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3>Cerrar cita</h3>
                </div>
                <div class="modal-body">
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon11"><i class="fa fa-user-md"></i> Diagnostico</span>
                            <textarea name="" id="diagnostico" class="form-control" placeholder="" aria-describedby="basic-addon11"  required></textarea>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon12"><i class="fa fa-medkit"></i> Tratamiento</span>
                            <textarea name="" id="tratamiento" class="form-control" placeholder="" aria-describedby="basic-addon12"  required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block btn-lg">Guardar</button>
                </div>
            </div>
        </div>
    </div>


@stop
