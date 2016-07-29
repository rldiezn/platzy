@extends('template.main')

@section('content')

    <main>
        <div class="mainWithImg">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none container_buscador">
                    <div class="col-lg-12 menuBox-container">
                        <a href="/doctor/listadoDoctores" class="menuBox">
                            <i class="icon-angeles-medicos cyan"></i>
                            <strong class="cyan">Médicos</strong>
                        <span>
                            @lang('auth.medic-home')
                        </span>
                        </a>
                        <a href="/hospital/listadoHospitales" class="menuBox">
                            <i class="icon-angeles-hospitales blue"></i>
                            <strong class="blue">Hospitales</strong>
                        <span>
                            @lang('auth.hospital-home')
                        </span>
                        </a>
                        <a href="/servicio/listadoServicios" class="menuBox">
                            <i class="icon-angeles-servicios purple"></i>
                            <strong class="purple">Servicios</strong>
                        <span>
                            @lang('auth.service-home')
                        </span>
                        </a>

                    </div>



                </div>
            </div>

        </div>
    </main>

@endsection