<?php
  define("NUM_MENU",  3);
  define("MENU_PRINCIPAL",  1);  // Para función cabecera()
  define("MENU_SECUNDARIO",  2);  // Para función cabecera()
?>

<?php function cabecera($text, $menu){ ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
   <?php echo $text ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-proyectos.css" title="Color">
</head>

<body>
  <header>
    <h1><?php echo $text ?></h1>

    <nav>
      <ul>
        <?php if($menu==2){echo '<li><a href="index.php">Página inicial</a></li>';} ?>
        <?php if($menu==1){echo '<li><a href="pagina-2a.php">Segunda página</a></li>';} ?>
        <?php if($menu==1){echo '<li><a href="pagina-3a.php">Tercera página</a></li>';} ?>
      </ul>
    </nav>
  </header>

<?php } //acaba function cabecera?>

<?php function pie(){ ?>
<footer>
    <p class="ultmod">
      Última modificación de esta página:
      <time datetime="2021-12-09">9 de diciembre de 2021</time>
    </p>

    <p class="licencia">
      Este programa forma parte del curso <strong><a href="https://www.mclibre.org/consultar/php/">Programación 
      web en PHP</a></strong> de <a href="https://www.mclibre.org/" rel="author">Bartolomé Sintes Marco</a>.<br>
      El programa PHP que genera esta página se distribuye bajo 
      <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.
    </p>
  </footer>
 </body>
</html>
<?php } //acaba function pie?>

<?php function ifBackInicio(){
   if (isset($_REQUEST["no"])){
      header("Location: index.php");
   }
}?>