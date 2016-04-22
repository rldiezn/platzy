@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.account_title')</div>
                   <ul>
                       <li><a href="#">Editar</a> </li>
                       <li><a href="#">Cambiar contraseña</a> </li>
                   </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection