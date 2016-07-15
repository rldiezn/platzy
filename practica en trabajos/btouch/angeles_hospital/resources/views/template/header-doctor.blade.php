<nav class="navbar header_angeles">
    <div class="row">
        <a href="#" class="navbar-brand"><img class="img-responsive" src="/img/logo_angeles.png"></a>
        <button type="button" class="navbar-toggle toggle-btn" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-th toggle-icon"></i>
        </button>
    </div>
    <div class="form-group has-feedback buscador col-lg-6 col-md-6 col-sm-11 col-xs-11">
        <input class="col-lg-12 col-md-12 col-sm-12 col-xs-12 buscador"  type="text" name="buscador" width="100%" id="buscador" placeholder="¿Qué es lo que busca?">
        <button class="form-control-feedback" id = "lupa"><i class="fa fa-search"></i></button>
    </div>

    <div class="row">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/"><i class="icon-angeles-home"></i>Home</a></li>
                <li><a href="/doctor/verPerfil/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><i class="icon-angeles-perfil blue"></i>Mi Perfil</a></li>
                <li><a href="/doctor/listadoDoctores"><i class="icon-angeles-medicos cyan"></i>Médicos</a></li>
                <li><a href="/hospital/listadoHospitales"><i class="icon-angeles-hospitales blue"></i>Hospitales</a></li>
                <li><a href="/servicio/listadoServicios"><i class="icon-angeles-servicios purple"></i>Servicios</a></li>
                <li><a href="#"><i class="icon-angeles-regalos purple2"></i>Flores y Regalos</a></li>
                <li><a href="#"><i class="icon-angeles-chat green"></i>Chat</a></li>
                <li><a href="#"><i class="icon-angeles-video green"></i>Video</a></li>
                <li><a href="/labores/laboresDoctor/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><i class="icon-angeles-citas red"></i>Mi Agenda</a></li>
                <li><a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><i class="icon-angeles-historial orange"></i>Pacientes</a></li>
                <li><a href="#"><i class="icon-angeles-notificaciones yellow"></i>Notificaciones</a></li>
                <li><a href="#"><i class="icon-angeles-ayuda blue"></i>Servicios en Línea</a></li>
                <li><a href="/logout"><i class="icon-angeles-sesion"></i>Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>