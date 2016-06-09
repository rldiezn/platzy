<?php

$db = new PDO('mysql:host=localhost;dbname=angeles', 'root', 'root');

$actualizar_imagen = $db->prepare("UPDATE tlbpaciente SET tblpacienteimgprofile = :tblpacienteimgprofile WHERE idtblpaciente = :idtblpaciente;");
$actualizar_imagen->bindParam(":tblpacienteimgprofile", $tblLinkedInDrImg);
$actualizar_imagen->bindParam(":idtblpaciente", $idtblLinkedInDr);

$_POST = json_decode(file_get_contents('php://input'), true);

if (!file_exists($_POST['idtblpaciente'] . "/profile_img/")) {
    mkdir($_POST['idtblpaciente'] . "/profile_img/", 0777, true);
}

$tblLinkedInDrImg = date("YmdHis") . ".jpg";
$idtblLinkedInDr = $_POST['idtblpaciente'];

$output = $_POST['idtblpaciente'] . "/profile_img/" . $tblLinkedInDrImg;
$data_img = explode(',', $_POST['tblpacienteimgprofile']);

$success = file_put_contents($output, base64_decode($data_img[1]));

if (file_put_contents($output, base64_decode($data_img[1]))) {
	$actualizar_imagen->execute();
	echo 'pasa';
} else {
	echo 'falla';
}

?>