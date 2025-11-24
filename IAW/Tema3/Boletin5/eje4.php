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
    4. Crea un programa que rellene una tabla como la anterior pero con la suma de las celdas internas
    </h2>
    <?php

    //Variables
    $tabla = "";
    $tamaño = rand(4,16);

    //Aqui empieza el programa
    for ($num1=0;$num1<=$tamaño;$num1++){  
      $tabla = $tabla."<tr>";
        for ($num2=$num1;$num2<=$num1+$tamaño;$num2++){

          if (!$num2){
            $tabla = $tabla."<td>+</td>";
          }else{
            $tabla = $tabla."<td>$num2</td>";
          }
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