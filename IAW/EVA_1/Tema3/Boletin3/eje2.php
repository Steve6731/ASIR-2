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
   2 - Juego: Dado más alto<br>
Escriba un programa que cada vez que se ejecute muestre la tirada de dos jugadores que tiran un dado al azar cada uno y diga quién ha ganado.<br>

En este juego, gana el jugador que:<br>

ha obtenido una puntuación más alta que el otro jugador<br>
Si no gana ningún jugador, lógicamente se habrá producido un empate.<br>
    </h2>
    <?php
      //Variables
        $dado1 = rand(1,6);
        $dado2 = rand(1,6);
        $text = "";
      //Aqui empieza el programa

        if ($dado1 == $dado2){
            $text = "Han empatado ";
        }elseif($dado1 > $dado2){
            $text = "Ha ganado el jugador 1";
        }else{
            $text = "Ha ganado el jugador 2";
        }
        Print "
            <table>
                <thead>
                    <tr>
                        <th>Jugador 1</th>
                        <th>Jugador 2</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                    <tr>
                        <td style = \"padding: 10px;background-color: red;\"><img src=\".\\imagen\\$dado1.svg\"></td>
                        <td style = \"padding: 10px;background-color: blue;\"><img src=\".\\imagen\\$dado2.svg\"></td>
                        <td>$text</td>
                    </tr>
                <tbody>
                
                </tbody>
            </table>
        ";
    ?>
</body>
</html>