<?php session_start() ?>
<?php 
   if(!isset($_SESSION["username"]) or !isset($_SESSION["password"]))
      {header("Location: index.php");
      exit;}
?>
<?php include "inc\\encapezado.php"; ?>
<?php include "inc\\function.php"; ?>
<h1> Bienvenido </h1>
<h3> Tus datos son: </h3>
<p>Username: <?php echo $_SESSION["username"] ?></p>
<p>Password: <?php echo $_SESSION["password"] ?></p>

<a href="logout.php"> LOGOUT </a>
<?php      
   include "inc\\pie.php";
?>