<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width = device_width, initial-scale=1.0">
</head>
<body>
    <h1>Boletin 0. Operadores</h1>
    <h2> 
    Dadas las horas trabajadas de una persona y el valor por hora. Calcular su
salario e imprimirlo.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $hora = 8;
        $salarioPorHora = 50 ;

        $salarioTotal = $hora * $salarioPorHora;
      
      //resulta
        echo "<p>Las horas trabajadas: $hora €.</p>";
        echo "<p>El valor por hora: $salarioPorHora €/hora</p>";
        echo "<p>El salario total: $salarioTotal €</p>";
    ?>
</body>
</html>