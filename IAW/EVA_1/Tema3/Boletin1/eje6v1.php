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
    <h1>Boletin 6. If y Switch</h1>
    <h2> 
    6. Realiza un programa que a partir de una variable con una letra detecte si es una
    vocal o no.
    </h2>
    <?php
      //Aqui empieza el programa

      //Variables
      $letraCampo = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n",
                          "o","p","q","r","s","t","u","v","w","x","y","z");
      $numRandon = rand(0,25);

      $letra = $letraCampo[$numRandon];

      if ($letra == "a" or
          $letra == "e" or
          $letra == "i" or
          $letra == "o" or
          $letra == "u" ){
            print "<font size=\"8\"> $letra </font> es un letra vocal.";
          }else{
            print "<font size=\"8\"> $letra </font> no es un letra vocal.";
          }
    ?>
</body>
</html>