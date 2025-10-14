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
    <h1>Boletín 5. Programas sencillos PHP</h1>
    <h2> 
    3. Crear un programa que rellene una tabla con las posiciones de cada una de las celdas como se
muestra a connuación
    </h2>
    <?php

    //Variables
    $tabla = "";
    $tamanio = rand(4,16);

    //Aqui empieza el programa
    for ($num1=0;$num1<=$tamanio;$num1++){  
      $tabla = $tabla."<tr>";
        for ($num2=0;$num2<=$tamanio;$num2++){
          $tabla = $tabla."<td>$num1-$num2</td>";
        }
      $tabla = $tabla."</tr>";
    }

    //resulta
    print "
    <table border=\"1\" cellpadding=\"10\">
      <tbody>
        $tabla
      </tbody>
    </table>
    ";
    ?>
</body>
</html>