<?php
foreach ($hospitales as $ind=>$aHospitales) {
?>
<tr>
    <td>
        <img class="img_profile_list_hospital" src="<?php echo $aHospitales['srcImage'] ?>">
    </td>
    <td width="60%" class="text_aling_left" >
        <h4>
            <?php echo $aHospitales['catHospitalName'] ?>
        </h4>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 span_list_country">
            <span>Mexico</span>
        </div>
    </td>
    <td style="padding-top: 30px">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <a href='<?php echo "/hospital/verHospital/".$aHospitales['idcatHospital'] ?>'><img src="{{url('img/iconhospital.png')}}" width="35px"></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>" data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">
                <!--<img src="{{url('img/locationicon.png')}}" class="location" data-toggle="modal" data-map-show="map_<?php echo $aHospitales['idcatHospital'] ?>"  data-target="#modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" data-latitude="<?php echo $aHospitales['catHospitalLatitude'] ?>"  data-longitude="<?php echo $aHospitales['catHospitalLongitude'] ?>" width="35px">-->
        </div>

        <div id="modal_googlemaps_<?php echo $aHospitales['idcatHospital'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <br><br>
                        <div class="container">
                            <?php
                             $nameHospital=explode(" ", $aHospitales['catHospitalName']);
                            ?>
                                <div id="map_<?php echo $aHospitales['idcatHospital'] ?>" class="space_map" >

                                </div>

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </td>
</tr>
<?php
}
?>

