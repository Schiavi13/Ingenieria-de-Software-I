<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php

include_once("conexion_BD.php");
$idUsuario = $_SESSION['nomUsuario'];
$resultUsuario = mysqli_query($mysqli,"SELECT permisosUsuario, nomUsuario FROM usuario WHERE nomUsuario='$idUsuario'");
$rowUsuario = mysqli_fetch_assoc($resultUsuario);



if($rowUsuario['permisosUsuario']!=1){
	$loc = 'Location: index.php?id='.$rowUsuario['nomUsuario'];

	header($loc);
}

if(isset($_POST['Submit'])) {
	$fechaExcursion = $_POST['fechaExcursion'];
	$sitioExcursion = $_POST['sitioExcursion'];
	$precioExcursion = $_POST['precioExcursion'];
	$fechaTiqueteAereo = $_POST['fechaTiqueteAereo'];
	$asientoTiqueteAereo = $_POST['asientoTiqueteAereo'];
	$vueloTiqueteAereo = $_POST['vueloTiqueteAereo'];
	$destinoTiqueteAereo = $_POST['destinoTiqueteAereo'];
	$origenTiqueteAereo = $_POST['origenTiqueteAereo'];
	$precioTiqueteAereo = $_POST['precioTiqueteAereo'];
	$diaReservaHotel = $_POST['diaReservaHotel'];
	$nochesReservaHotel = $_POST['nochesReservaHotel'];
	$nombreHotel = $_POST['nombreHotel'];
	$habitacionHotel = $_POST['habitacionHotel'];
	$precioHotel = $_POST['precioHotel'];
	$fechaViajeBus = $_POST['fechaViajeBus'];
	$destinoViajeBus = $_POST['destinoViajeBus'];
	$origenViajeBus = $_POST['origenViajeBus'];
	$precioViajeBus = $_POST['precioViajeBus'];


	$resultExc = mysqli_query($mysqli, "INSERT INTO excursion(fechaExcursion, precioExcursion, sitiosExcursion) VALUES('$fechaExcursion',$precioExcursion,'$sitioExcursion')");
	$resultTiqAer = mysqli_query($mysqli, "INSERT INTO tiquete_aereo(fechaTiquete_aereo,asientoTiquete_aereo,vueloTiquete_aereo,destinoTiquete_aereo,origenTiquete_aereo,precioTiquete_aereo) VALUES('$fechaTiqueteAereo',$asientoTiqueteAereo,'$vueloTiqueteAereo','$destinoTiqueteAereo','$origenTiqueteAereo',$precioTiqueteAereo)");
	$resultResHot = mysqli_query($mysqli,"INSERT INTO reserva_hotel(diaReserva_hotel,nochesReserva_hotel,nombreHotelReserva_hotel,habitacionReserva_hotel,precioReserva_hotel) VALUES('$diaReservaHotel','$nochesReservaHotel','$nombreHotel','$habitacionHotel','$precioHotel')");
	$resultTiqBus = mysqli_query($mysqli,"INSERT INTO tiquete_bus(fechaTiquete_bus,destinoTiquete_bus,origenTiquete_bus,precioTiquete_bus) VALUES('$fechaViajeBus','$destinoViajeBus','$origenViajeBus','$precioViajeBus')");
	$resultCount = mysqli_query($mysqli,"SELECT COUNT(*) AS 'cantidad' FROM excursion");
	$rescol = mysqli_fetch_assoc($resultCount);
	$count = $rescol['cantidad'];
	$resultPaquete = mysqli_query($mysqli,"INSERT INTO paquete(idExcursion,idTiquete_aereo,idReserva_hotel,idTiquete_bus) VALUES($count,$count,$count,$count)");	
		
	echo "<font color='green'>Datos adicionados satisfactoriamente.";
	echo "<br/><a href='view.php'>Ver Usuarios</a>";
	
}
?>
<html>
<head>
	
	<title>Agregar Paquete</title>
</head>

<body>
<?php echo "<a href=\"index.php?id=$idUsuario\">Página principal</a>";?> | <a href="view.php">Vista de Paquetes</a> | <a href="logout.php">Cerrar sesión</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Fecha excursion</td>
				<td><input type="text" name="fechaExcursion" placeholder="AAAA-MM-DD HH:MM:SS"></td>
			</tr>
			<tr>
				<td>Precio excursion</td>
				<td><input type="number" name="precioExcursion"></td>
			</tr>
			<tr>
				<td>Sitio</td>
				<td><input type="text" name="sitioExcursion"></td>
			</tr>
			
			
			<tr></tr>
			<tr>
				<td>Fecha vuelo</td>
				<td><input type="text" name="fechaTiqueteAereo" placeholder="AAAA-MM-DD HH:MM:SS"></td>
			</tr>
			<tr>
				<td>Asiento vuelo</td>
				<td><input type="number" name="asientoTiqueteAereo"></td>
			</tr>
			<tr>
				<td>Vuelo</td>
				<td><input type="text" name="vueloTiqueteAereo"></td>
			</tr>
			<tr>
				<td>Destino vuelo</td>
				<td><input type="text" name="destinoTiqueteAereo"></td>
			</tr>
			<tr>
				<td>Origen vuelo</td>
				<td><input type="text" name="origenTiqueteAereo"></td>
			</tr>
			<tr>
				<td>Precio vuelo</td>
				<td><input type="number" name="precioTiqueteAereo"></td>
			</tr>
			<tr></tr>
			<tr>
				<td>Dia reserva hotel</td>
				<td><input type="text" name="diaReservaHotel" placeholder="AAAA-MM-DD"></td>
			</tr>
			<tr>
				<td>Noches reserva hotel</td>
				<td><input type="number" name="nochesReservaHotel"></td>
			</tr>
			<tr>
				<td>Nombre hotel</td>
				<td><input type="text" name="nombreHotel"></td>
			</tr>
			<tr>
				<td>Habitacion hotel</td>
				<td><input type="text" name="habitacionHotel"></td>
			</tr>
			<tr>
				<td>Precio hotel</td>
				<td><input type="number" name="precioHotel"></td>
			</tr>
			<tr></tr>
			<tr>
				<td>Fecha viaje bus</td>
				<td><input type="text" name="fechaViajeBus" placeholder="AAAA-MM-DD HH:MM:SS"></td>
			</tr>
			<tr>
				<td>Destino viaje bus</td>
				<td><input type="text" name="destinoViajeBus"></td>
			</tr>
			<tr>
				<td>Origen viaje bus</td>
				<td><input type="text" name="origenViajeBus"></td>
			</tr>
			<tr>
				<td>Precio viaje bus</td>
				<td><input type="number" name="precioViajeBus"></td>
			</tr>
           
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>