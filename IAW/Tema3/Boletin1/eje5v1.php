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
    5. Hacer una página PHP que tenga 2 variables numéricas y nos indique si la suma
    de los números es mayor que el producto de ellos o lo contrario. Ejemplo:
      •$num1=2; $num2=3; --> "el producto es mayor que la suma"
      •$num1=1; $num2=5; --> "la suma es mayor que el producto "
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $num1 = rand(1,3);
      $num2 = rand(1,3);

      Print "<p>Num1 = $num1</p>";
      Print "<p>Num2 = $num2</p>";

      $suma = $num1 + $num2;
      $producto = $num1 * $num2;
      
      Print "<p>Suma = $suma</p>";
      Print "<p>Producto = $producto</p>";

      if ($producto > $suma){
        Print "El producto es mayor que la suma.";
      } else if ($producto < $suma){
        Print "La suma es mayor que el producto.";
      } else {
        Print "La suma y el producto son iguales.";
      }
    ?>
</body>
</html>