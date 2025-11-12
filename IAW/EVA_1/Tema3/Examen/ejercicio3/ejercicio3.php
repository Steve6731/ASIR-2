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

<?php include(".\\inc\\funciones.php");//obtener funcion recoge?>
<?php 
	//funciones
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
	
	//da dias print tabla
	function imprimeCalendario($dias){
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
					echo "<td>$contador</td>";
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
	$dia = diasMes($mes,$ano);
	
	//enseña resulta
	print "<p>Estás en  mes ".$textMes[$mes]." de año $ano</p>";
	imprimeCalendario($dia);
?>
	<footer>
	<p>Xuan Liu</p>
	</footer>
</body>
</html>
