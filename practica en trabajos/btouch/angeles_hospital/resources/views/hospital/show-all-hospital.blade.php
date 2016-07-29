@extends('template.main')
@section('title')
    @lang('auth.tittle_hospitals_list')
@stop
@section('id-table-to-search')
    @lang('#hospital_list')
@stop
@section('content')
    <main>

        <h1 class="title_section	 blue">Hospitales</h1>

        <section class="padding">
            <div class="container-fluid text-right" >
                <button type="button" id="plus_exp_hospital" data-toggle="modal" data-target="#modal_new_hospital" class="btn btn-default col-lg-2 col-md-4 col-sm-5 col-xs-5 btn-sm boton_anadir container-fluid" style="float: right">
                    <span class="glyphicon glyphicon-plus"></span> Nuevo Hospital
                </button>
            </div>

            <div class="list-group list_ang" id="hospitales_list">
                <?php
                foreach ($hospitales as $ind=>$aHospitales) {
                if(isset($isDoctor['datos'][0]->role) && $isDoctor['datos'][0]->role == 'admin'){
                    $url="/hospital/editHospital/$aHospitales[idcatHospital]";
                }else{
                    $url="/hospital/verHospital/$aHospitales[idcatHospital]";
                }
                ?>
                    <div class="list-group-item">
                        <a href="<?php echo $url?>">
                            <img src="<?php echo $aHospitales['srcImage'] ?>" >
                            <h4 class="list-group-item-heading"><?php echo $aHospitales['catHospitalName'] ?></h4>
                            <p class="list-group-item-text">
                                <strong><?php echo $aHospitales['catHospitalAddress'] ?></strong>
                                <b>5.4 Km</b>
                            </p>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>

        </section>

    </main>
    <div class="col-lg-7 col-md-7 col-sm-7 row col-centered hide">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">

            <table class="table">
                <thead>
                    <tr>
                        <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.hospitals')</b></h2></th>
                    </tr>
                </thead>
            </table>
            <table class="table" id="hospital_list">

                <?php
                foreach ($hospitales as $ind=>$aHospitales) {
                ?>
                <tr>
                    <td>
                        <img class="img_profile_list_hospital" src="<?php echo $aHospitales['srcImage'] ?>">
                    </td>
                    <td width="60%" class="text_aling_left" >
                        <h4>
                            <?php echo $aHospitales['catHospitalName'] ?>
                        </h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list_country">
                            <span>Mexico</span>
                        </div>
                    </td>
                    <td style="padding-top: 30px">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <a href='<?php echo "/hospital/verHospital/".$aHospitales['idcatHospital'] ?>'><img src="{{url('img/iconhospital.png')}}" width="35px"></a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>" data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">
                                <!--<img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>"  data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">-->
                        </div>

                        <div id="modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <br><br>
                                        <div class="container">
                                            <?php
                                             $nameHospital=explode(" ", $aHospitales['catHospitalName']);
                                            ?>
                                                <div id="map_<?php echo $aHospitales['idcatHospital'] ?>" class="space_map" >

                                                </div>

                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
            {{--{!! $hospitales->render()!!}--}}
            <button type="button"
                    id="plus_info"
                    data-url="/hospital/listarHospitalesLimit"
                    data-limit="10"
                    data-rows="10"
                    data-id-table="#hospital_list"
                    class="btn btn-default btn-sm col-lg-12 col-md-12 col-sm-12 col-xs-12 boton_anadir"
                    data-loading-text="@lang('auth.buttom-searching-text')"
            >
                <span class="glyphicon glyphicon-plus "></span> Mas resultados
            </button>
        </div>


        <br><br>

    </div>

    <div id="modal_new_hospital" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body container-fluid ">
                    <div class="header-custom">
                        Nuevo Hospital
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div><br>
                    <div class="tittle-custom">
                        Registre el nuevo Hospital
                    </div>
                    {!! Form::open(['route'=>['login',''],'method'=>'POST','id'=>'form_new_hospital','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                    <div class="middle-container-crop-image col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="text_info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br>
                        </div>
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2  col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catSiglas"  id="catSiglas" data-rule-required="true" value="{{ old('catSiglas') }}" placeholder="Siglas del Hospital">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalName"  id="catHospitalName" data-rule-required="true" value="{{ old('catHospitalName') }}" placeholder="Nombre del Hospital">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalAddress"  id="catHospitalAddress" data-rule-required="true" value="{{ old('catHospitalAddress') }}" placeholder="Dirección">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalDescription"  id="catHospitalDescription" data-rule-required="true" value="{{ old('catHospitalDescription') }}" placeholder="Descripción">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalTelefono"  id="catHospitalTelefono" value="{{ old('catHospitalTelefono') }}" placeholder="Télefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalUrgencias"  id="catHospitalUrgencias" value="{{ old('catHospitalUrgencias') }}" placeholder="Tlfn. Urgencia">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalLatitude"  id="catHospitalLatitude" value="{{ old('catHospitalLatitude') }}" placeholder="Latitud">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="catHospitalLongitude"  id="catHospitalLongitude" value="{{ old('catHospitalLongitude') }}" placeholder="Longitud">
                                </div>
                            </div>

                            <br>

                        </div>

                    </div>

                    <div class="buttons-container col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <button type="button" id="form_new_hospital_buttom" type="submit" data-loading-text="@lang('auth.buttom-loading-text')" data-id-doctor="" class="btn btn-primary">@lang('auth.buttom-send')</button>
                        <button type="button" id="cancel_section_profile_crop_buttom" data-modal-id="#modal_new_hospital" class="btn btn-default cancel_modal">@lang('auth.buttom-cancel')</button>
                    </div>
                    <br><br><br>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
