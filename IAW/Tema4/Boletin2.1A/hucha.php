
<?php function muestraPrograma(){ ?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <title>
      Una hucha
      Xuan Liu
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>
   <h1>UN HUCHA</h1>
   <div class="areaMain">
      <img src="./img/images.jpg" />
      <p><?php echo $_SESSION["dinero"]; ?></p>
   </div>
   <form action="" method="POST">
      <div class="areaButton">
         <button type="submit" name="dinero" value="0.01"> <img src="img\euro-cent-01.svg" /></button>
         <button type="submit" name="dinero" value="0.02"> <img src="img\euro-cent-02.svg" /></button>
         <button type="submit" name="dinero" value="0.05"> <img src="img\euro-cent-05.svg" /></button>
         <button type="submit" name="dinero" value="0.10"> <img src="img\euro-cent-10.svg" /></button>
         <button type="submit" name="dinero" value="0.20"> <img src="img\euro-cent-20.svg" /></button>
         <button type="submit" name="dinero" value="0.50"> <img src="img\euro-cent-50.svg" /></button>
         <button type="submit" name="dinero" value="1"> <img src="img\euro-1.svg" /></button>
         <button type="submit" name="dinero" value="2"> <img src="img\euro-2.svg" /></button>
      </div>
      <div class="buttonVacia">
         <button class="botton" type="submit" name="clear" value="1">🔁Vacia la hucha</button>
      </div>
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
if (!isset($_SESSION['dinero'])) {
   $_SESSION['dinero'] = 0;
}

# añadir dinero
if (isset($_REQUEST["dinero"])){
   $_SESSION['dinero'] += $_REQUEST["dinero"];
}

# muestra resulta
if (isset($_POST['clear'])) {
   # set punto como 0 y muestra seguiente partido
   $_SESSION['dinero'] = 0;
   muestraPrograma();
}else{
   # muestra resulta solo
   muestraPrograma();
}

?>

