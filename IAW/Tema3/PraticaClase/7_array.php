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
    <h1>BoletinX. tiutlo</h1>
    <h2> 
        Pregunta
    </h2>
    <?php
      //Variables
      $alumnos = array("Ana","Pepe","Luz","Anxo"=>0,8=>"Juan");
      $alumnos["jose"] = 12;
      $alumnos[-1]="Xuan";
      $alumnos[$alumnos["jose"]] = "jose";
      $alumnos[-2]= ["a","b","c"];
      $alumnos[-3]["a"]="ana";
      $alumnos[-3]["b"]="bea";
      $alumnos[-3]["c"]="carmen";

      $alumnos[-2.5-2.5]["a"]=[[1,"b","c"],"b","c"];
      $alumnos[-2.5-2.5]["b"]="bea";

      $alumnos[2.5+2.4]="ana";
      $alumnos[2.5+2.6]="ana";
      $alumnos[2.5+2.5]="carmen";
      
      $alumnos[-3.14]="ana";

      //Aqui empieza el programa
      //resulta
      echo "<pre>";
      print_r($alumnos);
      echo "</pre>";
    ?>
</body>
</html>