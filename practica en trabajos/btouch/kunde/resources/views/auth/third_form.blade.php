<div id="third" class="">
    <div class="register-box-body">
        {{--<img id="third_previous_buttom_register" src="/img/previousbutton.png" class="previous_buttom_register" >--}}
        <div class="panel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>@lang("validation.messages.whoops")</strong> @lang("validation.messages.some-problems")<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" id="register_form" role="form" method="POST" action="{{route('register')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none ">
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-center">
                        <h2>@lang("titles.ready") <?php echo (isset(Auth::user()->name))?Auth::user()->name:'' ?></h2>
                    </div>
                    <!--<div id="listo_register" class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-center">
                        Listo! <?php echo Auth::user()->name ?>
                    </div>-->
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-center">
                        @lang("validation.messages.emails.send-email-registration")
                    </div>
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-center">
                        @lang("validation.messages.emails.spam-note")
                    </div>
                    <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_none text-center">
                        <img src="/img/cubes.png">
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="container-fluid padding_none container-progress-bar" >
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padding_none">
            <img src="/img/undercircle.png" width="50px" style="margin-left: 8px" >
            <img src="/img/undercompanyicon.png" width="50px" >
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <img src="/img/underline.png" style="position: absolute;top: -19px;left: -96px;width: 301px;height: 95px" >
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img class="" src="/img/undercircle.png" width="50px" >
            <img class="" src="/img/underusericon.png" width="50px" >
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
            <img  class="" src="/img/underline.png" style="position: absolute;top: -19px;left: -86px;width: 288px;height: 95px" >
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
            <img  class="" src="/img/undercircle.png" width="50px"  >
            <img  class="" src="/img/undergoalicon.png" width="50px" >
        </div>
    </div>
</div>