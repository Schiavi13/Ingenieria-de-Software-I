<?php session_start(); //inicia sesion?>  
<html>
<head>
	<title>Página principal TURISTA</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		TURISTA
	</div>
	<?php
	include("conexion_BD.php");
	$id = $_GET['id'];
	if(isset($_SESSION['valid']) and mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM usuario WHERE nomUsuario='$id'"))['permisosUsuario']==1) {								
		$result = mysqli_query($mysqli, "SELECT * FROM usuario");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?><br/> 
		<br/>
		<?php echo "<td><a href=\"view.php?id=$id\">Ver paquetes</a></td>";?>
		<br/>
		<a href='logout.php'>Cerrar sesión</a><br/>
		<br/><br/>
	<?php	
	}elseif(isset($_SESSION['valid']) and mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM usuario WHERE nomUsuario='$id'"))['permisosUsuario']==2){
		$result = mysqli_query($mysqli, "SELECT * FROM usuario");
	?>
		Bienvenido <?php echo $_SESSION['nombre'] ?><br/>
		<br/>
		<?php echo "<td><a href=\"view2.php?id=$id\">Ver paquetes</a></td>";?>
		<br/>
		<a href='mispaquetes.php'>Mis paquetes</a><br/>
		<a href='logout.php'>Cerrar sesión</a><br/>
		<br/><br/>
	<?php
	}
	 else{
	echo "<a href='login.php'>Iniciar sesión</a>";
  }
	?>

</body>
</html>