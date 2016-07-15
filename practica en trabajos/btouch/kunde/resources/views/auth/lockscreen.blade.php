@extends('template.login-template')

@section('content')

        <!-- Automatic element centering -->
<div class="lockscreen-wrapper">

    <!-- User name -->
    <div class="lockscreen-name">Aarón Cortés</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{asset('img/user1-128x128.jpg')}}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials">
            <div class="input-group">
                <input type="password" class="form-control" placeholder="Contraseña">
                <div class="input-group-btn">
                    <a href="profile.html"><button class="btn"><i class="fa fa-arrow-right text-muted"></i></button></a>
                </div>
            </div>
        </form><!-- /.lockscreen credentials -->

    </div><!-- /.lockscreen-item -->
    <div class="help-block text-center">
    </div>
    <div class="text-center">
        <a href="login.html" style="
        color: #00EFAD;
        ">Ingresar como otro usuario</a>
    </div>
</div><!-- /.center -->

@endsection