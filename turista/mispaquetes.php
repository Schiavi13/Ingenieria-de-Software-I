<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include("conexion_BD.php");
$idUsuario = $_SESSION['idUsuario'];
$resultUsuario = mysqli_query($mysqli,"SELECT permisosUsuario, idUsuario FROM usuario WHERE idUsuario=$idUsuario");
$rowUsuario = mysqli_fetch_assoc($resultUsuario);



if($rowUsuario['permisosUsuario']!=2){
	$loc = 'Location: index.php?id='.$_SESSION['nomUsuario'];

	header($loc);
}
$result = mysqli_query($mysqli, "SELECT * 
FROM reserva_paquete INNER JOIN usuario ON reserva_paquete.idUsuario=usuario.idUsuario
INNER JOIN paquete ON reserva_paquete.idPaquete=paquete.idPaquete
INNER JOIN excursion ON paquete.idExcursion=excursion.idExcursion
INNER JOIN tiquete_aereo ON paquete.idTiquete_aereo=tiquete_aereo.idTiquete_aereo
INNER JOIN reserva_hotel ON paquete.idReserva_hotel=reserva_hotel.idReserva_hotel
INNER JOIN tiquete_bus ON paquete.idTiquete_bus=tiquete_bus.idTiquete_bus
WHERE usuario.idUsuario=$idUsuario");

?>
<html>
<head>
	<title>Mis paquetes</title>
</head>

<body>
	<?php echo "<a href=\"index.php?id=$_SESSION[nomUsuario]\">Página principal</a>";?> | <a href="logout.php">Cerrar sesión</a>
	<br/><br/>
	
	<table width='80%' border="1">
		<tr bgcolor='#CCCCCC'>
			<td>Fecha excursion</td>
			<td>Precio excursion</td>
			<td>Sitios excursion</td>
            <td>Fecha vuelo</td>
            <td>Asiento vuelo</td>
            <td>Numero de vuelo</td>
			<td>Destino vuelo</td>
			<td>Origen vuelo</td>
			<td>Precio vuelo</td>
			<td>Fecha reserva hotel</td>
			<td>Noches hotel</td>
			<td>Nombre hotel</td>
			<td>Habitacion hotel</td>
			<td>Precio hotel</td>
			<td>Fecha viaje bus</td>
			<td>Destino viaje bus</td>
			<td>Origen viaje bus</td>
			<td>Precio viaje bus</td>
			<td>Precio total</td>
			<td>Estado</td>

		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {	
			$precioTotal = $res['precioExcursion']+$res['precioTiquete_aereo']+$res['precioReserva_hotel']+$res['precioTiquete_bus'];	
			echo "<tr>";
			echo "<td>".$res['fechaExcursion']."</td>";
            echo "<td>".$res['precioExcursion']."</td>";
            echo "<td>".$res['sitiosExcursion']."</td>";
			echo "<td>".$res['fechaTiquete_aereo']."</td>";
			echo "<td>".$res['asientoTiquete_aereo']."</td>";
			echo "<td>".$res['vueloTiquete_aereo']."</td>";
			echo "<td>".$res['destinoTiquete_aereo']."</td>";
			echo "<td>".$res['origenTiquete_aereo']."</td>";
			echo "<td>".$res['precioTiquete_aereo']."</td>";
			echo "<td>".$res['diaReserva_hotel']."</td>";
			echo "<td>".$res['nochesReserva_hotel']."</td>";
			echo "<td>".$res['nombreHotelReserva_hotel']."</td>";
			echo "<td>".$res['habitacionReserva_hotel']."</td>";
			echo "<td>".$res['precioReserva_hotel']."</td>";
			echo "<td>".$res['fechaTiquete_bus']."</td>";
			echo "<td>".$res['destinoTiquete_bus']."</td>";
			echo "<td>".$res['origenTiquete_bus']."</td>";
			echo "<td>".$res['precioTiquete_bus']."</td>";
			echo "<td>".$precioTotal."</td>";
			echo "<td>".$res['estadoReserva_paquete']."</td>";
			if($res['estadoReserva_paquete']=='no pago'){
				echo "<td><a href=\"pagar.php?paq=$res[idReserva_paquete]\" onClick=\"return confirm('¿Está seguro que desea pagar la reserva del paquete?')\">Pagar</a></td>";
			}
			$precioTotal = 0;
			echo "</tr>";		
		}
		?>
	</table>	
</body>
</html>