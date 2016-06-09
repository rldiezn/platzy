@extends('template.main')
@section('title')
    @lang('auth.profile-hospital')
@stop
@section('content')

<form class="form-horizontal" id="form_perfil_doctor" method="POST">

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass">

            <div class="col-lg-3  col-md-4 col-sm-3">
                <img src="<?php echo $hospital->srcImage['srcImage'] ?>" class="show-profile-img" width="200" height="200" >
            </div>

            <div class="col-lg-7  col-md-7 col-sm-12">
                <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <h3><?php echo $hospital->catHospitalName ?> </h3>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <blockquote style="font-size: 12px">
                            <p><?php echo $hospital->catHospitalAddress ?></p>
                            <p>Tlfn: 55 3971 22 51</p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionBanner" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none" >

            <div class="col-lg-12 col-md-12 col-sm-12 top-image paddin_none">
                <img src="<?php echo $hospital->srcImage['srcImageBanner'] ?>"width="100%" >
                {{--<img src="/img/hospital2.jpg" width="100%"  >--}}
            </div>

            <div id="container-banner" class=" col-lg-12 col-md-12 col-sm-12 paddin_none" >
                <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital">
                    <p><?php echo $hospital->catHospitalDescription ?></p>
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 margin-bottom-15 color_fondo1">
                    <ul class="nav nav-tabs">
                        <li  class="active"><a data-toggle="tab" href="#directorio_tab">@lang('auth.medical-directory-title')</a></li>
                        <li ><a data-toggle="tab" href="#servicios_tab">@lang('auth.services')</a></li>
                        <!--<li><a data-toggle="tab" href="#especialidades_tab">Especialidades</a></li>-->
                        <li><a data-toggle="tab" href="#productos_tab">@lang('auth.products-title')</a></li>
                        <li><a data-toggle="tab" href="#instalaciones_tab">@lang('auth.facilities-title')</a></li>
                        <li ><a data-toggle="tab" href="#mapa_tab" class="location"
                                data-map-show="map_<?php echo $hospital->idcatHospital ?>"
                                data-latitude="<?php echo $hospital->catHospitalLatitude ?>"
                                data-target=""
                                data-longitude="<?php echo $hospital->catHospitalLongitude ?>">@lang('auth.location-title')</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="directorio_tab" class="tab-pane fade in active">
                            <ul class="list_tab_style">
                                <?php
                                if(count($hospital->doctors)>0){
                                foreach ($hospital->doctors as $ind=>$doctors){
                                ?>
                                <a href="/doctor/verPerfil/<?php echo $doctors['idtblDr'] ?>">
                                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div ><?php echo  $doctors['tblDoctorName'].' '.$doctors['tblDoctorPaterno'].' '.$doctors['tblDoctorMaterno'] ?></div>
                                    </li>
                                </a>

                                <?php
                                }
                                }else{
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3">No hay datos.</div>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="servicios_tab" class="tab-pane fade">
                            <ul class="list_tab_style">
                                <?php
                                if(count($hospital->services)>0){
                                foreach ($hospital->services as $ind=>$servicio){
                                $patron = explode("U", $servicio->catservicioname);
                                ?>
                                    <a href="/servicio/verServicio/<?php echo $servicio->idcatHospital ?>/<?php echo $servicio->idcatservicio ?>">
                                        <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <div ><?php echo  $servicio->catservicioname ?></div>
                                        </li>
                                    </a>

                                <?php
                                }
                                }else{
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                                <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <div id="especialidades_tab" class="tab-pane fade">
                            <?php
                            if(count($hospital->services)>0){
                            foreach ($hospital->especialidades as $ind=>$especialidad){
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><!--<a href="/servicio/verServicio/<?php echo $especialidad->idcatespecialidad ?>">--><?php echo  $especialidad->catespecialidad ?><!--</a>--></div>
                            <?php
                            }
                            }else{
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="productos_tab" class="tab-pane fade">
                            <ul class="list_tab_style">
                                <?php
                                if(count($hospital->products)>0){
                                foreach ($hospital->products as $ind=>$product){
                                ?>
                                <a href="/producto/verProducto/<?php echo $servicio->idcatHospital ?>/<?php echo $product->idcatproductos ?>">
                                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div ><?php echo  $product->productoname ?></div>
                                    </li>
                                </a>

                                <?php
                                }
                                }else{
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3">No hay datos.</div>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div id="instalaciones_tab" class="tab-pane fade">
                            <h4 class="font-cursiver ">@lang('auth.facilities-title') :</h4>

                        </div>
                        <div id="mapa_tab" class="tab-pane fade in container-fluid">
                            <div id="map_<?php echo $hospital->idcatHospital ?>" class="space_map" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</form>
@stop
