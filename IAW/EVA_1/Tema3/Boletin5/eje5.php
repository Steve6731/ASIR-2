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
    5. Crea un programa que rellene una tabla como la anterior pero con el producto de las celdas internas
    </h2>
    <?php

    //Variables
    $tabla = "";
    $thead = "<td>*</td>";
    $tamanio = rand(4,16);

    //Aqui empieza el programa
    for ($num1=1;$num1<=$tamanio;$num1++){  
      $tabla = $tabla."<tr><td>$num1</td>";
      $thead = $thead."<td>$num1</td>";
        for ($num2=1;$num2<=$tamanio;$num2++){
          $num3 = $num1 * $num2;
          $tabla = $tabla."<td>$num3 </td>";
        }
      $tabla = $tabla."</tr>";
    }

    //resulta
    print "
    <table border=\"1\" cellpadding=\"10\">
      <tbody>
        <tr>
        $thead
        </tr>
        $tabla
      </tbody>
    </table>
  ";
    ?>
</body>
</html>