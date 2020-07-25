<!doctype html>
<html>
<head>
<title>Salida de prueba </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "dw";
$password = "dw2020!";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}
$sql = "SELECT nombre,apellido FROM dw.persona;";
$result = $conn->query($sql);
echo "<table>";
echo "<tr><th>Nombre</th><th>Apellido</th></tr>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre"]. "</td><td> " . $row["apellido"]. "</td></tr>";
    }
} else {
   echo "0 registros";
}
echo "</table>";
$conn->close();
?>
</body>
</html>
