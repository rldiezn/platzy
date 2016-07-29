@extends('template.main')
@section('title')
    @lang('auth.historic-appointment')
@stop
@section('id-table-to-search')
    @lang('#historic_appointment_list')
@stop
@section('content')

    <main>

        <div class="agenda_angeles">

            <div class="col-lg-3 col-md-4 col-sm-5 lateral_agenda">

                <div id="calendar-mini"></div>

                {{--<h1><i class="fa fa-th-list"></i> Opciones</h1>--}}
                {{--<a href="agenda_doctor.html" class="btn btn-primary btn-block"><i class="fa fa-calendar fa-lg"></i> Agenda</a>--}}
                {{--<a href="agenda_configuracion.html" class="btn btn-primary btn-block"><i class="fa fa-cog fa-lg"></i> Configuración de Agenda</a>--}}
            </div>


            <div class="col-lg-9 col-md-8 col-sm-7 vista_calendario">

                <section class="lista_citas">


                    <button type="button" class="btn btn-primary btn-filter"><i class="fa fa-info-circle"></i> Citas no cerradas</button>

                    <h1>Historial - <?php echo $nombre_paciente; ?></h1>

                    <div class="list-group">
                        <?php
                        if($citas != false){
                            foreach ($citas as $ind_c=>$c){
                        ?>
                            <a href="#" class="list-group-item no-cerrada" data-toggle="modal" data-target="#citaModal_<?php echo $c->idtblcitas ?>" data-date="2016-05-20">
                                <h4 class="list-group-item-heading"><?php echo $c->nombre_doctor ?></h4>
                                <p class="list-group-item-text fecha"><span><?php echo $c->fecha_format ?> <?php echo $c->anio_reserva ?></span> <span><?php echo $c->hora_init_format ?> - <?php echo $c->hora_fin_format ?></span></p>
                                <p class="list-group-item-text lugar"><?php echo $c->catHospitalName ?></p>
                            </a>

                            <div id="citaModal_<?php echo $c->idtblcitas ?>" class="detalle modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                            <h3>Detalle</h3>
                                        </div>
                                        <div class="modal-body">

                                            <ul class="principal">
                                                <li><i class="fa fa-user-md"></i>Dr(a). <?php echo $c->nombre_doctor ?></li>
                                                <li><i class="fa fa-stethoscope"></i><?php echo $c->tblLinkedInDrProfHead ?></li>
                                                <li><i class="fa fa-medkit"></i>Consulta Médica</li>
                                                <li><i class="fa fa-calendar-o"></i><?php echo $c->fecha_format ?> <?php echo $c->anio_reserva ?></li>
                                                <li><i class="fa fa-clock-o"></i><?php echo $c->hora_init_format ?> - <?php echo $c->hora_fin_format ?></li>
                                                <li><i class="fa fa-map-marker"></i><?php echo $c->catHospitalName ?></li>
                                            </ul>


                                            <article>
                                                <h4>Descripción</h4>
                                                <?php echo $c->padecimiento ?>
                                            </article>

                                            <article>
                                                <ul class="adjuntos">
                                                    <li>
                                                        <span style="background-image:url(img/hospital2.jpg)"></span>
                                                        img-dolor.jpg
                                                    </li>
                                                    <li>
                                                        <span style="background-image:url(img/hospital2.jpg)"></span>
                                                        img-dolor.jpg
                                                    </li>
                                                </ul>
                                            </article>

                                            <article>
                                                <h4>Diagnostico</h4>
                                                <p><?php echo $c->diagnostico ?></p>
                                            </article>


                                            <article>
                                                <h4>Tratamiento</h4>
                                                <p><?php echo $c->tratamiento ?></p>
                                            </article>



                                            <button class="btn btn-block btn-lg btn-primary">
                                                <i class="fa fa-file-pdf-o"></i> Resultados de laboratorio
                                            </button>



                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php
                            }
                        }else{
                            ?>
                            <h2><b>No hay información para mostrar.</b></h2>
                            <?php
                        }
                        ?>

                    </div>


                </section>

            </div>

        </div>

    </main>



    <div class="col-lg-9 col-md-9 col-sm-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 row sectionPerfilClass margin_top hide">
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

