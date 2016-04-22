<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <?php foreach ($Labores as $labor): ?>
                <div class="title"><?php echo 'Id: ' . $labor->idtblHorario; ?></div>
                <div class="title"><?php echo 'Día: ' . $labor->tblHorarioDia; ?></div>
                <?php endforeach ?>
            </div>
        </div>
    </body>
</html>
