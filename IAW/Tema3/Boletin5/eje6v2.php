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
    6. Crear un programa que a partir de un número entero cree un cuadrado de arrobas (@) con ese
tamaño. Las arrobas sólo se verán en el borde del cuadrado, no en el interior.
    </h2>
    <?php

    //Variables
    $tabla = "";
    $tamanio = rand(4,16);

    //Aqui empieza el programa
    for ($i=1;$i<=$tamanio;$i++){
      $tabla = $tabla."<tr>";
      for ($j=1;$j<=$tamanio;$j++){
        if ($i == 1 or $i == $tamanio 
         or $j == 1 or $j == $tamanio){
              $tabla = $tabla."<td>@</td>";
           }else{
              $tabla = $tabla."<td></td>";
           }
      }
      $tabla = $tabla."</tr>";
    }

    //resulta
    print "
    <table>
      <tbody>
        $tabla
      </tbody>
    </table>
  ";
    ?>
</body>
</html>