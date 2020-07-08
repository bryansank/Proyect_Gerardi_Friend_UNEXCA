<?php
$server = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "delinasd";
$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("En este momento no es posible establecer una comunicación con el servidor");
$nombre =$_POST['NombreCliente'];
$apellido =$_POST['ApellidoCliente'];
$cedula =$_POST['cedula'];
$telefono =$_POST['telefonos'];
//$producto =$_POST['Producto'];
//$estado =$_POST['estado'];
//$ubicacion =$_POST['texto'];

$insertar = "INSERT into datos values('$nombre','$apellido', '$cedula', '$telefono')";

$resultado= mysqli_query($conexion,$insertar) or die ("Error al insertar los registros");
mysqli_close($conexion);
echo"Datos insertados correctamente";
?>



