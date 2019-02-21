<?php

$conector = new mysqli("localhost", "root", "", "liga");
if ($conector->connect_errno) {
  echo "Fallo al conectar a MySQL: (".$conector->connect_errno.")" . $conector->connect_error;
} else {
  $nombre = $_POST["nombre"];
  $ciudad = $_POST["ciudad"];
  $web = $_POST["web"];
  $puntos = $_POST["puntos"];

  $consulta = "INSERT INTO `equipo` (`id_equipo`, `nombre`, `ciudad`, `web`, `puntos`) 
              VALUES ('', '$nombre', '$ciudad', '$web', '$puntos')";

  $resultado = $conector->query($consulta);

  if ($resultado==false) {
    echo $conector->error;
    #echo "La inserción de datos ha fallado";
  } else {
    echo "Los datos se introdujeron con exito";
  }
  $resultado = $conector->query("SELECT * FROM equipo");
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
    

<h2>Información</h2>

<table>
  <tr>
    <td><b>Nombre</b></td>
    <td><b>Ciudad</b></td>
    <td><b>Página Web</b></td>
    <td><b>Puntos</b></td>
  </tr>

<?php 
  foreach ($resultado as $equipo) {
    echo "<tr>";
    echo "<td>".$equipo['nombre']." </td>";
    echo "<td>".$equipo['ciudad']."</td>";
    echo "<td>".$equipo['web']."</td>";
    echo "<td>".$equipo['puntos']."</td>";
    echo "</tr>";
  }
  echo "</table>";        
?>

</body>
</html>