<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <p>Estimado(a) <strong><?php echo $data['name'].' '.$data['paterno'].' '.$data['materno']?></strong>, para activar con su cuenta
            por favor de click en el siguien enlace: <a href="<?php echo URL::to("/activacion/$id_user"); ?>">Activar Cuenta</a>
        </p>
    </body>
</html>