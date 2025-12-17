<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>
<h1 class="w-100 container-fluid p-5 m-0 " data-bs-theme="dark">Lista de tareas</h1>
<div class="w-70 m-0 mx-auto">
   <div class="card p-3" data-bs-theme="light">
   <table class="table table-striped table-sm">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Tarea</th>
         <th scope="col">Descripción</th>
         <th scope="col">Estado</th>
         <th scope="col">Acciones</th>
      </tr>
   </thead>
   <tbody>
   <?php 
      $rows = selectTodasTareas();
      /*echo "<pre>";
         print_r($rows);
      echo "</pre>";*/
      if(!empty($rows)){
         foreach($rows as $row){
            echo "<tr>";
            echo "<th scope='row'>".$row['ID']."</th>";
            echo "<td>".$row['titulo']."</td>";
            echo "<td>".$row['tareas']."</td>";
            echo "<td>".$row['prio']."</td>";
            echo "<td>
                    <a href='editar.php?id=".$row['ID']."'>Editar</a> | 
                    <a href='eliminar.php?id=".$row['ID']."'>Eliminar</a>
                  </td>";
            echo "</tr>";
         }
      } else {
         echo "<tr><td colspan='5'>No hay tareas disponibles</td></tr>";
      }
   ?>
   </tbody>
   </table>
</div>
</div>
<?php include("./inc/pie.php")?>