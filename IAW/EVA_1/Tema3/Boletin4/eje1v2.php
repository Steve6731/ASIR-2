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
    1. Realiza un programa que genere los resultados del juego de los Euromillones, es decir, que
muestre 5 números aleatorios entre 1 y 50, más 2 estrellas entre 1 y 9 utilizando bucles. Para este
ejercicio no importa que se repitan los números.
    </h2>
    <?php

    //Variables
    $numeros = "";
    
    //Aqui empieza el programa
    for ($i=1;$i<=5;$i++){
        $numeros = $numeros."<td>".strval(rand(1,50))."</td>";
    }

    for ($i=1;$i<=2;$i++){
        $numeros = $numeros."<td>".strval(rand(1,9))."*</td>";
    }
    
    //resulta
    print "
    <table border=\"1\">
      <thead>
        <tr>
            <th colspan=\"5\">numeros</th>
            <th colspan=\"2\">numeros*</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            $numeros
        </tr>
      </tbody>
    </table>
  ";
    ?>
</body>
</html>