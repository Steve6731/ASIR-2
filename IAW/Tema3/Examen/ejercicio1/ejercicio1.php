<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Índice de masa corporal.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/estilos.css" rel="stylesheet" type="text/css" title="Color" />  
</head>

<body>
  <?php 
  //empieza funcion imc
  function imc($peso,$altura){
    if (empty($peso) or empty($altura)){
  ?>
  <h1>Índice de masa corporal</h1>

  <form action="" method="get">
    <p>Escriba su peso en kilogramos y su altura en cm para calcular su índice de masa corporal.</p>
	
	<p><label>Peso</label><input type="text" name="peso"/>Kg</p>
	<p><label>Altura</label><input type="text" name="altura"/>cm</p>	
    
	<p>
      <input type="submit" value="Calcular">
      <input type="reset" value="Borrar">
    </p>
  </form>
  <h1>Pon el altura y peso primero</h1>
<?php }else{?>
  <h2>Su IMC</h2>
  <p>Con un peso de <strong><?php echo $peso?> kg</strong> y una altura de <strong><?php echo $altura*100?> cm</strong>, su índice de masa corporal es <strong><?php echo $_SESSION["imc"]?></strong>.</p>

  <p>Un imc muy alto indica obesidad. Los valores "normales" de imc están entre 20 y 25, pero esos límites dependen de la edad, del sexo, de la constitución física, etc.</p>
<?php }} //acaba else y funcion imc?>


<?php include("./inc/funciones.php");//obtener funcion recoge?>

<?php 
//crear session porque en funcion no puedo poner $imc
session_start();
if (!isset($_SESSION["imc"])){
  $_SESSION["imc"] = 0;
}

//variables por defecto
$peso = 0;
$altura = 0;

//como muestra los contenidos
if (empty($_REQUEST)){
  imc($peso,$altura);
}else{
  //obtener datos y calculo
  $peso = recoge("peso");
  $altura = recoge("altura")/100;
  $_SESSION["imc"] = round($peso / $altura**2);
  imc($peso,$altura);
}
?>

	<footer>
	<p>Xuan Liu</p>
	</footer>
</body>
</html>
