<?php /*
   Chinos - chinos.php
   @author Xuan Liu 
*/ ?>

<?php function muestraJuego($moneda1,$moneda2,$dice1,$dice2,$textGana){ ?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <title>
      Los chinos.
      Xuan Liu
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
   <h1>Los chinos</h1>

   <div class="areaJuego">
      <div class="jugador1">
         <p>Punto: <?php echo $_SESSION['punto1']?></p>
         <img src="img/chinos-<?php echo $moneda1?>.svg">
         <p>Jugador1: Creo total es <?php echo $dice1?></p>
      </div>
      <div class="jugador2">
         <p>Punto: <?php echo $_SESSION['punto2']?></p>
         <img src="img/chinos-<?php echo $moneda2?>.svg" style="transform: scale(-1, 1);">
         <p>Jugador2: Creo total es <?php echo $dice2?></p>
      </div>
   </div>
   <p class="gana"><?php echo $textGana?></p>
   <form action="" method="POST">
      <button class="botton" type="submit" name="clear" value="1">🔁Puntuación restablecida</button>
      <button class="botton" type="submit" name="submit" value="1">⏩Seguiente Juego</button>
   </form>

   <footer>
      <p>Xuan Liu</p>
   </footer>
</body>
</html>
<?php } #termina function muestraJuego()?>

<?php
# crear session
session_start();
if (!isset($_SESSION['punto1'])) {
   $_SESSION['punto1'] = 0;
}
if (!isset($_SESSION['punto2'])) {
   $_SESSION['punto2'] = 0;
}

# genera datos
$moneda1 = rand(0,3);
$moneda2 = rand(0,3);
$dice1 = $moneda1 + rand(0,3);
$dice2 = $moneda2 + rand(0,3);

$total = $moneda1 + $moneda2;

# obtener resulta
$textGana = "Gana: ";
if ($dice1 == $total){
   $textGana .= "Jugador1 ";
   $_SESSION["punto1"]++;
}
if ($dice2 == $total){
   $textGana .= "Jugador2 ";
   $_SESSION["punto2"]++;
}
if ($textGana == "Gana: "){
   $textGana = "Nadie gana";
}

# muestra resulta
if (isset($_POST['clear'])) {
   # set punto como 0 y muestra seguiente partido
   $_SESSION['punto1'] = 0;
   $_SESSION['punto2'] = 0;
   muestraJuego($moneda1,$moneda2,$dice1,$dice2,$textGana);
}else{
   # muestra resulta solo
   muestraJuego($moneda1,$moneda2,$dice1,$dice2,$textGana);
}

?>

