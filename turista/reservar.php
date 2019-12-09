<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("conexion_BD.php");


$id = $_GET['id'];
$paq = $_GET['paq'];


$result=mysqli_query($mysqli, "INSERT INTO reserva_paquete(idUsuario,idPaquete) VALUES('$id','$paq')");


header("Location:view2.php");
?>