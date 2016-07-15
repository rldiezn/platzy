<div class="col-lg-12 col-md-12 custom_style_menu_top hide">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars" style="
            color: white;
            "></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class=" nav navbar-nav navbar-right">
            {{--<li><a href="/">Grupo  angeles</a></li>--}}
            <li><a href="/hospital/listadoHospitales"><i class="fa fa-hospital-o"></i> Hospitales</a></li>
            <li><a href="/citas/historialPacientes/<?php echo $isDoctor['usuario']['id_usuario'] ?>"><i class="fa fa-user fa-md"></i> Mis Pacientes</a></li>
            <li><a href="/doctor/listadoDoctores"><i class="fa fa-user-md"></i> Doctores</a></li>
            <li><a href="/servicio/listadoServicios"><i class="fa fa-medkit"></i> Servicios</a></li>
        </ul>
    </div>
</div>