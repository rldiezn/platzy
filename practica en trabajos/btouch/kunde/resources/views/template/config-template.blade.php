<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Social Kunde</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')!!}
    <!-- css style -->
    {!!Html::style('/css/bootstrap-tagsinput.css')!!}
    <!-- Ionicons -->
    {!!Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')!!}
    <!-- select style -->
    {!!Html::style('/plugins/select2/select2_metro.min.css' )!!}
    <!-- select style -->
    {!!Html::style('/plugins/ios-switch/ios7-switch.min.js' )!!}
    <!-- Theme style -->
    {!!Html::style('/css/AdminLTE.min.css')!!}
    <!-- iCheck -->
    {{--{!!Html::style('/js/iCheck/square/blue.css')!!}--}}

    {!!Html::style('css/custom.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!!Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')!!}
    {!!Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')!!}
    <![endif]-->
</head>
<body class="hold-transition lockscreen-config">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-fluid padding_none supreme-container">
    @yield("content")
</div><!-- /.register-box -->

<div class="lockscreen-footer text-center " style="
      margin-top: 40px;
      ">
    <img src="{{asset('/img/logo-footer.png')}}" alt="Kunde"><!--<b><a href="http://www.placeyourfinger.com.mx" class="text-black"></a></b>--><br>
</div>

@include('/template/inteligence-menu-modal')
</body>
</html>
<!-- jQuery 2.1.4 -->
{!!Html::script('https://code.jquery.com/jquery-2.1.4.min.js')!!}
        <!-- Bootstrap 3.3.5 -->
{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
        <!--Google recaptcha-->
{!!Html::script('https://www.google.com/recaptcha/api.js')!!}
        <!-- tagsinput -->
{{--{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js')!!}--}}
{{--{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js')!!}--}}
{{--{!!Html::script('/js/bootstrap-tagsinput.js')!!}--}}
{{--{!!Html::script('/js/bootstrap-tagsinput-angular.js')!!}--}}
        <!-- iCheck -->
{!!Html::script('/js/iCheck/icheck.min.js')!!}
        <!-- iCheck -->
{!!Html::script('/plugins/select2/select2.min.js')!!}
<!-- Jquery validate -->
{!!Html::script('/js/jquery.validate.js')!!}
<!--Custom-->
{!!Html::script('/js/custom.js')!!}
<script>
    $(function () {
        /*$('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });*/
    });
    var secretCaprcha = "6LdUnCITAAAAAK0ElmGIMN581yfToIGABsBhjNyd";

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip('show');
        $('.tooltip').delay(3000).fadeOut(2000);
    });

</script>