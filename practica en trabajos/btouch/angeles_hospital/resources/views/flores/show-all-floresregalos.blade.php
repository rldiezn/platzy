@extends('template.main')
@section('title')
    @lang('auth.tittle_services_list')
@stop
@section('id-table-to-search')
    @lang('#service_list')
@stop
@section('content')

    <main>

        <h1 class="title_section purple">Flores y Regalos</h1>

        <section class="padding">
            <div class="container-fluid text-right" >
                <button type="button" id="plus_exp_flores" data-toggle="modal" data-target="#modal_new_flores_csv" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid" style="float: left">
                    <span class="glyphicon glyphicon-plus"></span> Importar desde CSV
                </button>
                <button type="button" id="plus_exp_flores" data-toggle="modal" data-target="#modal_new_flores" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid" style="float: right">
                    <span class="glyphicon glyphicon-plus"></span> Nuevo Item
                </button>
            </div>
            <div class="list-group list_ang" id="flores_list">
                <?php
                foreach ($flores as $ind=>$aflor) {
                ?>
                    <div class="list-group-item">
                        <a data-toggle="none" data-target="#modal_hospbyserv_<?php echo $aflor['idfloresregalos'] ?>" href="/floresRegalos/obtener/<?php echo $aflor['idfloresregalos'] ?>">
                            <img src="<?php echo $aflor['srcImage']['srcImage'] ?>" >
                            <h4 class="list-group-item-heading"><?php echo $aflor['nombrefr']; ?></h4>
                            <p class="list-group-item-text">
                                <strong><?php echo $aflor['descripcion']; ?></strong>
                            </p>
                        </a>
                    </div>

                <?php
                }
                ?>
            </div>
            <!--<button type="button"
                    id="plus_info"
                    data-url="/flores/listarFloresLimit"
                    data-limit="50"
                    data-rows="50"
                    data-disabled="0"
                    data-id-table="#flores_list"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>-->
        </section>

    </main>

    <div id="modal_new_flores_csv" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        Nuevo Item
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        Registre el nuevo Item
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_load_csv_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>
                        </div>
                        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1  col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" accept=".csv" class="form-control " name="csvFlores"  id="csvFlores" data-rule-required="true" value="{{ old('catSiglas') }}" placeholder="CSV">
                                </div>
                            </div>

                            <br>

                        </div>

                    </div>
                    <div id="success_item" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none hide">
                        <label class="label-success col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none text-center" style="color: #fff;">
                            Item registrado con exito!
                        </label>
                    </div>
                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="load_section_fr_csv_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_new_servicio" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="modal_new_flores" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        Nuevo Item
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        Registre el nuevo Item
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_new_fr','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>
                        </div>
                        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1  col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="nombrefr"  id="nombrefr" data-rule-required="true" value="{{ old('catSiglas') }}" placeholder="Nombre del Servicio">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="precio"  id="precio" data-rule-required="true" value="{{ old('catSiglas') }}" placeholder="Precio">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" name="descripcion"  id="descripcion"  placeholder="Descripción" value="{{ old('catHospitalDescription') }}" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" name="condiciones_envio"  id="condiciones_envio"  placeholder="Condiciones de Envio" value="{{ old('catHospitalDescription') }}" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="img_principal"  id="img_principal" value="{{ old('catSiglas') }}" placeholder="URL de la imágen">
                                </div>
                            </div>

                            <br>

                        </div>

                    </div>
                    <div id="success_item" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none hide">
                        <label class="label-success col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none text-center" style="color: #fff;">
                            Item registrado con exito!
                        </label>
                    </div>
                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="form_new_fr_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_new_servicio" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
