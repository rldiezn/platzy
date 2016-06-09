<div id="createEventModal_<?php echo $doctor['idtblDr'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3 id="myModalLabel1">Reserva de cita, con el doctor <?php echo strtoupper( $doctor['tblDoctorName'].' '.$doctor['tblDoctorPaterno'].' '.$doctor['tblDoctorMaterno'])  ?> </h3>
            </div>
            <div class="modal-body">
                <div class="body_form_appointment">
                    <form id="createAppointmentForm_<?php echo $doctor['idtblDr'] ?>" class="form-horizontal">

                        <table  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <tbody>
                            <tr>
                                <td colspan="2">
                                    <label class="checkbox-inline">&nbsp;<input name="solicitante_es_paciente" id="solicitante_es_paciente_<?php echo $doctor['idtblDr'] ?>" type="checkbox" class="check_desblock" data-paciente="#nombre_paciente_<?php echo $doctor['idtblDr'] ?>" data-parentesco="#parentesco_<?php echo $doctor['idtblDr'] ?>" value="1" checked>Soy el paciente</label>
                                </td>
                            </tr>
                            <tr class="controls">
                                <td width="30%"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-user labels-modal-citas"></i> Paciente</span></td>
                                <td>
                                    <input readonly type="text" name="nombre_paciente" id="nombre_paciente_<?php echo $doctor['idtblDr'] ?>" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="" placeholder="" aria-describedby="basic-addon1">
                                    <input type="hidden" name="idtblDr" id="idtblDr" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" placeholder="" aria-describedby="basic-addon1" value="<?php echo $doctor['idtblDr'] ?>">
                                    <input type="hidden" name="idcatservicio" id="idcatservicio" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" placeholder="" aria-describedby="basic-addon1" value="">
                                    <input type="hidden" name="idtblpaciente" id="idtblpaciente" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" placeholder="" aria-describedby="basic-addon1" value="<?php echo $isDoctor['usuario']['id_usuario']?>">
                                    <input type="hidden" name="idcatHospital" id="idcatHospital" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" placeholder="" aria-describedby="basic-addon1" value="<?php echo $doctor['idcatHospital']?>">
                                </td>
                            </tr>
                            <tr class="controls">
                                <td width="30%"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-user labels-modal-citas"></i> Parentesco</span></td>
                                <td><input readonly type="text" name="parentesco" id="parentesco_<?php echo $doctor['idtblDr'] ?>" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="" placeholder="" aria-describedby="basic-addon1"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas" ></i> Doctor</span></td>
                                <td>
                                    <input readonly type="text" name="doctor" id="doctor" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="<?php echo trim($doctor['tblDoctorName']) ?> <?php echo $doctor['tblDoctorPaterno'] ?> <?php echo $doctor['tblDoctorMaterno'] ?>" placeholder="" aria-describedby="basic-addon1">

                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas" ></i> Servicio</span></td>
                                <td>
                                    <input readonly type="text" name="servicio" id="servicio" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="" placeholder="" aria-describedby="basic-addon1">

                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-heart-empty labels-modal-citas"></i> Especialidad</span></td>
                                <td><input readonly type="text" name="I_ESPECIALIDAD" id="I_ESPECIALIDAD" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="<?php echo $doctor['tblLinkedInDrProfHead'] ?>" placeholder="" aria-describedby="basic-addon1"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Hospital</span></td>
                                <td><input readonly type="text" name="nombre_hospital" id="nombre_hospital" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="<?php echo $doctor['catHospitalName'] ?>" placeholder="" aria-describedby="basic-addon1"></td>
                            </tr>
                            <!--<tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon3"><i class="fa fa-calendar-o labels-modal-citas"></i> Fecha</span></td>
                                <td><input type="text" name="fecha_reserva" id="fecha_reserva" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon3"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas " id="basic-addon5"><i class="fa fa-clock-o labels-modal-citas"></i> Hora de inicio</span></td>
                                <td><input type="text" name="hora_reserva" id="hora_reserva" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon5"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon6"><i class="fa fa-clock-o labels-modal-citas"></i> Hora de termino</span></td>
                                <td><input type="text" name="hora_fin" id="hora_fin" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon6"></td>
                            </tr>-->
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Alertas</span></td>
                                <td class="container-fluid paddin_none">
                                    <select id="idtblaletascitas" name="idtblaletascitas" class="form-control ">
                                        <?php
                                            foreach ($alertas as $a){
                                            ?>
                                            <option value="<?php echo $a->idcatalertas ?>"><?php echo $a->alerta ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon6"><i class="glyphicon glyphicon-heart labels-modal-citas"></i> Sintoma</span></td>
                                <td><input type="text" name="sintoma" id="sintoma" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon6"></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> Padecimiento</span></td>
                                <td><textarea class="form-control" rows="1" id="padecimiento" name="padecimiento"></textarea></td>
                            </tr>
                            <tr>
                                <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Subir Archivos</span></td>
                                <td><input type="file" name="archivo" id="archivo" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon6"></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="message_succes hide">
                    <h4 class="text-center"></h4>
                </div>
            </div>
            <div class="modal-footer">
                <div class="footer_form_appointment">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-primary enviarSolicitudCita" data-url="/citas/agendarCita" data-selector-form="#createAppointmentForm_<?php echo $doctor['idtblDr'] ?>" id="submitButton">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>