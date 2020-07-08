<?php 

include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);

?>
<h1>Hola <?php echo $userDetails->name; ?></h1>

<h4><a href="logout.php">Cerrar Sesion</a></h4>

