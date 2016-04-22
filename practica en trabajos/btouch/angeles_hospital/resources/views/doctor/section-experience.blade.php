
<div id="clone_exp_<?php echo $request->idtblExperience ?>" class="col-lg-12 paddin_exp" >
    <div class="col-lg-12">
        <h4 class="col-lg-11 col-md-10 col-sm-10 col-xs-9"></h4>
        <a id="remove_<?php echo $request->idtblExperience ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete_exp_<?php echo $request->idtblExperience ?>"  >
            <span class="glyphicon glyphicon-remove"></span> Eliminar
        </a>
        <br><br>
        <div id="modal_delete_exp_<?php echo $request->idtblExperience?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Alerta</h4>
                    </div>
                    <div class="modal-body">
                        <p>¿Seguro que desea eliminar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary remove_element" data-loading-text="Cargando..." data-container-modal="#modal_delete_exp_<?php echo $infoExperience['idtblExperience'] ?>" data-container-id="#clone_exp_<?php echo $infoExperience['idtblExperience'] ?>"  data-idto-delete="<?php echo $infoExperience['idtblExperience'] ?>" data-url-delete="1" >Aceptar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <div class="form-group">
        <label for="inputCargo_<?php echo $request->idtblExperience?>" class="control-label col-lg-2">Cargo:</label>
        <div class="col-lg-10">
            <input type="text" id="inputCargo_<?php echo $request->idtblExperience?>" name="tblExperienceJobTitle" value="<?php echo $request->formDataJson['tblExperienceJobTitle'] ?>" class="form-control" placeholder="Cargo">
            <input type="hidden" id="idExp_<?php echo $request->idtblExperience?>" name="idtblExperience" value="<?php echo $request->idtblExperience?>" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputHospital_<?php echo $request->idtblExperience?>" class="control-label col-lg-2">Hospital:</label>
        <div class="col-lg-10">
            <input type="text" id="inputHospital_<?php echo $request->idtblExperience?>" name="tblExperienceCompany" value="<?php echo $request->formDataJson['tblExperienceCompany']?>" class="form-control" placeholder="Hospital">
        </div>
    </div>
    <div class="form-group">
        <label for="inputFechaIngreso_<?php echo $request->idtblExperience?>" class="control-label col-lg-2">Fecha Ingreso:</label>
        <div class="col-lg-3">
            <?php
            setlocale(LC_TIME, 'de_DE.UTF-8');
            $dateStartExp = new DateTime($request->formDataJson['tblExperienceStartDate']);
            $dateEndExp = new DateTime($request->formDataJson['tblExperienceEndDate']);
            ?>
            <input type="text" id="inputFechaIngreso_<?php echo $request->idtblExperience?>" name="tblExperienceStartDate" value="<?php echo $dateStartExp->format('Y-m')?>" class="form-control datepicker" placeholder="Fecha Ingreso">
        </div>

        <label for="inputFechaFin_<?php echo $request->idtblExperience?>" class="control-label col-lg-2">Fecha Fin:</label>
        <div class="col-lg-3">
            <input type="text" id="inputFechaFin_<?php echo $request->idtblExperience?>" name="tblExperienceEndDate" value="<?php echo ($infoExperience['tblExperienceCurrent']=='S')?date('Y-m'):$dateEndExp->format('Y-m') ?>" class="form-control  datepicker" placeholder="Fecha Fin">
        </div>
        <div class="col-lg-2">
            <label class="checkbox-inline">
                <input id="actual_exp_<?php echo $request->idtblExperience?>" name="tblExperienceCurrent" type="checkbox" value="S" <?php echo ($infoExperience['tblExperienceCurrent']=='S')?"checked":"" ?>> Actual.
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="inputDescripcionCargo_<?php echo $request->idtblExperience?>" class="control-label col-lg-2">Descripción:</label>
        <div class="col-lg-10">
            <textarea rows="3" id="inputDescripcionCargo_<?php echo $request->idtblExperience?>" name="tblExperienceDescriptionJob" class="form-control limitChar" placeholder="Descripción Cargo"><?php echo $infoExperience['tblExperienceDescriptionJob']?></textarea>
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10  col-lg-2 col-md-2 col-sm-2 col-xs-2" >
            <button type="button" id="" type="submit"
                    data-container-show="#doctor_experience_show_<?php echo $request->idtblExperience ?>"
                    data-container-edit="#doctor_experience_edit_<?php echo $request->idtblExperience ?>"
                    data-id-edit="<?php echo $request->idtblExperience ?>"
                    data-type-edit="1"
                    class="btn btn-primary edit_section_send_buttom">@lang('auth.buttom-send')</button>
        </div>
    </div>

</div>
