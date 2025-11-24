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
      switch($mes){
        case 1: $textMes = "Enero"; break;
        case 2: $textMes = "Febrero"; break;
        case 3: $textMes = "Marzo"; break;
        case 4: $textMes = "Abril"; break;
        case 5: $textMes = "Mayo"; break;
        case 6: $textMes = "Junio"; break;
        case 7: $textMes = "Julio"; break;
        case 8: $textMes = "Agosto"; break;
        case 9: $textMes = "Septiembre"; break;
        case 10: $textMes = "Octubre"; break;
        case 11: $textMes = "Noviembre"; break;
        case 12: $textMes = "Diciembre"; break;
      }

      Print "<font size=\"8\">$mes ==> $textMes</font>";
    ?>
</body>
</html>