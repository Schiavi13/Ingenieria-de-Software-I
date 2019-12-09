<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("conexion_BD.php");


$id = $_GET['id'];


$result=mysqli_query($mysqli, "DELETE FROM paquete WHERE idPaquete=$id");


header("Location:view.php");
?>