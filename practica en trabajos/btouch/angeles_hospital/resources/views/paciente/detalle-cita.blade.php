@extends('template.main')
@section('title')
    @lang('auth.profile-hospital')
@stop
@section('content')

<form class="form-horizontal" id="form_perfil_doctor" method="POST">

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered container-fluid">

        <div id="sectionListado" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass container-fluid">

            <div id="container_img_profile" class="col-lg-3 col-md-4  col-sm-4 col-xs-4 z-index-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-4 col-xs-offset-4 z-index-1">
                <img id="img_input_profile" class="img_input_profile_show"  src="<?php echo $detalleCita[0]->srcImage ?>" alt="your image" width="100%" />
            </div>

            <div id="container_info_profile" class="col-lg-8 col-md-12 col-sm-12 col-xs-12 box z-index-1">
                <div class="form-group">
                    <div class="col-lg-9 col-md-12  col-sm-12 col-xs-12">
                        <div class="col-lg-7 col-md-7  col-sm-7 col-xs-8">
                            <h2>
                                <b>
                                    <div id="doctor_name_show">
                                        <?php echo (isset($detalleCita[0]->nombre_paciente))?$detalleCita[0]->nombre_paciente:'' ?>
                                    </div>
                                </b>
                            </h2>
                        </div>

                    </div>
                </div>

                <div class="form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                        <blockquote style="font-size: 12px">
                            <!--<p><b>@lang('auth.suffering-label') </b><?php echo(isset($detalleCita[0]->padecimiento))?$detalleCita[0]->padecimiento:"" ?></p>-->
                            <p><b>@lang('auth.doctor-who-treated-label') </b><?php echo(isset($detalleCita[0]->nombre_doctor))?$detalleCita[0]->nombre_doctor:"" ?></p>
                            <p><b>@lang('auth.hospital-label') </b><?php echo(isset($detalleCita[0]->catHospitalName))?$detalleCita[0]->catHospitalName:"" ?></p>
                            <p><b>@lang('auth.date-appointment-label') </b><?php echo (isset($detalleCita[0]->fecha_format))?ucwords($detalleCita[0]->fecha_format).' de '.$detalleCita[0]->anio_reserva:"" ?></p>
                        </blockquote>
                    </div>
                </div>


            </div>

        </div>

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass  container-fluid">

            <div class="page-header style-header">
                <img src="/img/cvicon.png" width="45px"> @lang('auth.suffering-title')
            </div>

            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital text-justify">
                        <h4><?php echo(isset($detalleCita[0]->sintoma))?$detalleCita[0]->sintoma:"" ?></h4>
                        <p><?php echo(isset($detalleCita[0]->padecimiento))?$detalleCita[0]->padecimiento:"" ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionListado" class="col-lg-12  col-md-11 col-sm-11 sectionPerfilClass  container-fluid">

            <div class="page-header style-header">
                <img src="/img/cvicon.png" width="45px"> @lang('auth.diagnosis-title')
            </div>

            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital text-justify">
                        <p><?php echo(isset($detalleCita[0]->diagnostico))?$detalleCita[0]->diagnostico:"" ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionBanner" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none margin_top container-fluid" >

            <div class="page-header style-header">
                <img src="/img/cvicon.png" width="45px"> @lang('auth.treatment-title')
            </div>

            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">

                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 descrpcion_hospital text-justify">
                        <p><?php echo(isset($detalleCita[0]->tratamiento))?$detalleCita[0]->tratamiento:"" ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionBanner" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass paddin_none margin_top container-fluid" >

            <div class="page-header style-header">
                <span class="glyphicon glyphicon-list-alt" style="font-size: 30px"></span> @lang('auth.results-performerd-title')
            </div>

            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 container-fluid">
                        <div class="col-lg-4 col-md-4 col-sm-4 margin_top" >
                            <img src="/img/dolor-rodilla.jpg" width="80%">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 margin_top" >
                            <img src="/img/Dolor-de-pies.jpg" width="80%">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 margin_top" >
                            <img src="/img/dolor-articular.jpg" width="80%">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 margin_top" >
                            <img src="/img/dolor-dorsal.jpg" width="80%">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</form>
@stop
