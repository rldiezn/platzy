@extends('template.main')
@section('title')
    Perfil Doctor
@stop
@section('main-title')
    <span>Perfil</span> Doctor
@stop
@section('content')
    <div id="a" class="background-img-profile">
        <img id="img_background_banner" class="hide" src="">
    </div>

    {!! Form::open(['route'=>'login','method'=>'POST','id'=>'form_perfil_doctor','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -7%">
        <div id="b" class="container-input-img-background-profile">
            <input type="file" name="tblLinkedInDrBannerImg" id="tblLinkedInDrBannerImg" accept="image/*" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" />
            <label for="tblLinkedInDrBannerImg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" fill="#454545"/></svg> <span>Choose a file&hellip;</span></label>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-9 row col-centered">

        <div id="sectionGeneral" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <a href='<?php echo "/doctor/verPerfil/".$aDoctores["idtblDr"] ?>'><img src="{{url('img/doctoricon.png')}}" width="22px"></a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <a href='<?php echo "/labores/laboresDoctor/".$aDoctores["idtblDr"] ?>'>
                    <i class="icono_espacio fa fa-calendar fa-lg"></i>
                </a>
            </div>
            <div id="container_img_profile" class="col-lg-4 col-md-5 z-index-1">
                <!--<div id="load_img_profile" class="profile-picture" style="text-align: center">
                    cargar foto...
                </div>-->
                <div class="col-lg-1 over_edit"><span class="glyphicon glyphicon-edit"></span></div>
                <input type="file" name="tblLinkedInDrImg" id="tblLinkedInDrImg" accept="image/*" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" />
                <label id="label_img" for="tblLinkedInDrImg"><figure><svg xmlns="http://www.w3.org/2000/svg" width="195" height="195" viewBox="0 0 50 50"><path d="M24.827,0C11.138,0,0.001,11.138,0.001,24.827c0,13.689,11.137,24.827,24.826,24.827    c13.688,0,24.826-11.138,24.826-24.827C49.653,11.138,38.517,0,24.827,0z M39.142,38.51c0-0.574,0-0.979,0-0.979    c0-3.386-3.912-4.621-6.006-5.517c-0.758-0.323-2.187-1.011-3.653-1.728c-0.495-0.242-0.941-0.887-0.997-1.438l-0.162-1.604    c1.122-1.045,2.133-2.5,2.304-4.122h0.253c0.398,0,0.773-0.298,0.832-0.663l0.397-2.453c0.053-0.524-0.442-0.842-0.843-0.842    c0.011-0.052,0.02-0.105,0.025-0.149c0.051-0.295,0.082-0.58,0.102-0.857c0.025-0.223,0.045-0.454,0.056-0.693    c0.042-1.158-0.154-2.171-0.479-2.738c-0.33-0.793-0.83-1.563-1.526-2.223c-1.939-1.836-4.188-2.551-6.106-1.075    c-1.306-0.226-2.858,0.371-3.979,1.684c-0.612,0.717-0.993,1.537-1.156,2.344c-0.146,0.503-0.243,1.112-0.267,1.771    c-0.026,0.733,0.046,1.404,0.181,1.947c-0.382,0.024-0.764,0.338-0.764,0.833l0.396,2.453c0.059,0.365,0.434,0.663,0.832,0.663    h0.227c0.36,1.754,1.292,3.194,2.323,4.198l-0.156,1.551c-0.056,0.55-0.502,1.193-0.998,1.438    c-1.418,0.692-2.815,1.358-3.651,1.703c-1.97,0.812-6.006,2.131-6.006,5.517v0.766c-3.288-3.541-5.316-8.266-5.316-13.467    c0-10.932,8.894-19.826,19.826-19.826c10.933,0,19.826,8.894,19.826,19.826C44.653,30.133,42.548,34.946,39.142,38.51z" fill="#31B0D5"/></svg></figure> <span>Foto de Perfil&hellip;</span></label>
                <img id="img_input_profile" class="hide"  src="#" alt="your image" width="205" height="205" />
            </div>

            <div id="container_info_profile" class="col-lg-8 col-md-7 z-index-1">
                <div class="form-group">
                    <label for="inputName" class="control-label col-lg-3 col-md-3">Nombre:</label>
                    <div class="col-lg-9 col-md-12">
                        <input type="name" name="tblDoctorName" id="tblDoctorName" class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">Especalización:</label>
                    <div class="col-lg-9  col-md-12">
                        <input type="text" id="tblLinkedInDrProfHead"  name="tblLinkedInDrProfHead" class="form-control" placeholder="Especalización">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEspecalizacion" class="control-label col-lg-3 col-md-3">País:</label>
                    <div class="col-lg-9  col-md-12">
                        <input type="text" id="tblLinkedInDrCountry"  name="tblLinkedInDrCountry" class="form-control" placeholder="País">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDireccion" class="control-label col-lg-3 col-md-3 ">Dirección:</label>
                    <div class="col-lg-9  col-md-12">
                        <textarea rows="3" id="tblLinkedInDrAddress" name="tblLinkedInDrAddress" class="form-control limitChar" placeholder="Dirección"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionExtracto" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass">

            <div class="col-lg-8">
                <div class="form-group">
                    <label for="inputExtracto" class="control-label col-lg-2">Extracto:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="tblLinkedInDrSummary"  name="tblLinkedInDrSummary" class="form-control limitChar" placeholder="Extracto"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>

        </div>

        <div id="sectionExperiencia" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass">
            <div class="page-header">
                <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-9 ">Experiencia</h4>
                <a id="plus_exp" class="btn btn-info btn-xs boton_negro">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </a>
            </div>
            <div id="clone_exp" class="col-lg-12 paddin_exp hide" >
                <div class="col-lg-12">
                    <h4 class="col-lg-11 col-md-10 col-sm-10 col-xs-9"></h4>
                    <a id="remove_0" class="btn btn-danger btn-xs  remove_element" data-container-id="0">
                        <span class="glyphicon glyphicon-remove"></span> Eliminar
                    </a>
                    <br><br>
                </div>
                <div class="form-group">
                    <label for="inputCargo_0" class="control-label col-lg-2">Cargo:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputCargo_0" name="cargo[]" class="form-control" placeholder="Cargo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputHospital_0" class="control-label col-lg-2">Hospital:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputHospital_0" name="hospital[]" class="form-control" placeholder="Hospital">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngreso_0" class="control-label col-lg-2">Fecha Ingreso:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngreso_0" name="fechaIngreso[]" class="form-control datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFin_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFin_0" name="fechaFin[]" class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_exp_0" name="actualExp[1]" type="checkbox" value="S"> Actual.
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCargo_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCargo_0" name="descripcionExperiencia[]" class="form-control" placeholder="Descripción Cargo"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

            </div>
            <div id="space_clone_exp"></div>
        </div>

        <div id="sectionEstudios" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">
            <div class="page-header">
                <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-9 ">Estudios</h4>
                <a id="plus_est" class="btn btn-info btn-xs boton_negro">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </a>
            </div>
            <div id="clone_est" class="col-lg-12 paddin_est hide">

                <div class="col-lg-12">
                    <h4 class="col-lg-11 col-md-10 col-sm-10 col-xs-9"></h4>
                    <a id="remove_est_0" class="btn btn-danger btn-xs col-lg-1 remove_element" data-container-id="0">
                        <span class="glyphicon glyphicon-remove"></span> Eliminar
                    </a>
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="inputCarrera_0" class="control-label col-lg-2">Carrera:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputCarrera_0" name="carrera[]" class="form-control" placeholder="Carrera o título">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUniversidad_0" class="control-label col-lg-2">Universidad:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputUniversidad_0" name="universidad[]" class="form-control" placeholder="Universidad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngresoUniv_0" class="control-label col-lg-2">Fecha Ingreso:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngresoUniv_0"  name="inputFechaIngresoUniv[]" class="form-control  datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFinUniv_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFinUniv_0"  name="inputFechaFinUniv[]"  class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <!--<div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_est_0" name="actual_est[]" type="checkbox" value="1"> Actual.
                        </label>
                    </div>-->
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCarrera_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCarrera_0" name="inputDescripcionCarrera[]" class="form-control " placeholder="Descripción Carrera"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

            </div>
            <div id="space_clone_est"></div>
        </div>

        <div id="sectionCourse" class="col-lg-12 col-md-11 col-sm-11 sectionPerfilClass">
            <div class="page-header">
                <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-9 ">Cursos</h4>
                <a id="plus_curso" class="btn btn-info btn-xs boton_negro">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </a>
            </div>
            <div id="clone_curso" class="col-lg-12 paddin_est hide">

                <div class="col-lg-12">
                    <h4 class="col-lg-11 col-md-10 col-sm-10 col-xs-9"></h4>
                    <a id="remove_curso_0" class="btn btn-danger btn-xs col-lg-1 remove_element" data-container-id="0">
                        <span class="glyphicon glyphicon-remove"></span> Eliminar
                    </a>
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="nombreCurso_0" class="control-label col-lg-2">Curso:</label>
                    <div class="col-lg-10">
                        <input type="text" id="nombreCurso_0" name="nombreCurso[]" class="form-control" placeholder="Curso">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputInstitucion_0" class="control-label col-lg-2">Institución:</label>
                    <div class="col-lg-10">
                        <input type="text" id="inputInstitucion_0" name="institucion[]" class="form-control" placeholder="Institucion">
                    </div>
                </div>
                <div class="form-group">
                    <label for="asociadoCon_0" class="control-label col-lg-2">Asociado con:</label>
                    <div class="col-lg-10">
                        <input type="text" id="asociadoCon_0" name="asociadoCon[]" class="form-control" placeholder="Asociado con">
                        <span class="help-block">¿El curso fue financiado por alguna institución de su experiencia o fue inversión personal?</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFechaIngresoCurso_0" class="control-label col-lg-2">Fecha inicio:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaIngresoCurso_0"  name="inputFechaIngresoCurso[]" class="form-control  datepicker" placeholder="Fecha Ingreso">
                    </div>
                    <label for="inputFechaFinCurso_0" class="control-label col-lg-2">Fecha Fin:</label>
                    <div class="col-lg-3">
                        <input type="text" id="inputFechaFinCurso_0"  name="inputFechaFinCurso[]"  class="form-control  datepicker" placeholder="Fecha Fin">
                    </div>
                    <!--<div class="col-lg-2">
                        <label class="checkbox-inline">
                            <input id="actual_curso_0" name="actual_curso[]" type="checkbox" value="1"> Actual.
                        </label>
                    </div>-->
                </div>

                <div class="form-group">
                    <label for="inputDescripcionCarrera_0" class="control-label col-lg-2">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea rows="3" id="inputDescripcionCurso_0" name="inputDescripcionCurso[]" class="form-control " placeholder="Descripción Curso"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>

            </div>
            <div id="space_clone_course"></div>
        </div>

        <div id="sectionCV" class="col-lg-12 col-md-11 col-sm-11  sectionPerfilClass">
            <input type="file" name="tblLinkedInDrCV" id="tblLinkedInDrCV" accept="application/pdf" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
            <label for="tblLinkedInDrCV"><span></span> <strong style="background-color: #000"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" ><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Subir CV&hellip;</strong></label>
        </div>

    </div>



    <div id="sectionSendForm">
        <div class="form-group">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <button type="submit" class="btn btn-primary">@lang('auth.buttom-send')</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@stop
