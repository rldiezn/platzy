<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!--BOOTSTRAP-->
    <!-- Latest compiled and minified CSS -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
    <!-- Optional theme -->
    {{--{!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css')!!}--}}
    <!--JQuery UI Theme-->
    {!!Html::style('/css/jqueryUI_themes/redmond/jquery-ui.css')!!}
    <!--UPLOADFILE-->
    {!!Html::style('/css/uploadfile.css')!!}
    <!--CUSTOM-UPLOAD-INPUT-->
    {!!Html::style('/css/custom-file-input.css')!!}
    <!--CROPPER-->
    {!!Html::style('/css/cropper.css')!!}
    <!--FULLCALENDAR-->
    {!!Html::style('/css/fullcalendar.min.css')!!}
    {!!Html::style('/css/fullcalendar.min.css', array('media' => 'print'))!!}
    <!--VERTICAL TIMLINE-->
    {!!Html::style('/css/responsive-vertical-timeline.css')!!}
    <!--CUSTOM-->
    {!!Html::style('/css/custom.css')!!}
    <!--angeles_estilos-->
    {!!Html::style('/css/angeles_estilos.css')!!}
    {!!Html::style('/css/font-awesome.min.css')!!}
    {!!Html::style('/css/ionicons.css')!!}
</head>
<body>
@include($isDoctor['menu'])

<div class="container-fluid paddin_none main">
    @include($isDoctor['sub-menu'])
    @yield('content')
    <br>
    <br>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#">POLÍTICAS DE PRIVACIDAD</a>
                </div>
                <div class="col-md-6">
                    <a href="#">AVISO DE PRIVACIDAD</a>
                </div>
                <div class="col-md-12 footerText">
                    Todos los derechos reservados. Grupo Angeles Sercicios de Salud, Hospitales Angeles 2016
                </div>
            </div>
        </div>

    </footer>

    <div id="resumenEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 id="myModalLabel1Doctor">Seguimiento de cita de: Jose Lopez
                        <img class="img_profile_list" src="/img/160506031230_croppedImage.png">&nbsp;
                    </h3>
                </div>
                <div class="modal-body">
                    <form id="showAppointmentForm" class="form-horizontal">
                        <table  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <tbody>
                            <tr class="controls">
                                <td width="30%"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-user labels-modal-citas"></i> Paciente</span></td>
                                <td>
                                    <div class="form-control border-radio-none">Jose Lopez</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas" ></i> Servicio</span></td>
                                <td><input type="text" name="servicio" id="servicio" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="Pediatría" placeholder="" aria-describedby="basic-addon1"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-heart-empty labels-modal-citas"></i> Especialidad</span></td>
                                <td><input type="text" name="I_ESPECIALIDAD" id="I_ESPECIALIDAD" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="Nutrición" placeholder="" aria-describedby="basic-addon1"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Hospital</span></td>
                                <td>
                                    <div class="form-control border-radio-none">HOSPITAL ANGELES PEDREGAL</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon3"><i class="fa fa-calendar-o labels-modal-citas"></i> Fecha</span></td>
                                <td>
                                    <div class="form-control border-radio-none">2016-05-15</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas " id="basic-addon5"><i class="fa fa-clock-o labels-modal-citas"></i> Hora de inicio</span></td>
                                <td>
                                    <div class="form-control border-radio-none">13:00</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon6"><i class="fa fa-clock-o labels-modal-citas"></i> Hora de termino</span></td>
                                <td>
                                    <div class="form-control border-radio-none">14:00</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Alertas</span></td>
                                <td>
                                    <div class="form-control border-radio-none">2 Hrs. antes</div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon6"><i class="glyphicon glyphicon-heart labels-modal-citas"></i> Sintoma</span></td>
                                <td>
                                    <div class="form-control border-radio-none">Fiebre alta</div>
                                </td>
                            </tr>
                            <tr >
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> Padecimiento</span></td>
                                <td class="form-control border-radio-none" style="height: auto">
                                    Malestar general y temperatura.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                    <div id="section_expediente" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none hide">
                        <form id="createAppointmentForm" class="form-horizontal ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none">
                                <label for="comment"  style="margin-bottom: -1%;border:1px solid #ccc"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> @lang('auth.suffering-title')</span></label>

                                <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital text-justify ">
                                    <h4>Fiebre alta</h4>
                                    <p>Malestar general y temperatura.</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none">
                                <label for="comment"  style="margin-bottom: -1%;"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> @lang('auth.diagnosis-title')</span></label>
                                <textarea class="form-control border-radio-none" rows="5" id="diagnostico" name="diagnostico"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none">
                                <label for="comment" style="margin-bottom: -1%;"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> @lang('auth.treatment-title')</span></label>
                                <textarea class="form-control border-radio-none" rows="5" id="tratamiento" name="tratamiento"></textarea>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-success" id="submitExpediente">Guardar expediente </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="send_section_cita">
                        <button type="submit" class="btn btn-primary btn-success" id="submitButton">Confirmar </button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Reagendar </button>
                        {{--<button type="submit"  class="btn btn-primary btn-success" id="send_expediente">Seguimiento (Expediente Clinico)</button>--}}
                        {{--<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">No asistio</button>--}}
                    </div>
                    <div id="send_section_expediente" class="modal-footer hide">
                        <button type="submit" class="btn btn-primary btn-success" id="submitExpediente">Guardar expediente </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_meritocracia_cita" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        @lang('auth.rate-opinion-tittle')
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    </div><br>
                    <div class="tittle-custom">
                       @lang('auth.opinion-tittle') el Dr. Foze Lopez
                    </div>
                    <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span>@lang('auth.date-appointment-label')</span> 24-04-2016<br>
                        <span>@lang('auth.symptom-label')</span> Dolor de Cabeza<br>
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_send_meritocracia','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" id="idtblcitaM" name="idtblcitaM" value="5" />
                    <input type="hidden" id="idtblDrM" name="idtblDrM" value="4" />
                    <input type="hidden" id="idtblpacienteM" name="idtblpacienteM" value="1" />
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8  " style="padding-top: 2.5%;" >
                                @lang('auth.question-1-tittle')
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <span class="star-cb-group">
                                  <input type="radio" id="calidad-5" name="calidad" value="5" /><label for="calidad-5">5</label>
                                  <input type="radio" id="calidad-4" name="calidad" value="4" /><label for="calidad-4">4</label>
                                  <input type="radio" id="calidad-3" name="calidad" value="3" /><label for="calidad-3">3</label>
                                  <input type="radio" id="calidad-2" name="calidad" value="2" /><label for="calidad-2">2</label>
                                  <input type="radio" id="calidad-1" name="calidad" value="1" /><label for="calidad-1">1</label>
                                  <input type="radio" id="calidad-0" name="calidad" value="0" class="star-cb-clear" /><label for="calidad-0">0</label>
                                </span>
                            </div>
                        </div>

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding-top: 2.5%;" >
                                @lang('auth.question-2-tittle')
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <span class="star-cb-group">
                                  <input type="radio" id="conocimiento-5" name="conocimiento" value="5" /><label for="conocimiento-5">5</label>
                                  <input type="radio" id="conocimiento-4" name="conocimiento" value="4" /><label for="conocimiento-4">4</label>
                                  <input type="radio" id="conocimiento-3" name="conocimiento" value="3" /><label for="conocimiento-3">3</label>
                                  <input type="radio" id="conocimiento-2" name="conocimiento" value="2" /><label for="conocimiento-2">2</label>
                                  <input type="radio" id="conocimiento-1" name="conocimiento" value="1" /><label for="conocimiento-1">1</label>
                                  <input type="radio" id="conocimiento-0" name="conocimiento" value="0" class="star-cb-clear" /><label for="conocimiento-0">0</label>
                                </span>
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding-top: 2.5%;" >
                                @lang('auth.question-3-tittle')
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <span class="star-cb-group">
                                  <input type="radio" id=empatia-5" name="empatia" value="5" /><label for=empatia-5">5</label>
                                  <input type="radio" id=empatia-4" name="empatia" value="4" /><label for=empatia-4">4</label>
                                  <input type="radio" id=empatia-3" name="empatia" value="3" /><label for=empatia-3">3</label>
                                  <input type="radio" id=empatia-2" name="empatia" value="2" /><label for=empatia-2">2</label>
                                  <input type="radio" id=empatia-1" name="empatia" value="1" /><label for=empatia-1">1</label>
                                  <input type="radio" id=empatia-0" name="empatia" value="0" class="star-cb-clear" /><label for=empatia-0">0</label>
                                </span>
                            </div>
                        </div>

                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding-top: 2.5%;" >
                                @lang('auth.question-4-tittle')
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <span class="star-cb-group">
                                  <input type="radio" id=seguimiento-5" name="seguimiento" value="5" /><label for=seguimiento-5">5</label>
                                  <input type="radio" id=seguimiento-4" name="seguimiento" value="4" /><label for=seguimiento-4">4</label>
                                  <input type="radio" id=seguimiento-3" name="seguimiento" value="3" /><label for=seguimiento-3">3</label>
                                  <input type="radio" id=seguimiento-2" name="seguimiento" value="2" /><label for=seguimiento-2">2</label>
                                  <input type="radio" id=seguimiento-1" name="seguimiento" value="1" /><label for=seguimiento-1">1</label>
                                  <input type="radio" id=seguimiento-0" name="seguimiento" value="0" class="star-cb-clear" /><label for=seguimiento-0">0</label>
                                </span>
                            </div>
                        </div>
                         <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="padding-top: 2.5%;" >
                                @lang('auth.question-5-tittle')
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <span class="star-cb-group">
                                  <input type="radio" id=otro-5" name="otro" value="5" /><label for=otro-5">5</label>
                                  <input type="radio" id=otro-4" name="otro" value="4" /><label for=otro-4">4</label>
                                  <input type="radio" id=otro-3" name="otro" value="3" /><label for=otro-3">3</label>
                                  <input type="radio" id=otro-2" name="otro" value="2" /><label for=otro-2">2</label>
                                  <input type="radio" id=otro-1" name="otro" value="1" /><label for=otro-1">1</label>
                                  <input type="radio" id=otro-0" name="otro" value="0" class="star-cb-clear" /><label for=otro-0">0</label>
                                </span>
                            </div>
                         </div>
                        <br>
                    </div>
                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" >
                        <button type="button" id="send_section_meritocracia_buttom" type="submit" data-loading-text="Enviando" data-id-doctor="" class="btn btn-primary">@lang('auth.send-opinon')</button>
                        <button type="button" id="cancel_section_meritocracia_buttom" data-modal-id="#modal_profile_img" class="btn btn-default cancel_modal">@lang('auth.dont-send-opinon')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</body>
</html>
<!--JQUERY-->
{!!Html::script('https://code.jquery.com/jquery-1.12.0.min.js')!!}
{!!Html::script('https://code.jquery.com/jquery-migrate-1.3.0.min.js')!!}
<!--JQUERY UI-->
{!!Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.js')!!}
<!--BOOTSTRAP-->
{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
<!--FULLCALENDAR-->
{!!Html::script('/js/moment.min.js')!!}
{!!Html::script('/js/fullcalendar.min.js')!!}
<!--UPLOADFILE-->
{!!Html::script('/js/jquery.uploadfile.min.js')!!}
<!--CUSTOM-UPLOAD-INPUT-->
{!!Html::script('/js/custom-file-input.js')!!}
<!--LIMITCHAR-->
{!!Html::script('/js/jquery.limitChar.js')!!}
<!--JSONENCODE-->
{!!Html::script('/js/jquery.serializeJSON.js')!!}
<!--GOOGLE MAPS-->
{!!Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBgbcjRttGZcpZhR3fO6GKrTZSqijlniBM')!!}
<!--CROPPER-->
{!!Html::script('/js/cropper.js')!!}
<!--JQUERY VALIDATE-->
{!!Html::script('/js/jquery.validate.js')!!}
{!!Html::script('/js/additional-methods.js')!!}
<!--VERTICAL TIMLINE-->
{!!Html::script('/js/responsive-vertical-timeline.js')!!}
{!!Html::script('/js/modernizr.js')!!}
<!--CUSTOM-->
{!!Html::script('/js/custom.js')!!}
<?php
    $var_adWords = (isset($adWords))?json_encode($adWords,2):json_encode(array(),2);
    $idtblDrCalendar=(isset($isDoctor['datos'][0]['idtblDr']))?$isDoctor['datos'][0]['idtblDr']:'0';
    echo '<script>
            var adWordsJSON='.$var_adWords.'
            var idtblDrCalendar='.$idtblDrCalendar.'
          </script>';
?>
<!--CALENDAR-INT-->
{!!Html::script('/js/callendar-init.js')!!}