<?php 
   $nombre = $_POST["nombre"];
   setcookie("nombre",$nombre,time()+180);
?>
<a href="./cookie1c.php">Verficar</a>