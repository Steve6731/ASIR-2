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
    3. Hace una página PHP que muestre por pantalla los números del 100 al 0 uno debajo de otro en 
    orden descendente, dando el salto de 2 en 2. Es decir, 100, 98, 96, ..., 2, 0.
    </h2>
    <?php
    //Variables
    $text = "";

    //Aqui empieza el programa
    for ($num = 100;$num >= 0;$num = $num - 2){
        $text = $text."$num<br>";
    }

    //resulta
    print "
    <p>
      $text
    </p>
    ";
    ?>
</body>
</html>