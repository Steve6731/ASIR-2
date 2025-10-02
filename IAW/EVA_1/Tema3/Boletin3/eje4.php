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
   4 - Tres dados
Escriba un programa que cada vez que se ejecute muestre la tirada de tres dados al azar y diga si ha salido un trío, una pareja o el mayor de los valores obtenidos.
    </h2>
    <?php
      //Variables
        $dado1 = rand(1,6);
        $dado2 = rand(1,6);
        $dado3 = rand(1,6);
        $numMax = 0;
        $text = "";
      //Aqui empieza el programa

        if ($dado1 == $dado2){
            if ($dado1 == $dado3){
                $text = "Ha sacado un trío de $dado1";
            }else{
                $text = "Ha sacado una pareja de $dado1";
            }
        }elseif($dado1 == $dado3){
            $text = "Ha sacado un trío de $dado1";
        }elseif($dado2 == $dado3){
            $text = "Ha sacado un trío de $dado2";
        }else{ 
            // desde aqui ya entiendo que no tienen ningun dado igual, voy buscar dado más alto.
            if ($dado1 > $dado2){
                $numMax = $dado1;
            }else{
                $numMax = $dado2;
            }
            if ($dado3 > $numMax){
                $numMax = $dado3;
            }
            $text = "El valor más alto es $numMax";
        }

        Print "
            <img src=\".\\imagen\\$dado1.svg\">
            <img src=\".\\imagen\\$dado2.svg\">
            <img src=\".\\imagen\\$dado3.svg\">
            <p>$text<p>
        ";
    ?>
</body>
</html>