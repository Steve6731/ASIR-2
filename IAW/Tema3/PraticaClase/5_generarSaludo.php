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
          $return = True;
         }else{
          $return = False;
         }
         return $return;
      };
      function mostraSaludo($pNombre,$mayorEdad){
        if($mayorEdad){
          Print "Hola señor $pNombre"
        }else{
          Print "Hola pequeñino $pNombre"
        }
      }
      //Variables
      $edad = rand(1,36);
      $mayorEdad = False;
      $nombre = rand(0,11);
      $listaNombre = array(
        "Marte","Yayo","Rusia","Abril","Nilo","Martín","Chile",
        "Dolly","Septiembre","Octubre","Noviembre","Diciembre"
      );
      //Aqui empieza el programa
      $mayorEdad = mayorEdad($edad);
      mostraSaludo("Xuan",$mayorEdad);
      //resulta
      ";
    ?>
</body>
</html>