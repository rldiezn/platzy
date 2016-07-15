<div id="inteligence" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-kunde">
            <div class="modal-header container-fluid padding_none no-border">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none">
                    <img src="/img/cerraricon.png" class="close-modal-img" data-dismiss="modal" aria-hidden="true">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 padding_none text-right" >

                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding_none text-right" >
                    <h5 class="inteligence-tittle-modal"><span>Inteligence  </span></h5>
                </div>
            </div>
            <div class="modal-body container-fluid">
                <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                    <form class="form-horizontal" id="first_register_form" role="form" method="POST" action="{{route('register')}}">
                        <div class="form-group has-feedback" style="margin-bottom: 40px">
                            <input id="tagsinput_select_dpto" name="tagsinput_select_dpto" class="form-control input-filter  tagsinput_select " type="text" value="" data-role="tagsinput" placeholder="Departamento">
                            <span class="glyphicon  form-control-feedback"><img src="/img/departamentoicon.png" width="25px" style="margin-top: -5px;margin-right: 10px;"> </span>
                        </div>
                        <div class="form-group has-feedback">
                            <input name="search" id="search" class="form-control input-filter" placeholder="Puesto">
                            <span class="glyphicon  form-control-feedback"><img src="/img/puestoicon.png" width="25px" style="margin-top: -5px;margin-right: 10px;"> </span>
                        </div>
                        <div class="container-fluid col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <a href="/">
                                <button type="button" id="comenzar"  class="btn btn-primary btn-block btn-flat buttom_comenzar col-lg-5 col-md-10 col-sm-10 col-xs-10">Selecionar</button>
                            </a>
                        </div>
                    </form>



                </div>

            </div>
            <!--<div class="modal-footer">
                <div class="footer_form_appointment">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-primary enviarSolicitudCita" data-url="/citas/agendarCita" data-selector-form="#createAppointmentForm_" id="submitButton">Save</button>
                </div>
            </div>-->
        </div>
    </div>
</div>