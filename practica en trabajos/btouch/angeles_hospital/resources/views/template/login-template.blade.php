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
    <!--CUSTOM-->
    {!!Html::style('/css/custom.css')!!}
    <!--angeles_estilos-->
    {!!Html::style('/css/angeles_estilos.css')!!}
    {!!Html::style('/css/font-awesome.min.css')!!}
</head>
<body class='background-template-login'>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text_aling_center" >
            <img src="/img/logo.png" >
         </div>
    </div>
</div>
@yield('content')
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
<!--UPLOADFILE-->
{!!Html::script('/js/jquery.uploadfile.min.js')!!}
<!--CUSTOM-UPLOAD-INPUT-->
{!!Html::script('/js/custom-file-input.js')!!}
<!--LIMITCHAR-->
{!!Html::script('/js/jquery.limitChar.js')!!}
<!--JSONENCODE-->
{!!Html::script('/js/jquery.serializeJSON.js')!!}
<!--JQUERY VALIDATE-->
{!!Html::script('/js/jquery.validate.js')!!}
{!!Html::script('/js/additional-methods.js')!!}
<!--CUSTOM-->
{!!Html::script('/js/custom.js')!!}
