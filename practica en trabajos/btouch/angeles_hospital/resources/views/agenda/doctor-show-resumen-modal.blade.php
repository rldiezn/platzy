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
                                <div class="form-control border-radio-none">12 Hrs. antes</div>
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