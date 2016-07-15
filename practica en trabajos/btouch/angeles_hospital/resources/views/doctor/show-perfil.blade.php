@extends('template.main')
@section('title')
    Perfil Doctor
@stop
@section('main-title')
    <span>Perfil</span> Doctor
@stop
@section('content')

    <main>

        <section class="back_fix doctores"></section>

        <article class="doctor padding">

            <div class="image_profile" style="background-image:url(<?php echo $doctor['infoLinkedin']->srcImage['srcImage']?>)"></div>

            <h1>Dr(a).
                <?php echo(isset($doctor['infoGeneral']->tblDoctorName))?$doctor['infoGeneral']->tblDoctorName:"" ?>
                <?php echo(isset($doctor['infoGeneral']->tblDoctorPaterno))?$doctor['infoGeneral']->tblDoctorPaterno:"" ?>
                <?php echo(isset($doctor['infoGeneral']->tblDoctorMaterno))?$doctor['infoGeneral']->tblDoctorMaterno:"" ?>
            </h1>
            <h2><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrProfHead))?$doctor['infoLinkedin']->tblLinkedInDrProfHead:"" ?></h2>
            <h3><?php echo(isset($doctor['infoGeneral']['hospital']))?$doctor['infoGeneral']['hospital'][0]->catHospitalName:"" ?></h3>
            <p><?php echo(isset($doctor['infoLinkedin']->tblLinkedInDrSummary))?$doctor['infoLinkedin']->tblLinkedInDrSummary:"" ?></p>

            <div class="btn-group" role="group" aria-label="">
                <a href="#" class="btn btn-default"><i class="icon-angeles-chat"></i></a>
                <a href="#" class="btn btn-default"><i class="icon-angeles-video"></i></a>
                <a href="#" class="btn btn-default"><i class="fa fa-map-marker"></i></a>
            </div>


            <div class="panel panel-default">

                <div class="panel-heading">Experiencia</div>
                <div class="panel-body">
                    <?php
                    foreach($doctor['infoExperience'] as $ind=>$infoExperience){
                    ?>
                        <p>
                            <strong><?php echo  $infoExperience['tblExperienceJobTitle'] ?>, <?php echo $infoExperience['tblExperienceCompany']?></strong>
                            <em>
                                <?php
                                setlocale(LC_TIME, 'es_DE.UTF-8');
                                $dateStartExp = new DateTime($infoExperience['tblExperienceStartDate']);
                                $dateEndExp = new DateTime($infoExperience['tblExperienceEndDate']);
                                ?>
                                <?php echo $dateStartExp->format('M-Y')?> - <?php echo ($infoExperience['tblExperienceCurrent']=='S')?"Actualidad": $dateEndExp->format('M-Y') ?>
                            </em>
                            <span><?php echo $infoExperience['tblExperienceDescriptionJob']?></span>
                        </p>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Estudios</div>
                    <div class="panel-body">
                        <?php
                        foreach($doctor['infoEducation'] as $ind=>$infoEducation){
                        ?>
                        <p>
                            <strong><?php echo $infoEducation['tblEducationFieldOfStudy']?>, <?php echo $infoEducation['tblEducationSchool']?></strong>
                            <em>
                                <?php
                                setlocale(LC_TIME, 'de_DE.UTF-8');
                                $dateStartEst = new DateTime($infoEducation['tblEducationStartDate']);
                                $dateEndEst = new DateTime($infoEducation['tblEducationEndDate']);
                                ?>
                                <?php echo $dateStartEst->format('M-Y')?> - <?php echo ($infoEducation['tblEducationCurrent']==1)?"Actualidad":$dateEndEst->format('M-Y') ?>
                            </em>
                            <span><?php echo $infoEducation['tblEducationDescription']?></span>
                        </p>
                        <?php
                        }
                        ?>
                    </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>
                <div class="panel-body">
                    <?php
                    foreach($doctor['infoCourse'] as $ind=>$infoCourse){?>
                    <p>
                        <strong><?php echo $infoCourse['tblCoursesName']?>, <?php echo $infoCourse['tblCoursesInstitution']?></strong>
                        <em>
                            <?php
                            setlocale(LC_TIME, 'de_DE.UTF-8');
                            $dateStartCourse = new DateTime($infoCourse['tblCoursesDateInit']);
                            $dateEndCourse = new DateTime($infoCourse['tblCoursesDateEnd']);
                            ?>
                            <?php echo $dateStartCourse->format('M-Y')?> - <?php echo ($infoCourse['tblCoursesCurrent']==1)?"Actualidad": $dateEndCourse->format('M-Y') ?>
                        </em>
                        <span><?php echo $infoCourse['tblCoursesDescription']?></span>
                    </p>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </article>

    </main>

@stop
