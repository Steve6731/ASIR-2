<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 3. Calendario.
    Escriba aquí su nombre
  </title>  
</head>

<body>
	<h1>Ejercicio 3. Calendario.</h1>  
   <p>Escribe la funcion diaSiguiente($dia,$mes,$ano) a la que le pases un dia, mes y año y te devuelva una cadena con la fecha de dia siguiente. Dispones de la funcion esBisiesto($ano) dentro del archivo funciones.php. Realiza la llamada a la función con varias fechas para comprobar su funcionamiento.</p>
<?php 
	//funciones
   function esBisiesto($year){
      if((!($year%4) && ($year%100)) || !($year%400)){
         return TRUE;
      }else{
         return FALSE;
      }
   }
   
	//da mes  y año devuelva dia
	function diasMes($m,$a){
		$diaMes = [
			"null",
			31,28,31,30,31,30,
			31,31,30,31,30,31,
		];
		
		if (esBisiesto($a) and $m ==2){
			$dia = 29;
		}else{
			$dia = $diaMes[$m];
		}
		
		return $dia;
	}

	
   function nextDay($dia,$mes,$ano){
      $nextAno = $ano;
      $nextMes = $mes;
      $nextDia = $dia;
      if($dia==(diasMes($mes,$ano))){
         if ($mes==12){
            $nextAno += 1;
            $nextMes = 1;
            $nextDia = 1;
         } else{
            $nextMes += 1;
            $nextDia = 1;
         }
      }else{
         $nextDia += 1;
      }
      $listDate = [
         "dia" => $nextDia,
         "mes" => $nextMes,
         "ano" => $nextAno
      ];
      return $listDate;
   }

   	//da dias print tabla
	function imprimeCalendario($dias,$diaMarca){
		$countTr = ceil($dias/7);
		$contador = 1;
		echo "<table border=\"1\">
			<thead>
				<tr>
					<th>Lunes</th>
					<th>Martes</th>
					<th>Miércoles</th>
					<th>Jueves</th>
					<th>Viernes</th>
					<th>Sabado</th>
					<th>Domingo</th>
				</tr>
			</thead>
		";
		for($i=1;$i<=$countTr;$i++){
			echo "<tr>";
			for($j=1;$j<=7;$j++){
				if ($contador <= $dias){
               if($contador == $diaMarca){
                  echo "<td><font color=\"red\">$contador</font></td>";
               }else{
					   echo "<td>$contador</td>";
               }
				}else{
					echo "<td></td>";
				}
				$contador++;
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	//un array para despues enseña mes en texto
	$textMes = [
		"null",
		"enero","febrero","marzo","abril","Mayo","junio",
		"julio","agosto","septiembre","octubre","noviembre","diciembre"
	];
	
	//empieza programar
	//obtener datos
	$ano = rand(1900,2021);
	$mes = rand(1,12);
	$dia = rand(1,diasMes($mes,$ano));
	
   $diaSiguiente = nextDay($dia,$mes,$ano);
	//enseña resulta
	print "<p>Estás en $dia de ".$textMes[$mes]." de año $ano</p>";
   imprimeCalendario(diasMes($mes,$ano),$dia);

   print "<p>El dia siguiente es ".$diaSiguiente["dia"]." de ".$textMes[$diaSiguiente["mes"]]." de año ".$diaSiguiente["ano"]."</p>";
   imprimeCalendario(diasMes($diaSiguiente["mes"],$diaSiguiente["ano"]),$diaSiguiente["dia"]);

?>
	<footer>
	<p>Xuan Liu</p>
	</footer>
</body>
</html>
