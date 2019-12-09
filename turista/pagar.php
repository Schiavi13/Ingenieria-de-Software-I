<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("conexion_BD.php");


$id = $_GET['paq'];


$result=mysqli_query($mysqli, "UPDATE reserva_paquete SET estadoReserva_paquete = 'pago' WHERE idReserva_paquete=$id");


header("Location:mispaquetes.php");
?>