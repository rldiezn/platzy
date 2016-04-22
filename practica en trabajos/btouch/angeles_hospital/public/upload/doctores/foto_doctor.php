<?php

$db = new PDO('mysql:host=localhost;dbname=angeles', 'root', 'root');

$actualizar_imagen = $db->prepare("UPDATE tbllinkedindr SET tblLinkedInDrImg = :tblLinkedInDrImg WHERE idtblLinkedInDr = :idtblLinkedInDr;");
$actualizar_imagen->bindParam(":tblLinkedInDrImg", $tblLinkedInDrImg);
$actualizar_imagen->bindParam(":idtblLinkedInDr", $idtblLinkedInDr);

$_POST = json_decode(file_get_contents('php://input'), true);

if (!file_exists($_POST['idtblDr'] . "/profile_img/")) {
    mkdir($_POST['idtblDr'] . "/profile_img/", 0777, true);
}

$tblLinkedInDrImg = date("YmdHis") . ".jpg";
$idtblLinkedInDr = $_POST['idtblLinkedInDr'];

$output = $_POST['idtblDr'] . "/profile_img/" . $tblLinkedInDrImg;
$data_img = explode(',', $_POST['tblLinkedInDrImg']);

$success = file_put_contents($output, base64_decode($data_img[1]));

if (file_put_contents($output, base64_decode($data_img[1]))) {
	$actualizar_imagen->execute();
}

?>