<?php session_start() ?>
<?php 
   if(!isset($_SESSION["username"]) or !isset($_SESSION["password"]))
      {header("Location: index.php");
      exit;}
?>
<?php include "inc\\encapezado.php"; ?>
<?php include "inc\\function.php"; ?>
<h1> Hasta pronto </h1>
<p><?php echo $_SESSION["username"] ?></p>

<a href="logging.php"> LOGOUT </a>
<?php      
   include "inc\\pie.php";
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
?>