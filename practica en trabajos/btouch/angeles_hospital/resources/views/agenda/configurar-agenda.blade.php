@extends('template.main')
@section('title')
    @lang('auth.tittle_calendar_doctor')
@stop
@section('content')

    <main>

        <div class="agenda_angeles">

            <div class="col-lg-3 col-md-4 col-sm-5 lateral_agenda">

                <div id="calendar-mini"></div>

                <h1><i class="fa fa-th-list"></i> Opciones</h1>
                <a href="/labores/laboresDoctor/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="btn btn-primary btn-block"><i class="fa fa-calendar fa-lg"></i> Agenda</a>
                <a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>" class="btn btn-primary btn-block"><i class="fa fa-clipboard fa-lg"></i> Historial</a>
            </div>


            <div class="col-lg-9 col-md-8 col-sm-7 vista_calendario configuracion">

                <h1>Configuración de agenda</h1>

                <div class="panel panel-default admin_hospitales hide">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administar hospitales y horarios</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="createAppointmentForm" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon"><i class="fa fa-hospital-o"></i> Hospital</span>
                                                <input type="text" name="hospital" id="hospital" class="form-control" placeholder="" aria-describedby="basic-addon" value="Hospital Ángeles Clínica Londres">
                                            </div>
                                            <div class="list-group-item-divider">
                                                <h3>Dias de la semana</h3>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Domingo
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked> Lunes
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked> Martes
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked> Miércoles
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Jueves
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Viernes
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Sábado
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="checkbox dias">
                                                <label>
                                                    <input type="checkbox"> Elegir horarios por día:
                                                </label>
                                            </div>


                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-clock-o"></i> Desde:</span>
                                                <input type="text" name="desde" id="desde" class="form-control timepicker" placeholder="" value="9:00 AM" aria-describedby="basic-addon2">
                                            </div>
                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon3"><i class="fa fa-clock-o"></i> Hasta:</span>
                                                <input type="text" name="hasta" id="hasta" class="form-control timepicker" placeholder="" value="02:00 PM" aria-describedby="basic-addon3">
                                            </div>

                                            <section class="dias-horas">
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Domingo:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon5">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon5">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Lunes:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon6">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon6">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Martes:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon7">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon7">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Míercoles:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon8">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon8">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Jueves:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon9">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon9">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Viernes:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon10">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon10">
                                                </div>
                                                <div class="input-group dia-horas">
                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-clock-o"></i> Sábado:</span>
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Desde:" aria-describedby="basic-addon11">
                                                    <input type="text" name="" id="" class="form-control timepicker" placeholder="Hasta:" aria-describedby="basic-addon11">
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-block">Guardar</button>
                            </div>
                        </div>


                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary">Añadir otro hospital</button>
                    </div>
                </div>

                <div class="panel panel-default admin_hospitales ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administar asistentes médicos</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon12"><i class="fa fa-user"></i> Nombre:</span>
                                                <input type="text" name="" id="" class="form-control " placeholder="" aria-describedby="basic-addon12">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon13"><i class="fa fa-calendar-o"></i> Contraseña:</span>
                                                <input type="password" name="" id="" class="form-control " placeholder="" aria-describedby="basic-addon13">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary">Añadir otro asistente</button>
                    </div>
                </div>


                <div class="panel panel-default admin_hospitales hide">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administar periodo vacacional</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon12"><i class="fa fa-calendar-o"></i> Desde:</span>
                                                <input type="text" name="desde" id="desde" class="form-control datepicker" placeholder="" aria-describedby="basic-addon12">
                                            </div>
                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon13"><i class="fa fa-calendar-o"></i> Hasta:</span>
                                                <input type="text" name="hasta" id="hasta" class="form-control datepicker" placeholder="" aria-describedby="basic-addon13">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="panel panel-default admin_hospitales hide">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administar hora no laborable</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon12"><i class="fa fa-clock-o"></i> Desde:</span>
                                                <input type="text" name="" id="" class="form-control timepicker" placeholder="" aria-describedby="basic-addon14">
                                            </div>
                                            <div class="input-group col-lg-6">
                                                <span class="input-group-addon" id="basic-addon13"><i class="fa fa-clock-o"></i> Hasta:</span>
                                                <input type="text" name="" id="" class="form-control timepicker" placeholder="" aria-describedby="basic-addon15">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default admin_hospitales hide">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rango de horas de citas</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="" class="form-horizontal">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon15"><i class="fa fa-clock-o"></i> Rango de horas:</span>
                                                <select class="form-control">
                                                    <option>30 minutos</option>
                                                    <option>45 minutos</option>
                                                    <option>1 hora</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

        </div>

    </main>

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
