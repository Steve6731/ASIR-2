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
su correspondiente nombre. Ejemplo: 5 ==> mayo, 8→agosto
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $mes = rand(1,12);
      $textMes = "";
      if ($mes == 1){
        $textMes = "Enero";
      }elseif($mes == 2){
        $textMes = "Febrero";
      }elseif($mes == 3){
        $textMes = "Marzo";
      }elseif($mes == 4){
        $textMes = "Abril";
      }elseif($mes == 5){
        $textMes = "Mayo";
      }elseif($mes == 6){
        $textMes = "Junio";
      }elseif($mes == 7){
        $textMes = "Julio";
      }elseif($mes == 8){
        $textMes = "Agosto";
      }elseif($mes == 9){
        $textMes = "Septiembre";
      }elseif($mes == 10){
        $textMes = "Octubre";
      }elseif($mes == 11){
        $textMes = "Noviembre";
      }elseif($mes == 12){
        $textMes = "Diciembre";
      }

      Print "<font size=\"8\">$mes ==> $textMes</font>";
    ?>
</body>
</html>