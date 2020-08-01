<?php
if(isset($_POST["usuario"]) && isset($_POST["clave"])){
	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
	$servername = "localhost";
	$username = "dw";
	$password = "dw2020!";

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
    		die("Fallo conectarse por: " . mysqli_connect_error());
	}

	$sql = "SELECT usuario,clave FROM dw.usuario where usuario = '".$usuario."' and clave = '".md5($clave)."';";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		session_start();
		$_SESSION["usuario"]=$usuario;
		$sql = "insert into sesion(usuario,identificador,fecha_ingreso,activo) values('".$usuario."','".session_id()."',NOW(),1);";
		$conn->query($sql);
	}
} 
?>
<!doctype html>
<html>
<head>
<title>Formulario de prueba </title>
</head>
<body>
<?php
if(isset($_SESSION["usuario"])){
?>
<form action="registro.php" method="POST">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" required/>
<label for="apellido">Apellido</label>
<input type="text" name="apellido" required/>
<input name="enviar" type="submit" value="registrar"/>
</form>
<?php
}
else{
?>
<form action="index.php" method="POST">
<label for="usuario">Usuario</label>
<input type="text" name="usuario" required/>
<label for="clave">Clave</label>
<input type="password" name="clave" required/>
<input name="enviar" type="submit" value="acceder"/>
</form>
<?php
}
?>
</body>
</html>
