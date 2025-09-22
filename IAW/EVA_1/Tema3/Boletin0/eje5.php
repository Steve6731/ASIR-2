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
    Una tienda ofrece un descuento del 15% sobre el total de la compra y un cliente
desea saber cuánto deberá pagar finalmente por su compra.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $precioTotal = 100;
        $descuento = 0.15;

        $precioFinal = $precioTotal * (1 - $descuento);
      
      //resulta
        echo "El precio total es $precioTotal si incluye el descuento de 15%, la precio final es $precioFinal";
    ?>
</body>
</html>