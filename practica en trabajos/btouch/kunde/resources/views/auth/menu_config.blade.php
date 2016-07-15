@extends('template.config-template')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 container-fluid title-config-container">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                Personalicemos <span>tu menú</span>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding_none text-right tomar_tour">
                <a>Tomar Tour!</a>
            </div>
            <div class="box-icon-plane">
                <img src="/img/airplanetouricon.png">
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 container-fluid help_config_container">
            <img id="" src="/img/helpbutton.png" class="help_buttom_config_menu" data-toggle="tooltip" data-placement="bottom" title="¿Podemos ayudarte?" >
        </div>
    </div>

    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 container-fluid padding_none body_container_config">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 column padding_none " data-toggle="modal" data-target="#inteligence">
            <div class="tittle col-lg-12 col-md-12 col-sm-12 col-xs-12 ">Inteligence</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  column-inteligence">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-box">
                    <span>Selecciona tu puesto,</span> elige tus<br>
                    preferencias y <span>disfruta</span> de un menú<br>
                    <span>AD-Hoc</span> a tus necesidades como<br>
                    en ninguna otra aplicación
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none icon-box">
                    <img src="/img/intelligenceicon.png" >
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 column "></div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 column padding_none ">
            <a href="/">
                <div class="tittle col-lg-12 col-md-12 col-sm-12 col-xs-12">Classic</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 column-classic">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-box">
                        <span>Comienza,</span> con nuestro menú<br>
                        predeterminado y <span>conocé</span> nuestra aplicación
                        al 100%. Puedes personalisar<br> tu menú y volverlo
                        "inteligence"<br> en <span>cualquier</span> momento
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none icon-box">
                        <img src="/img/classiicon.png" >
                    </div>
                </div>
            </a>


        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 column "></div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 column padding_none">
            <div class="tittle col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12   padding_none column-video">
                <img src="/img/preview-video.jpg" width="100%" height="100%">
            </div>

        </div>
    </div>
    {{--<input name="tagsinput_select" id="tagsinput_select" class="form-control input-filter" type="text"  placeholder="Departamento" data-role="tagsinput" style="border: 0px!important">--}}
@endsection