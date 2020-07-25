<?php
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$servername = "localhost";
$username = "dw";
$password = "dw2020!";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}

$sql = "INSERT INTO dw.persona (nombre,apellido)
VALUES ('$nombre', '$apellido')";

if ($conn->query($sql) === TRUE) {
    echo "Se registro exitosamente";
    header("Location: mostrar.php");
    exit; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
