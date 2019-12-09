<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
</head>

<body>
<a href="register.php">Registrarse</a> <br />
<?php
include("conexion_BD.php");


if(isset($_POST['submit'])) {
	$id = $_POST['nomUsuario'];
	$pass = mysqli_real_escape_string($mysqli, $_POST['contraUsuario']);
	

	if($id == "" || $pass == "") {
		echo "El campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='login.php'>Regresar</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM usuario WHERE nomUsuario='$id' AND contraUsuario='$pass'");
		
		$row = mysqli_fetch_assoc($result);
		$res = mysqli_fetch_array($result);
		$loc = 'Location: index.php?id='.$row['nomUsuario'];
		if(is_array($row) && !empty($row)) {
			$validuser = $row['nomUsuario'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nombre'] = $row['primerNombreUsuario'];
			$_SESSION['nomUsuario'] = $row['nomUsuario'];
			$_SESSION['idUsuario'] = $row['idUsuario'];
		} else {
			echo "Id o Contraseña no válidos.";
			echo "<br/>";
			echo "<a href='login.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header($loc);			
		}
	}
} else {
?>
	<p><font size="+2">Inicio de sesión</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">id Usuario</td>
				<td><input type="text" name="nomUsuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contraUsuario"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
