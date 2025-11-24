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
    Calcular el nuevo salario de un obrero si obtuvo un incremento del 25% sobre
su salario anterior.
    </h2>
    <?php
      //Aqui empieza el programa
      //Variables
        $hora = 8;
        $salarioPorHora = 50 ;
        $incremento = 0.25;

        $salarioTotal = $hora * $salarioPorHora;
        $salarioFinal = $hora * $salarioPorHora * ( 1 + $incremento);
      
      //resulta
        echo "<p>Las horas trabajadas: $hora €.</p>";
        echo "<p>El valor por hora: $salarioPorHora €/hora</p>";
        echo "<p>El salario total: $salarioTotal €</p>";
        echo "<p>Si incluso el incremento del 25%: $salarioFinal €";
    ?>
</body>
</html>