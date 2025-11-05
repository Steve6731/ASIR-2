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
    <h1>Boletin5. funtion</h1>
    <h2> 
      calcura area de rectangulo
    </h2>
    <?php
      //funtion
      function mayorEdad($pEdad){
         $return = "";
         if ($pEdad >= 18){
          $return = "Verdad";
         }else{
          $return = "Falso";
         }
         return $return;
      };
      //Variables
      $edad = rand(1,36);
      $resulta = "";
      //Aqui empieza el programa
      $resulta = mayorEdad($edad);

      //resulta
      Print "
      Tiene $edad años<br>
      ¿Es mayor Edad?<br>
      $resulta 
      ";
    ?>
</body>
</html>