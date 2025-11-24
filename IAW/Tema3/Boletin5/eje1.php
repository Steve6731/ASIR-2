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
        1. Crear un programa que escriba dos columnas de números, en la primera se colocan los números del 1
        al 100, en la segunda los números del 100 al 1
    </h2>
    <?php
      //funtion

      //Variables
        $tbody = "";
        
      //Aqui empieza el programa
        for ($i=1;$i<=100;$i++){
            $j = 101 -$i;
            $tbody = $tbody."
                <tr>
                    <td>$i</td>
                    <td>&nbsp&nbsp&nbsp</td>
                    <td>$j</td>
                </tr>";
        }
      //resulta
    print "
        <table>
        <tbody>
            $tbody
        </tbody>
        </table>
    ";
    ?>
</body>
</html>