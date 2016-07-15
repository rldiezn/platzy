@extends('template.main')
@section('title')
    @lang('auth.historic-appointment')
@stop
@section('id-table-to-search')
    @lang('#historic_appointment_list')
@stop
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 row sectionPerfilClass margin_top">
        <?php
            if($citas != false){
         ?>
            <table class="table">
                <thead>
                <tr>
                    <th class="text_aling_center" colspan="3"><h2><b>@lang('auth.historic-appointment')</b></h2></th>
                </tr>
                <tr>
                    <th class="text_aling_center" colspan="3">
                        <h4><img class="img_profile_list" src="<?php echo (isset($citas[0]->srcImage))?$citas[0]->srcImage:''?>" >&nbsp;
                            <b><?php echo (isset($citas[0]->nombre_paciente))?$citas[0]->nombre_paciente:'' ?> </b></h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                            <span><b> @lang('auth.age-label')</b>  <?php echo $citas[0]->edad ?></span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list35ountry">
                            <span><b> @lang('validation.attributes.email-label')</b> <?php echo $citas[0]->tblpacienteemail ?></span>
                        </div>
                    </th>
                </tr>
                </thead>
            </table>

            <section id="cd-timeline" class="cd-container">

                <?php
                foreach ($citas as $ind_c=>$c){
                ?>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture <?php echo ($c->changeYear ==1)?'':'hide' ?>">
                        <?php echo $c->anio_reserva ?>
                    </div> <!-- cd-timeline-img -->
                    <div class="cd-timeline-content">
                        <h2><?php echo $c->sintoma ?></h2>
                        <p><b>@lang('auth.doctor-who-treated-label')</b><?php echo $c->nombre_doctor ?><br><b>@lang('auth.hospital-label') </b><?php echo $c->catHospitalName ?></p>
                        <!--<p class="prev_diagnostico"><?php echo $c->diagnostico ?></p>-->
                        <a href="/citas/detalle_cita/<?php echo $c->idtblcitas ?>" class="cd-read-more">@lang('auth.see-detail-buttom')</a>
                        <span class="cd-date"><?php echo ucwords($c->fecha_format) ?></span>
                    </div> <!-- cd-timeline-content -->
                </div>
                <?php
                }
                ?>
            </section>
        <?php
            }else{
        ?>
            <table class="table">
                <thead>
                <tr>
                    <th class="text_aling_center" colspan="3"><h2><b>No hay información para mostrar.</b></h2></th>
                </tr>
                </thead>
            </table>
        <?php
            }
        ?>
        <?php

        ?>
    </div>


@stop

