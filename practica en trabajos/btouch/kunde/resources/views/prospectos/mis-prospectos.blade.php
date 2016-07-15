@extends('template.main-second')
@section('title')
@lang('titles.show-perfil')
@stop
@section('content')
    <section class="content supreme-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding_none" >
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none container_mis_prospectos">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none text-left title">
                            Mis <br><span>Prospectos.</span>
                        </div>
                        <div data-toggle="modal" data-target="#agregar_prospecto_modal" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding_none text-right plus-prospecto">
                            Añadir nuevo prospecto
                            <img src="/img/anadiricon.png" class="plus-img">
                        </div>

                    </div>
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 background-height background-aqua "></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 background-height background-orange "></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 background-height background-pink "></div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0 padding_none" >
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 padding_none background-container-toronja background-toronja" >
                    <div class="container-fluid">
                        Me siento con <span>ganas</span> de conseguir<br>
                        <span>prospectos</span>, <span>ganar</span> cuentas<br>
                        y <span>crecer</span> de manera imparable
                    </div>
                    <div class="container-fluid col-lg-2 col-md-2 col-sm-2 col-xs-2 container-go padding_none">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 padding_none left" >
                            <i class="fa fa-arrow-right fa-1" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 padding_none right" >
                            GO!
                        </div>
                    </div>

                </div>

            </div>

            <div class="row margin-top-15">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding_none" >
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none container-table-prospectos">

                        <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none ">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 padding_none background-filter container-filter" >
                                <img src="/img/filtro-icon.png">
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 padding_none" >
                                <input name="search" id="search" class="form-control input-filter" placeholder="empresa,contacto,puesto más...">
                            </div>

                        </div>
                        <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none margin-top-15">
                            <div class="panel-group" id="accordion_prospecto" data-toggle="collapse">
                                <div class="panel panel-default">
                                    <div class="panel-heading acordion-prospecto">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                                <div class="container-fluid padding_none">
                                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 padding_none ">
                                                        <img src="/img/company-ico.png"> Business Club S.A de C.V. <img src="/img/sim-ico.png">
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none icons-acordion">
                                                        <img src="/img/hotoff-icon.png"> <img src="/img/share-icon.png">
                                                    </div>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body background-white">
                                            Click headers to expand/collapse content that is broken into logical sections, much like tabs. Optionally, toggle sections open/closed on mouseover.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading acordion-prospecto">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                                                <div class="container-fluid padding_none">
                                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 padding_none ">
                                                        <img src="/img/company-ico.png"> Contrurama S.A de C.V. <img src="/img/sim-ico.png">
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none icons-acordion">
                                                        <img src="/img/hoton-icon.png"> <img src="/img/share-icon.png">
                                                    </div>
                                                </div>

                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body background-white">
                                            <h1 class="light">go explore the <span class="semi-bold">world</span></h1>
                                            <h4>small things in life matters the most</h4>
                                            <h2>Big Heading <span class="semi-bold">Body</span>, <i>Variations</i> </h2>
                                            <h4><span class="semi-bold">Open Me</span>, Light , <span class="semi-bold">Bold</span> , <i>Everything</i></h4>
                                            <p> is the art and technique of arranging type in order to make language visible. The arrangement of type involves the selection of typefaces, point size, line length, leading (line spacing), adjusting the spaces between groups of letters (tracking) </p>
                                            <p>and adjusting the Case space between pairs of letters (kerning). Type design is a closely related craft, which some consider distinct and others a part of typography</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading acordion-prospecto">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                                                <div class="container-fluid padding_none">
                                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 padding_none ">
                                                        <img src="/img/company-ico.png"> Pasteles S de R L de C.V. <img src="/img/sim-ico.png">
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none icons-acordion">
                                                        <img src="/img/hotoff-icon.png"> <img src="/img/share-icon.png">
                                                    </div>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body background-white">
                                            Click headers to expand/collapse content that is broken into logical sections, much like tabs. Optionally, toggle sections open/closed on mouseover.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0 padding_none" >
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 padding_none text-linkidin" >
                    <div class="container-fluid padding_none">
                        Tus conexiones en LinkedIn pueden ser prospectos potenciales. <img src="/img/linkedin-ico.png">
                    </div>
                    <br>
                    <img src="/img/linkedin-api.png">
                </div>
            </div>
        </div>
    </section>
    @include('/template/agregar-prospecto-modal')
@stop