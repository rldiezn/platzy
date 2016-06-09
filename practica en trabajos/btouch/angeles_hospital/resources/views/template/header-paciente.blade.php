<nav id="custom-bootstrap-menu" class="header_hospital col-lg-12 col-md-12 row col-centered navbar navbar-default navbar-fixed-top " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a href="#" class="navbar-brand"><img class="img-responsive" src="/img/logo_angeles.png"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><i class="fa fa-bars" style="
                color: white;
                "></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active dropdown" id="menu_Ricardo Diez">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user fa-lg"></i> <?php echo strtoupper($isDoctor['usuario']['usuario']) ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/paciente/verPerfil/<?php echo $isDoctor['usuario']['id_usuario'] ?>">Ver  perfil</a></li>
                            <li><a href="/password/email">Cambiar  contrase&ntilde;a</a></li>
                            <li><a href="/logout">Cerrar  sesi&oacute;n</a></li>
                        </ul>
                    </li>
                </ul>
                <li><a href="/"><i class="icono_espacio fa fa-home fa-lg"></i>  Home</a>
                </li>
                <li><a href="#"><i class="icono_espacio fa fa-comment fa-lg"></i>  Chat</a>
                </li>
                <li><a href="#"><i class="icono_espacio fa fa-video-camera fa-lg"></i>  Video</a>
                </li>
                <li><a data-toggle="modal" data-target="#modal_meritocracia_cita" data-backdrop="static" data-keyboard="false" href="#">
                        <i class="icono_espacio fa fa-bell fa-lg"></i>  Notificaciones
                        <div class="notificaion-bubble">1</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>