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
  <h1>Boletin7. array</h1>
  <h2> 
   Ejercicio 7: Carrito de la Compra<br/>
      Crea un array que simule un carrito de la compra. Este debe ser un array indexado donde cada elemento es <br/>
      un array asociativo con los detalles de un producto: nombre, precio y cantidad.<br/>
      Ejemplo de estructura:<br/>
      PHP<br/>
      $carrito = [<br/>
         ['nombre' => 'Camiseta', 'precio' => 20.50, 'cantidad' => 2],<br/>
         ['nombre' => 'Pantalón', 'precio' => 45.99, 'cantidad' => 1],<br/>
         ['nombre' => 'Zapatillas', 'precio' => 89.95, 'cantidad' => 1]<br/>
      ];<br/>
      1.Utiliza un bucle foreach para recorrer el carrito.<br/>
      2.Dentro del bucle, calcula el $subTotal de cada producto (precio * cantidad).<br/>
      3. Muestra el nombre, precio, cantidad y $subTotal de cada producto.<br/>
      4. Al final del script, calcula y muestra el precio total de la compra.<br/>
  </h2>
  <?php
    //variable
      $carrito = [
        ['nombre' => 'Camiseta', 'precio' => 20.50, 'cantidad' => 2],
        ['nombre' => 'Pantalón', 'precio' => 45.99, 'cantidad' => 1],
        ['nombre' => 'Zapatillas', 'precio' => 89.95, 'cantidad' => 1]
      ];
      $thead = "";
      $tbody = "";
      $prescioTotal = 0;

    //Aqui empieza el programa
    //print thead
    $thead .= "<tr>";
    foreach($carrito[0] as $clave => $valor){
      $thead .= "<th>$clave</th>";
    }
    $thead .= "<th>subTotal</th></tr>";

    //print tbody
    foreach($carrito as $producto){
      $subTotal = $producto["precio"] * $producto["cantidad"];
      $prescioTotal += $subTotal;

      $tbody .= "<tr><td>".$producto["nombre"]."</td>";
      $tbody .= "<td>".$producto["precio"]."</td>";
      $tbody .= "<td>".$producto["cantidad"]."</td>";
      $tbody .= "<td>$subTotal</td></tr>";
    }
    //resulta
    print "
      <table border = \"1\">
        <thead>
          $thead
        </thead>
        <tbody>
          $tbody
          <tr>
            <td >Prescio Total</td>
            <td colspan=\"3\">$prescioTotal</td>
          </tr>
        </tbody>
      </table>
    ";
  ?>
</body>
</html>