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
        5 - Juego: Tres dados más altos<br>
            Escriba un programa que cada vez que se ejecute muestre la tirada de dos jugadores que tiran cada uno tres dados al azar y diga quién ha ganado.<br>

            En este juego, gana el jugador que:<br>

            1. ha obtenido un trío de dados iguales de mayor valor, si los dos han obtenido tríos distintos<br>
            2. ha obtenido un trío de dados iguales, si el otro jugador no ha obtenido trío<br>
            3. ha obtenido una pareja de dados iguales de mayor valor, si los dos han obtenido parejas distintas<br>
            4. ha obtenido una puntuación total mayor, si los dos han obtenido la misma pareja<br>
            5. ha obtenido una pareja de dados iguales, si el otro jugador no ha obtenido pareja<br>
            6. ha obtenido la mayor puntuación total, si ningún jugador ha obtenido pareja<br>
            7. Si no gana ningún jugador, lógicamente se habrá producido un empate.<br>
    </h2>
    <?php
      //Variables
        $dado1 = rand(1,6);
        $dado2 = rand(1,6);
        $dado3 = rand(1,6);
        $dado4 = rand(1,6);
        $dado5 = rand(1,6);
        $dado6 = rand(1,6);
        $contador1 = 1;
        $contador2 = 1;
        $suma1 = $dado1 + $dado2 + $dado3;
        $suma2 = $dado4 + $dado5 + $dado6;
        $text = "";
      //Aqui empieza el programa

      //contar cuando iguales hay el jugador 1
        if ($dado1 == $dado2){
            $contador1 = 2;
            if ($dado1 == $dado3){
                $contador1++;
            }
        }elseif ($dado1 == $dado3){
        $contador1 = 2;
        }elseif ($dado2 == $dado3){
        $contador1 = 2;
        }
        
      //contar cuando iguales hay el jugador 2
        if ($dado4 == $dado5){
            $contador2 = 2;
            if ($dado4 == $dado6){
                $contador2++;
            }
        }elseif ($dado4 == $dado6){
        $contador2 = 2;
        }elseif ($dado5 == $dado6){
        $contador2 = 2;
        }
        
      //Determinar el resultado
        if ($contador1 == $contador2){
            if ($suma1 > $suma2){
                $text = "Ha ganado el jugador 1";
            }elseif($suma1 < $suma2){
                $text = "Ha ganado el jugador 2";
            }else{
                $text = "Han empatado ";
            }
        }elseif($contador1 > $contador2){
            $text = "Ha ganado el jugador 1";
        }else{
            $text = "Ha ganado el jugador 2";
        }
    
      //resultado
        Print "
            <table>
                <thead>
                    <tr>
                    <th colspan=\"3\">Jugador 1</th>
                    <th colspan=\"3\">Jugador 2</th>
                    <th>Resultado</th>
                    </tr>
                </thead>
                    <tr>
                    <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado1.svg\"></td>
                    <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado2.svg\"></td>
                    <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado3.svg\"></td>
                    <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado4.svg\"></td>
                    <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado5.svg\"></td>
                    <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado6.svg\"></td>
                    <td>$text</td>
                    </tr>
                <tbody>
                
                </tbody>
            </table>
        ";
    ?>
</body>
</html>