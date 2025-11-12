
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Ejercicio 3 - Array reverse</title>
	</head>
	
	<body>
		<h1>Ejercicio 2 - Array reverse</h1>
		<h2>Autor: Xuan</h2>		
<?php 

	//funcion
	function cambiar(&$num1,&$num2){
		$a = $num1;
		$num1 = $num2;
		$num2 = $a;
	}

	function arrayToTr($array){
		$textLista = "";
		foreach($array as $numero){
			$textLista .= "<td>$numero</td>";
		}
		return $textLista;
	}

	function daleLaVuleta(&$array){
		for($i=0;$i<=4;$i++){
			$iFinal = 9-$i;
			cambiar($array[$i],$array[$iFinal]);
		}
	}

	//indica array
	$listaNumeros = [
		rand(1,100),//1
		rand(1,100),//2
		rand(1,100),//3
		rand(1,100),//4
		rand(1,100),//5
		rand(1,100),//6
		rand(1,100),//7
		rand(1,100),//8
		rand(1,100),//9
		rand(1,100),//10
	];

	//empieza programa
	//obtener lista no cambiado
	$textListaOriginal = arrayToTr($listaNumeros);
	
	//cambiar lista
	daleLaVuleta($listaNumeros);

	//obtener lista cambiado
	$textListaFinal = arrayToTr($listaNumeros);

	//resulta
	print"
		<table border=\"1\">
			<tr>
				<td>Array origianl</td>
				$textListaOriginal
			</tr>
			<tr>
				<td>Array al revés</td>
				$textListaFinal
			</tr>
		</table>
	"
?>
		
	</body>
</html>