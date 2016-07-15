<?php
foreach ($doctores as $ind=>$aDoctores) {
?>
<div class="list-group-item">
    <a href="<?php echo "/doctor/verPerfil/".$aDoctores['idtblDr'] ?>">
        <img src="<?php echo $aDoctores['srcImage']?>" >
        <h4 class="list-group-item-heading"><?php echo $aDoctores['tblDoctorName'] ?> <?php echo $aDoctores['tblDoctorPaterno'] ?> <?php echo $aDoctores['tblDoctorMaterno'] ?></h4>
        <p class="list-group-item-text">
            <strong><?php echo $aDoctores['tblLinkedInDrProfHead'] ?></strong>
            <span><?php echo $aDoctores['catHospitalName'] ?></span>
            <b>5.4 Km</b>
        </p>
    </a>
    <div class="btn-group" role="group" aria-label="">
        <a data-toggle="modal" data-target="#createEventModal_<?php echo $aDoctores['idtblDr'] ?>" class="btn btn-default hide"><i class="icono_espacio fa fa-calendar fa-lg" style="font-size: 17pt; position: absolute; top: 9px; left: 9px;"></i></a>
        <a href="#" class="btn btn-default"><i class="icon-angeles-chat"></i></a>
        <a href="#" class="btn btn-default"><i class="icon-angeles-video"></i></a>
        <a href="#" class="btn btn-default"><i class="fa fa-map-marker" data-toggle="modal" data-target="#modal_googlemaps_<?php echo $aDoctores['idcatHospital'] ?>" data-map-show="map_<?php echo $aDoctores['idcatHospital'] ?>" data-latitude="<?php echo $aDoctores['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aDoctores['catHospitalLongitude'] ?>" ></i></a>
    </div>
    <div id="modal_googlemaps_<?php echo $aDoctores['idcatHospital'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <br><br>
                    <div class="container">
                        <div id="map_<?php echo $aDoctores['idcatHospital'] ?>" class="space_map" ></div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog --->
    </div><!-- /.modal --->
    <!--Modal registrar cita-->
    <?php echo $aDoctores['modalAgenda'] ?>
</div>
<?php
}
?>

