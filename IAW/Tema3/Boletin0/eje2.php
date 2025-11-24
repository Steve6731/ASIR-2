<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> 
    Convertir Grados Celsius a Grados Fahrenheit. Fórmula: T(°F) = T(°C) × 9/5 + 32
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $fahrenheit = 0;
        $celsius = 27;

        $fahrenheit = $celsius * 9/5 +32;
      
      //resulta
        echo "$celsius grados Celsius es igual que $fahrenheit grados Fahrenheit .";
    ?>
</body>
</html>