<?php session_start(); ?>
<?php
if(isset($_POST['Submit'])) {

    include_once("conexion_BD.php");


    $nomUsuario = $_POST['nomUsuario'];
    if(empty($nomUsuario)){
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    else{
        /*
        $existe = mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM usuario WHERE nomUsuario IN ('$nomUsuario')"));
        if($existe){
            echo'<script>alert("Este id de usuario ya existe, intente con otro")</script>';
            header("Location:register.php");
        }
        */
        
        //else{
            $contraUsuario = $_POST['contraUsuario'];
            $primerNombreUsuario = $_POST['primerNombreUsuario'];
            $segundoNombreUsuario = $_POST['segundoNombreUsuario'];
            $primerApellidoUsuario = $_POST['primerApellidoUsuario'];
            $segundoApellidoUsuario = $_POST['segundoApellidoUsuario'];
            $identificacionUsuario = $_POST['identificacionUsuario'];

            if(empty($nomUsuario) || empty($contraUsuario) || empty($primerNombreUsuario) || empty($primerApellidoUsuario) || empty($segundoApellidoUsuario) || empty($identificacionUsuario)){
                if(empty($nomUsuario)) {
                    echo "<font color='red'>El campo id Usuario esta vacio.</font><br/>";
                }
                
                if(empty($contraUsuario)) {
                    echo "<font color='red'>El campo password esta vacio.</font><br/>";
                }
                
                if(empty($primerNombreUsuario)) {
                    echo "<font color='red'>El campo Primer nombre esta vacio.</font><br/>";
                }
                if(empty($primerApellidoUsuario)){
                    echo "<font color='red'>El campo Primer apellido esta vacio.</font><br/>";
                }
        
                if(empty($segundoApellidoUsuario)){
                    echo "<font color='red'>El campo segundo Apellido esta vacio.</font><br/>";
                }
                
                if(empty($identificacionUsuario)){
                    echo "<font color='red'>El campo Numero de identificacion esta vacio.</font><br/>";
                }
            }
            else{
                $result = mysqli_query($mysqli,"INSERT INTO usuario(nomUsuario, contraUsuario, primerNombreUsuario, segundoNombreUsuario, primerApellidoUsuario, segundoApellidoUsuario, identificacionUsuario)
                VALUES('$nomUsuario','$contraUsuario','$primerNombreUsuario','$segundoNombreUsuario','$primerApellidoUsuario','$segundoApellidoUsuario','$identificacionUsuario')");

                echo "<font color='green'>Datos adicionados satisfactoriamente.";
                
                // if all the fields are filled (not empty) 
                    
                //insert data to database	

                //display success message
            
            }
        //}
    }
}
?>
<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="login.php">Login</a> <br />
    <form action="register.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>id Usuario</td>
                <td><input type="text" name="nomUsuario" "></td>
            </tr>
            <tr>
				<td>password</td>
                <td><input type="password" name="contraUsuario" "></td>
            </tr>
            <tr>
				<td>Primer nombre</td>
                <td><input type="text" name="primerNombreUsuario" "></td>
            </tr>
            <tr>
				<td>Segundo nombre</td>
                <td><input type="text" name="segundoNombreUsuario" "></td>
            </tr>
            <tr>
				<td>Primer apellido</td>
                <td><input type="text" name="primerApellidoUsuario" "></td>
            </tr>
            <tr>
				<td>Segundo apellido</td>
                <td><input type="text" name="segundoApellidoUsuario" "></td>
            </tr>
            <tr>
				<td>Numero de identificacion</td>
                <td><input type="text" name="identificacionUsuario" "></td>
            </tr>
            <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
        </table>
    </form>
</body>
</html>
