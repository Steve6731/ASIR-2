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
    <h1>Boletin4. While, do..while y For</h1>
    <h2> 
    2. Realiza un programa que muestre por pantalla la tabla de multiplicar de un número
    </h2>
    <?php

    //Variables
    $tabla = "";
    $num1 = 9;
    $num2 = 1;
    $num3 = 0;

    //Aqui empieza el programa
    while ($num1>=1){  
      $tabla = $tabla."<tr><td>$num1</td>";
      $num2 = 1;
      while ($num2<=9){
          $num3 = $num1 * $num2;
          if ($num2 <= $num1){
            $tabla = $tabla."<td>$num2 x $num1 = $num3 </td>";
          }else{
            $tabla = $tabla."<td> </td>";
          }
          $num2++;
        }
      $tabla = $tabla."</tr>";
      $num1--;
    }

    //resulta
    print "
    <table border=\"1\">
      <thead>
        <tr>
            <th colspan=\"10\">la tabla de multiplica</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td> </td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
        </tr>
        $tabla
      </tbody>
    </table>
  ";
    ?>
</body>
</html>