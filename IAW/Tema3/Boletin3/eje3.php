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
   3 - Juego: Dos dados más altos<br>
        Escriba un programa que cada vez que se ejecute muestre la tirada de dos jugadores que tiran cada uno dos dados al azar y diga quién ha ganado.<br>

        En este juego, gana el jugador que:<br>

        1. ha obtenido una pareja de dados iguales de mayor valor, si los dos han obtenido parejas distintas<br>
        2. ha obtenido una pareja de dados iguales, si el otro jugador no ha obtenido pareja<br>
        3. ha obtenido una puntuación total mayor, si ningún jugador ha obtenido pareja<br>
        4. Si no gana ningún jugador, lógicamente se habrá producido un empate.<br>
    </h2>
    <?php
      //Variables
        $dado1 = rand(1,6);
        $dado2 = rand(1,6);
        $dado3 = rand(1,6);
        $dado4 = rand(1,6);
        $contador1 = 1;
        $contador2 = 1;
        $suma1 = $dado1 + $dado2;
        $suma2 = $dado3 + $dado4;
        $text = "";

      //Aqui empieza el programa

      //contar cuando iguales hay el jugador 1
        if ($dado1 == $dado2){
            $contador1 = 2;
        }
      //contar cuando iguales hay el jugador 2
        if ($dado3 == $dado4){
            $contador2 = 2;
        }

      //Determinar el resultado
        if ($contador1 == $contador2){
            if ($suma1 == $suma2){
                $text = "Han empatado ";
            }elseif($suma1 > $suma2){
                $text = "Ha ganado el jugador 1";
            }else{
                $text = "Ha ganado el jugador 2";
            }
        }elseif($contador1 > $contador2){
            $text = "Ha ganado el jugador 1";
        }else{
            $text = "Ha ganado el jugador 2";
        }

        Print "
            <table>
                <thead>
                    <tr>
                        <th colspan=\"2\">Jugador 1</th>
                        <th colspan=\"2\">Jugador 2</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                    <tr>
                        <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado1.svg\"></td>
                        <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado2.svg\"></td>
                        <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado3.svg\"></td>
                        <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado4.svg\"></td>
                        <td>$text</td>
                    </tr>
                <tbody>
                
                </tbody>
            </table>
        ";
    ?>
</body>
</html>