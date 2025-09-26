<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
    <!--  
    <link rel="stylesbeet" href"estilo.css">
    -->
</head>
<body> 
    <h1>Boletin 1. If y Switch</h1>
    <h2> 
    8.Hacer un programa que convierta el valor numérico de un mes generado al azar en
su correspondiente nombre. Ejemplo: 5 --> mayo, 8→agosto
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $mes = rand(1,12);
      $numeroParaLista = $mes - 1;
      $listaMes = array(
        "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
        "Agosto","Septiembre","Octubre","Noviembre","Diciembre"
      );

      Print "<font size=\"8\">$mes ==> $listaMes[$numeroParaLista]</font>";
    ?>
</body>
</html>