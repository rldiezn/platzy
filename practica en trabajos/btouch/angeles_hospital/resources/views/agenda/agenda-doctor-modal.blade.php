<div id="createEventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3 id="myModalLabel1Doctor">Cita para paciente del Dr. <?php echo strtoupper($isDoctor['usuario']['usuario'])  ?></h3>
            </div>
            <div class="modal-body">
                <form id="createAppointmentForm" class="form-horizontal">
                    <table  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <tbody>
                        <tr class="controls">
                            <td width="30%"><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-user labels-modal-citas"></i> Paciente</span></td>
                            <td>
                                <input readonly type="text" name="nombre_paciente" id="nombre_paciente" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="" placeholder="" aria-describedby="basic-addon1">
                                <input type="hidden" name="idtblDr" id="idtblDr" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" value="" placeholder="" aria-describedby="basic-addon1" value="<?php echo $isDoctor['usuario']['usuario']?>">
                                <input type="hidden" name="idtblpaciente" id="idtblpaciente" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" value="" placeholder="" aria-describedby="basic-addon1" value="">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas" ></i> Servicio</span></td>
                            <td><input readonly type="text" name="servicio" id="servicio" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="" placeholder="" aria-describedby="basic-addon1"></td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-heart-empty labels-modal-citas"></i> Especialidad</span></td>
                            <td><input readonly type="text" name="I_ESPECIALIDAD" id="I_ESPECIALIDAD" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="Nutrición" placeholder="" aria-describedby="basic-addon1"></td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Hospital</span></td>
                            <td><input readonly type="text" name="nombre_hospital" id="nombre_hospital" class="form-control border-radio-none border-radio-none" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]" value="HOSPITAL ANGELES PEDREGAL" placeholder="" aria-describedby="basic-addon1"></td>
                        </tr>
                        <tr>
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
                        </tr>
                        <tr>
                            <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="fa fa-bookmark labels-modal-citas"></i> Alertas</span></td>
                            <td>
                                <select disabled id="idtblaletascitas" name="idtblaletascitas" class="form-control ">
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
                            <td><input readonly type="text" name="sintoma" id="sintoma" class="form-control border-radio-none border-radio-none" placeholder="" aria-describedby="basic-addon6"></td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon border-radio-none border-labels-modal-citas" id="basic-addon1"><i class="glyphicon glyphicon-comment labels-modal-citas" ></i> Padecimiento</span></td>
                            <td><textarea readonly class="form-control" rows="1" id="padecimiento" name="padecimiento"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            </div>
        </div>
    </div>
</div>