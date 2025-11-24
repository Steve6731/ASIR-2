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
    //function
      function PrintHorizontal($logitud,$letra){
        $revuelve = "";
        for ($i=0;$i<=$logitud;$i++){
          $revuelve = $revuelve."$letra";
        }
        return $revuelve;
      }

    //Variables
    $tabla = "";
    $tamanio = rand(4,16);

    //Aqui empieza el programa

    $tabla = $tabla."<tr>".PrintHorizontal($tamanio,"<td>@</td>")."</tr>";
    for ($i=0;$i<=$tamanio-2;$i++){
      $tabla = $tabla.
               "<tr><td>@</td>".
               PrintHorizontal($tamanio-2,"<td> </td>").
               "<td>@</td></tr>";
    }
    $tabla = $tabla."<tr>".PrintHorizontal($tamanio,"<td>@</td>")."</tr>";
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