<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!--BOOTSTRAP-->
    <!-- Latest compiled and minified CSS -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
    <!-- Optional theme -->
    {{--{!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css')!!}--}}
    <!--JQuery UI Theme-->
    {!!Html::style('/css/jqueryUI_themes/redmond/jquery-ui.css')!!}
    <!--UPLOADFILE-->
    {!!Html::style('/css/uploadfile.css')!!}
    <!--CUSTOM-UPLOAD-INPUT-->
    {!!Html::style('/css/custom-file-input.css')!!}
    <!--CROPPER-->
    {!!Html::style('/css/cropper.css')!!}
    <!--FULLCALENDAR-->
    {!!Html::style('/css/fullcalendar.min.css')!!}
    {!!Html::style('/css/fullcalendar.min.css', array('media' => 'print'))!!}
    <!--CUSTOM-->
    {!!Html::style('/css/custom.css')!!}
    <!--angeles_estilos-->
    {!!Html::style('/css/angeles_estilos.css')!!}
    {!!Html::style('/css/font-awesome.min.css')!!}
</head>
<body>
@include($isDoctor['menu'])

<div class="container-fluid paddin_none main">
    @include($isDoctor['sub-menu'])
    @yield('content')
</div>
</body>
</html>
<!--JQUERY-->
{!!Html::script('https://code.jquery.com/jquery-1.12.0.min.js')!!}
{!!Html::script('https://code.jquery.com/jquery-migrate-1.3.0.min.js')!!}
<!--JQUERY UI-->
{!!Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.js')!!}
<!--BOOTSTRAP-->
{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
<!--FULLCALENDAR-->
{!!Html::script('/js/moment.min.js')!!}
{!!Html::script('/js/fullcalendar.min.js')!!}
<!--UPLOADFILE-->
{!!Html::script('/js/jquery.uploadfile.min.js')!!}
<!--CUSTOM-UPLOAD-INPUT-->
{!!Html::script('/js/custom-file-input.js')!!}
<!--LIMITCHAR-->
{!!Html::script('/js/jquery.limitChar.js')!!}
<!--JSONENCODE-->
{!!Html::script('/js/jquery.serializeJSON.js')!!}
<!--GOOGLE MAPS-->
{!!Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBgbcjRttGZcpZhR3fO6GKrTZSqijlniBM')!!}
<!--CROPPER-->
{!!Html::script('/js/cropper.js')!!}
<!--JQUERY VALIDATE-->
{!!Html::script('/js/jquery.validate.js')!!}
{!!Html::script('/js/additional-methods.js')!!}
<!--CUSTOM-->
{!!Html::script('/js/custom.js')!!}
<!--CALENDAR-INT-->
{!!Html::script('/js/callendar-init.js')!!}
