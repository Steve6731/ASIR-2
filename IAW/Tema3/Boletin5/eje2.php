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
    2. Crear el programa que escriba la tabla de multiplicar de todos los números del 1 al 15
    </h2>
    <?php

    //Variables
    $tabla = "";
    $thead = "<td> </td>";

    //Aqui empieza el programa
    for ($num1=15;$num1>=1;$num1--){  
      $tabla = $tabla."<tr><td>$num1</td>";
      $numThead = 16 - $num1;
      $thead = $thead."<td>$numThead</td>";
        for ($num2=1;$num2<=15;$num2++){
            $num3 = $num1 * $num2;
            if ($num2 <= $num1){
              $tabla = $tabla."<td>$num2 x $num1 = $num3 </td>";
            }else{
              $tabla = $tabla."<td> </td>";
            }
        }
      $tabla = $tabla."</tr>";
    }

    //resulta
    print "
    <table border=\"1\">
      <thead>
        <tr>
            <th colspan=\"16\">la tabla de multiplica</th>
        </tr>
      </thead>
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