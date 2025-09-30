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
    <h1>Boletin3.McLibre</h1>
    <h2> 
    1 - Dos dados<br>
Escriba un programa que cada vez que se ejecute muestre la tirada de dos dados al azar y diga si ha salido una pareja de valores iguales o el mayor de los valores obtenidos.<br>
    </h2>
    <?php
      //Variables
        $dado1 = rand(1,6);
        $dado2 = rand(1,6);
        $text = "";
      //Aqui empieza el programa
        print "<img src=\".\\imagen\\$dado1.svg\"><img src=\".\\imagen\\$dado2.svg\">";
        if ($dado1 == $dado2){
            $text = "Ha sacado pareja, ";
        }else{
            $text = "No ha sacado pareja, ";
        }

        if ($dado1 >= $dado2){
            $text = $text."El valor más alto es $dado1.";
        }else{
            $text = $text."El valor más alto es $dado2.";
        }
        Print "<p>$text</p>";
    ?>
</body>
</html>