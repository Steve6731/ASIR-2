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
    <h1>Boletin 7. If y Switch</h1>
    <h2> 
    7. Hacer un programa que para una nota aleatoria almacenada en una variable
muestre por pantalla si se trata de un suspenso, aprobado, bien, notable,
sobresaliente, nota no válida.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $nota = rand(-1,10);
      $textNota = "";

    switch ($nota){
      case 0:
      case 1:
      case 2:
      case 3:
      case 4: $textNota = "suspenso.";break;
      case 5: $textNota = "aprobado.";break;
      case 6: 
      case 7: $textNota = "bien.";break;
      case 8: 
      case 9: $textNota = "notable.";break;
      case 10: $textNota = "sobresaliente.";break;
      default: $textNota = "nota no válida";break;
    }
      print "<p>Nota: $nota ==> $textNota</p>";
    ?>
</body>
</html>