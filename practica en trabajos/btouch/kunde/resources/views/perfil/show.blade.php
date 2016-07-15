@extends('template.main-second')
@section('title')
@lang('titles.show-perfil')
@stop
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1></h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user4-128x128.jpg')}}" alt="User profile picture">
                        <h3 class="profile-username text-center">Samuel Cortés</h3>
                        <p class="text-muted text-center">CEO BTouch Inc.</p>

                        <ul class="list-group list-group-unbordered">

                        </ul>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Interactúa con Samuel</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>  Agendar</strong>


                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Contactar</strong>
                        <p class="text-muted">+52 55 4310 6897</p>
                        <p class="text-muted">Ext 6898</p>
                        <p class="text-muted">samuel.cortes@btouchinc.com</p>

                        <hr>

                        <!--strong><i class="fa fa-pencil margin-r-5"></i> Aptitudes</strong>
                        <p>
                          <span class="label label-danger">leadership</span>
                          <span class="label label-success">vision</span>
                          <span class="label label-info">entrepreneurship</span>
                          <span class="label label-warning">technology</span>
                          <span class="label label-primary">engineer</span>
                        </p-->

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Algunas Palabras...</strong>
                        <p>" No hace falta ver toda la escalera, solo da el primer paso"</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Muro</a></li>
                        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab">SocialIn</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{asset('img/user1-128x128.jpg')}}" alt="user image">
                        <span class='username'>
                          <a href="#">TU</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                                    <span class='description'>Publicado - 7:30 PM ayer</span>
                                </div><!-- /.user-block -->
                                <p>
                                    Orgulloso de tu capacidad de liderazgo
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Compartir</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Me Gusta</a></li>
                                    <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Respuestas (5)</a></li>

                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Responder">
                            </div><!-- /.post -->
                            <!-- Post -->
                            <div class="post">
                                <div class='user-block'>
                                    <img class='img-circle img-bordered-sm' src='{{asset('img/user6-128x128.jpg')}}' alt='user image'>
                        <span class='username'>
                          <a href="#">Sarai Cortés</a>
                          <a href='#' class='pull-right btn-box-tool'>
                        </span>
                                    <span class='description'> 5 fotos - hace 5 dias </span>
                                </div><!-- /.user-block -->
                                <div class='row margin-bottom'>
                                    <div class='col-sm-6'>
                                        <img class='img-responsive' src='{{asset('img/photo1.png')}}' alt='Photo'>
                                    </div><!-- /.col -->
                                    <div class='col-sm-6'>
                                        <div class='row'>
                                            <div class='col-sm-6'>
                                                <img class='img-responsive' src='{{asset('img/photo2.png')}}' alt='Photo'>
                                                <br>
                                                <img class='img-responsive' src='{{asset('img/photo3.jpg')}}' alt='Photo'>
                                            </div><!-- /.col -->
                                            <div class='col-sm-6'>
                                                <img class='img-responsive' src='{{asset('img/photo4.jpg')}}' alt='Photo'>
                                                <br>
                                                <img class='img-responsive' src='{{asset('img/photo1.png')}}' alt='Photo'>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Compartir (2)</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Me Gusta (27)</a></li>
                                    <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Respuestas (10)</a></li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Escribe un comentario">
                            </div><!-- /.post -->
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          Abril 2016
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 7:30pm ayer</span>
                                        <h3 class="timeline-header"><a href="#">TU</a> Publicado</h3>
                                        <div class="timeline-body">
                                            Orgulloso de tu liderazgo
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Ir a publicación</a>
                                            <a class="btn btn-danger btn-xs">Editar</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> hace 15 dias</span>
                                        <h3 class="timeline-header no-border"><a href="#">Omar Paredes</a> se unió a la comunidad BTouch</h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> hace 20 dias </span>
                                        <h3 class="timeline-header"><a href="#">Sarai Cortés</a> Publico Fotos en el muro de Samuel</h3>
                                        <div class="timeline-body">
                                            Increíble
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">Ir a publicación</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          Marzo 2016
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> Un mes</span>
                                        <h3 class="timeline-header"><a href="#">Samuel</a> compartió fotos</h3>
                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane container-fluid" id="settings">
                                <!-- Main content -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 row col-centered">
                                        <div  id="sectionExtracto" class="active tab-pane col-lg-12 col-md-12 col-sm-11  sectionPerfilClass container-fluid" style="margin-top:10px;">
                                            <div class="form-group container-fluid">
                                                <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/extracto.jpg')}}" style="right: 35px;">
                                                <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="
                        margin-bottom: 0px;
                        right: 55px;
                        ">Extracto:</h4>
                                                <!-- <label for="inputExtracto" class="col-lg-10">Extracto:</label>-->
                                                <div class="col-lg-10 col-md-12">
                                                    <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: normal;margin-top: 30px;right: 45px;">
                                                        "<?php echo $dataUser['infoSocialin']['tblsocialinsummary'] ?>"</label>
                                                    <span class="help-block caracteres"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <br>
                                        <div id="sectionExperiencia" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass  container-fluid">
                                            <div class="page-header">
                                                <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/experiencia.jpg')}}" style="right: 35px;">
                                                <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-9 " style="margin-bottom: 0px;right: 45px;">Experiencia</h4>
                                            </div>
                                            <br>
                                            <br>
                                            <?php
                                            if(count($dataUser['infoExperience']) > 0){
                                            foreach($dataUser['infoExperience'] as $ind=>$infoExperience){
                                            ?>
                                            <div class="form-group ">
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoExperience['tblexperiencejobtitle'] ?></label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo $infoExperience['tblexperiencecompany'] ?>
                                                </label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo  ucwords($infoExperience['format_star_date_exp']); ?> - <?php echo ucwords($infoExperience['tblexperienceenddateIF']) ?> ( <?php echo $infoExperience['diff_time'] ?> )
                                                </label>
                                            </div>

                                            <?php
                                            }
                                            }

                                            ?>
                                        </div>



                                        <div id="sectionEstudios" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass">
                                            <div class="page-header">
                                                <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/estudio.jpg')}}" style="padding-left: 0px;right: 25px;">
                                                <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="margin-bottom: 0px;right: 45px;">Estudios</h4>

                                            </div>

                                            <br>
                                            <br>
                                            <?php
                                            if(count($dataUser['infoEducation']) > 0){
                                            foreach($dataUser['infoEducation'] as $ind=>$infoEducation){
                                            ?>
                                            <div class="form-group ">
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoEducation['tbleducationfieldofstudy'] ?></label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo $infoEducation['tbleducationschool'] ?>
                                                </label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo  ucwords($infoEducation['format_star_date_est']); ?> - <?php echo ucwords($infoEducation['tbleducationenddateIF']) ?> ( <?php echo $infoEducation['diff_time'] ?> )
                                                </label>
                                                <div class="col-lg-offset-1 col-lg-10">

                                                </div>
                                            </div>

                                            <?php
                                            }
                                            }

                                            ?>
                                        </div>



                                        <div id="sectionCursos" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass">
                                            <div class="page-header">
                                                <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/estudio.jpg')}}" style="padding-left: 0px;right: 25px;">
                                                <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="margin-bottom: 0px;right: 45px;">Cursos</h4>

                                            </div>

                                            <br>
                                            <br>
                                            <?php
                                            if(count($dataUser['infoCourse']) > 0){
                                            foreach($dataUser['infoCourse'] as $ind=>$infoCourse){
                                            ?>
                                            <div class="form-group">
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoCourse['tblcoursesname'] ?></label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo $infoCourse['tblcoursesinstitution'] ?>
                                                </label>
                                                <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                    <?php echo  ucwords($infoCourse['format_star_date_course']); ?> - <?php echo ucwords($infoCourse['tblcourseenddateIF']) ?> ( <?php echo $infoCourse['diff_time'] ?> )
                                                </label>
                                                <div class="col-lg-offset-1 col-lg-10">

                                                </div>
                                            </div>

                                            <?php
                                            }
                                            }

                                            ?>
                                        </div>

                                        <!--<ul class="nav nav-tabs">
                                            <li class="active"><a href="#sectionExtracto" data-toggle="tab">Extracto</a></li>
                                            <li><a href="#sectionExperiencia" data-toggle="tab">Experiecia</a></li>
                                            <li><a href="#sectionEstudios" data-toggle="tab">Estudios</a></li>
                                            <li><a href="#sectionCursos" data-toggle="tab">Cursos</a></li>
                                        </ul>

                                            <div id="sectionGeneral" class="fondo_perfil tab-content col-lg-12 col-md-11 col-sm-11 container-fluid">


                                                <div  id="sectionExtracto" class="active tab-pane col-lg-12 col-md-12 col-sm-11  sectionPerfilClass container-fluid" style="margin-top:10px;">
                                                    <div class="form-group container-fluid">
                                                        <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/extracto.jpg')}}" style="right: 35px;">
                                                        <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="
                        margin-bottom: 0px;
                        right: 55px;
                        ">Extracto:</h4>
                                                        <!-- <label for="inputExtracto" class="col-lg-10">Extracto:</label>-->
                                        <!--
                                                        <div class="col-lg-10 col-md-12">
                                                            <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: normal;margin-top: 30px;right: 45px;">
                                                                "<?php echo $dataUser['infoSocialin']['tblsocialinsummary'] ?>"</label>
                                                            <span class="help-block caracteres"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <br>
                                                <div id="sectionExperiencia" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass  container-fluid">
                                                    <div class="page-header">
                                                        <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/experiencia.jpg')}}" style="right: 35px;">
                                                        <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-9 " style="margin-bottom: 0px;right: 45px;">Experiencia</h4>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <?php
                                                        if(count($dataUser['infoExperience']) > 0){
                                                            foreach($dataUser['infoExperience'] as $ind=>$infoExperience){
                                                        ?>
                                                    <div class="form-group ">
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoExperience['tblexperiencejobtitle'] ?></label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo $infoExperience['tblexperiencecompany'] ?>
                                                        </label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo  ucwords($infoExperience['format_star_date_exp']); ?> - <?php echo ucwords($infoExperience['tblexperienceenddateIF']) ?> ( <?php echo $infoExperience['diff_time'] ?> )
                                                        </label>
                                                    </div>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </div>



                                                <div id="sectionEstudios" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass">
                                                    <div class="page-header">
                                                        <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/estudio.jpg')}}" style="padding-left: 0px;right: 25px;">
                                                        <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="margin-bottom: 0px;right: 45px;">Estudios</h4>

                                                    </div>

                                                    <br>
                                                    <br>
                                                    <?php
                                                    if(count($dataUser['infoEducation']) > 0){
                                                    foreach($dataUser['infoEducation'] as $ind=>$infoEducation){
                                                    ?>
                                                    <div class="form-group ">
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoEducation['tbleducationfieldofstudy'] ?></label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo $infoEducation['tbleducationschool'] ?>
                                                        </label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo  ucwords($infoEducation['format_star_date_est']); ?> - <?php echo ucwords($infoEducation['tbleducationenddateIF']) ?> ( <?php echo $infoEducation['diff_time'] ?> )
                                                        </label>
                                                        <div class="col-lg-offset-1 col-lg-10">

                                                        </div>
                                                    </div>

                                                    <?php
                                                    }
                                                    }

                                                    ?>
                                                </div>



                                                <div id="sectionCursos" class="tab-pane col-lg-12 col-md-12 col-sm-11 sectionPerfilClass">
                                                    <div class="page-header">
                                                        <img class="col-lg-1 col-md-1 col-sm-1 col-xs-2" src="{{asset('img/estudio.jpg')}}" style="padding-left: 0px;right: 25px;">
                                                        <h4 class="col-lg-9 col-md-9 col-sm-9 col-xs-8 " style="margin-bottom: 0px;right: 45px;">Cursos</h4>

                                                    </div>

                                                    <br>
                                                    <br>
                                                    <?php
                                                    if(count($dataUser['infoCourse']) > 0){
                                                    foreach($dataUser['infoCourse'] as $ind=>$infoCourse){
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10"><?php echo $infoCourse['tblcoursesname'] ?></label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo $infoCourse['tblcoursesinstitution'] ?>
                                                        </label>
                                                        <label for="inputDescripcionCargo_0" class=" col-lg-10" style="font-weight: lighter;">
                                                            <?php echo  ucwords($infoCourse['format_star_date_course']); ?> - <?php echo ucwords($infoCourse['tblcourseenddateIF']) ?> ( <?php echo $infoCourse['diff_time'] ?> )
                                                        </label>
                                                        <div class="col-lg-offset-1 col-lg-10">

                                                        </div>
                                                    </div>

                                                    <?php
                                                    }
                                                    }

                                                    ?>
                                                </div>


                                            </div>-->
                                        </div>


                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->




    </section><!-- /.content -->
@stop