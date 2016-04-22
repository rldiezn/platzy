@extends('template.main')
@section('title')
    Perfil Doctor
@stop
@section('main-title')
    <span>Perfil</span> Doctor
@stop
@section('content')
    <div class="background-img-profile">
        <img src="<?php echo $doctor['infoLinkedin']->srcImage['srcImageBanner']?>">
    </div>

    {!! Form::model($doctor,['route'=>['login',$doctor['infoGeneral']->idtblDr],'method'=>'PUT','id'=>'form_perfil_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionGeneral" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass container-fluid">

            <div id="container_img_profile" class="col-lg-3 col-md-4  col-sm-4 col-xs-4 z-index-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-4 col-xs-offset-4 z-index-1">
                <img id="img_input_profile" class="img_input_profile_show"  src="<?php echo $doctor['infoLinkedin']->srcImage['srcImage']?>" alt="your image" width="100%" />
            </div>

            <div id="container_info_profile" class="col-lg-8 col-md-12 col-sm-12 col-xs-12 box z-index-1">
                <div class="form-group">
                    <div class="col-lg-9 col-md-12  col-sm-12 col-xs-12">
                        <div class="col-lg-7 col-md-7  col-sm-7 col-xs-8">
                            <h2>
                                <b>
                                    <div id="doctor_name_show">
                                        <?php echo(isset($doctor['infoGeneral']->tblDoctorName))?$doctor['infoGeneral']->tblDoctorName:"" ?>
                                        <?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorPaterno:"" ?>
                                        <?php echo(isset($doctor['infoGeneral']->tblDoctorMaterno))?$doctor['infoGeneral']->tblDoctorMaterno:"" ?>
                                    </div>
                                </b>
                            </h2>
                        </div>

                    </div>
                </div>

                <div class="form-group col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-9  col-md-12">
                        <blockquote style="font-size: 12px">
                            <p><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrProfHead:"" ?></p>
                            <p><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrAddress))?$doctor['infoLinkedin']->tblLinkedInDrAddress:"" ?>,<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrCountry))?$doctor['infoLinkedin']->tblLinkedInDrCountry:"" ?></p>
                        </blockquote>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  label-info-show" >Actual:</div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9  menos-margin-left" >&nbsp;
                        <?php
                            if($doctor['infoLinkedin']['currentExperiences'] != false){
                                foreach($doctor['infoLinkedin']['currentExperiences'] as $ind=>$currentExperiences){
                                    if((count($doctor['infoLinkedin']['currentExperiences'])-1)==$ind){
                                        echo $currentExperiences['tblExperienceJobTitle'].' ';
                                    }else{
                                        echo $currentExperiences['tblExperienceJobTitle'].', ';
                                    }
                                }
                            }

                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 label-info-show" >Anterior:</div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 menos-margin-left" >&nbsp;
                        <?php
                            if($doctor['infoLinkedin']['oldExperiences'] != false){
                                foreach($doctor['infoLinkedin']['oldExperiences'] as $ind=>$oldExperiences){
                                    if((count($doctor['infoLinkedin']['oldExperiences'])-1)==$ind){
                                        echo $oldExperiences['tblExperienceJobTitle'].' ';
                                    }else{
                                        echo $oldExperiences['tblExperienceJobTitle'].', ';
                                    }
                                }
                            }

                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  label-info-show" >Educación:</div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 menos-margin-left" >&nbsp;
                        <?php echo (isset($doctor['infoEducation'][0]['tblEducationSchool'] ))?$doctor['infoEducation'][0]['tblEducationSchool'] :''?>
                    </div>
                </div>
                <?php
                    /*if(Auth::user()->role =="doctor"){*/
                ?>
                    <!--<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a id="plus_curso" class="btn btn-info btn-xs " href="/doctor/<?php echo  $doctor['infoGeneral']->idtblDr ?>/edit">
                            <span class="glyphicon glyphicon-pencil"></span> Editar Perfil
                        </a>
                    </div>-->
                <?php
                    /*}*/
                ?>

            </div>

        </div>

        <div id="sectionExtracto" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass extracto-padding sectionPerfilClassMarginTop">
            <div class="page-header style-header">
                <img src="/img/summary-icon copy.png" width="50px"> Extracto
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="col-lg-12">
                        <p class="justify-italic-paragraf">
                            "<?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrSummary))?$doctor['infoLinkedin']->tblLinkedInDrSummary:"" ?>"
                        </p>

                    </div>
                </div>
            </div>

        </div>

        <div id="sectionExperiencia" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass sectionPerfilClassMarginTop">

            <div class="page-header style-header">
                <img src="/img/cvicon.png" width="45px"> Experiencia
            </div>
            <div id="space_clone_exp">
                <?php
                    foreach($doctor['infoExperience'] as $ind=>$infoExperience){
                ?>
                    <div id="clone_exp_<?php echo $infoExperience['idtblExperience'] ?>" class="col-lg-12 paddin_exp container-fluid" >
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>
                                    <?php echo $infoExperience['tblExperienceJobTitle']?>
                                </h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px">
                                <?php echo $infoExperience['tblExperienceCompany']?>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php
                                    setlocale(LC_TIME, 'de_DE.UTF-8');
                                    $dateStartExp = new DateTime($infoExperience['tblExperienceStartDate']);
                                    $dateEndExp = new DateTime($infoExperience['tblExperienceEndDate']);
                                ?>
                                <?php echo $dateStartExp->format('M-Y')?> - <?php echo ($infoExperience['tblExperienceCurrent']=='S')?"Actualidad": $dateEndExp->format('M-Y') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-paragraf">
                                <?php echo $infoExperience['tblExperienceDescriptionJob']?>
                            </div>
                        </div>

                    </div>
                <?php
                    }
                ?>
            </div>
        </div>

        <div id="sectionEstudios" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass sectionPerfilClassMarginTop">
            <div class="page-header style-header">
                <img src="/img/icon-education.png" width="50px"> Estudios
            </div>
            <div id="space_clone_est">
                <?php
                foreach($doctor['infoEducation'] as $ind=>$infoEducation){
                ?>
                    <div id="clone_est_<?php echo $infoEducation['idtblEducation'] ?>" class="col-lg-12 paddin_exp" >
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>
                                    <?php echo $infoEducation['tblEducationFieldOfStudy']?>
                                </h4>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px">
                                <?php echo $infoEducation['tblEducationSchool']?>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartEst = new DateTime($infoEducation['tblEducationStartDate']);
                                $dateEndEst = new DateTime($infoEducation['tblEducationEndDate']);
                                ?>
                                <?php echo $dateStartEst->format('M-Y')?> - <?php echo ($infoEducation['tblEducationCurrent']==1)?"Actualidad":$dateEndEst->format('M-Y') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-paragraf">
                                <?php echo $infoEducation['tblEducationDescription']?>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div id="sectionCourse" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass sectionPerfilClassMarginTop">
            <div class="page-header style-header">
                <img src="/img/estudiosicon.png" width="50px"> Cursos
            </div>
            <div id="space_clone_course">
                <?php
                foreach($doctor['infoCourse'] as $ind=>$infoCourse){?>

                    <div id="clone_course_<?php echo $infoCourse['idtblCourses'] ?>" class="col-lg-12 paddin_exp" >
                        <div class="form-group">
                            <div class="col-lg-10">
                                <h4>
                                    <?php echo $infoCourse['tblCoursesName']?>
                                </h4>
                            </div>
                            <div class="col-lg-10" style="margin-top: -10px">
                                <?php echo $infoCourse['tblCoursesInstitution']?>
                            </div>
                            <div class="col-lg-10">
                                <?php echo $infoCourse['idtblExperience']?>
                            </div>
                            <div class="col-lg-10">
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartCourse = new DateTime($infoCourse['tblCoursesDateInit']);
                                $dateEndCourse = new DateTime($infoCourse['tblCoursesDateEnd']);
                                ?>
                                <?php echo $dateStartCourse->format('M-Y')?> - <?php echo ($infoCourse['tblCoursesCurrent']==1)?"Actualidad": $dateEndCourse->format('M-Y') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10">
                                <?php echo $infoCourse['tblCoursesDescription']?>
                            </div>
                        </div>

                    </div>

                <?php
                }
                ?>
            </div>
        </div>

        <div id="sectionCV" class="col-lg-12 col-md-11 col-sm-11 col-xs-11  sectionPerfilClass sectionPerfilClassMarginTop container">
            <a class="btn btn-default btn-lg" target="<?php echo $doctor['infoLinkedin']->srcImage['targetCV']?>" <?php echo $doctor['infoLinkedin']->srcImage['srcCV']?>><span class="glyphicon glyphicon-list-alt"></span> <?php echo $doctor['infoLinkedin']->srcImage['msgCV']?></a>
        </div>

    </div>

    {!! Form::close() !!}
@stop
