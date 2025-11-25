<?php
/**
 * Chinos - chinos.php
 *
 * @author Xuan Liu
 *
 */

// session
session_start();
if (!isset($_SESSION['contador'])) {
   $_SESSION['contador'] = 0;
}else{
   $_SESSION['contador']++;
}
?>
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

  <p>Actualice la página para mostrar otra partida.</p>

<?php

print "  <p class=\"aviso\">Ejercicio incompleto</p>\n";

?>

  <footer>
    <p>Xuan Liu</p>
  </footer>
</body>
</html>
