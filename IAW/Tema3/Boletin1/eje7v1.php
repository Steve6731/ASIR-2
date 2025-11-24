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


      if($nota < 0){
        $textNota = "nota no válida";
      }elseif ($nota < 5){
        $textNota = "suspenso.";
      }elseif($nota < 6){
        $textNota = "aprobado.";
      }elseif($nota < 8){
        $textNota = "bien.";
      }elseif($nota < 10){
        $textNota = "notable.";
      }elseif($nota == 10){
        $textNota = "sobresaliente.";
      }else{
        $textNota = "nota no válida";
      }

      print "<p>Nota: $nota ==> $textNota</p>";
    ?>
</body>
</html>