@extends('template.main')

@section('content')

    <main>
        <div class="mainWithImg">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paddin_none container_buscador">
                    <div class="col-lg-12 menuBox-container">
                        <a href="/floresRegalos/obtenerTodos" class="menuBox">
                            <i class="icon-angeles-regalos purple2"></i>
                            <strong class="purple2">Flores y Regalos</strong>
                        <span>
                            @lang('auth.flowers-home')
                        </span>
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </main>

@endsection