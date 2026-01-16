<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>
<?php loggingCheck(); ?>

<h1 class="p-5 m-0 " data-bs-theme="dark">Lista de tareas</h1>
<div class="Pcard w-6 m-3 mx-auto">
   <div class="card p-3" data-bs-theme="light">
   <table class="table table-striped table-hover">
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
      if (isset($_REQUEST['clear']) and $_REQUEST['clear']==1) {
         # set punto como 0 y muestra seguiente partido
         $_SESSION['logging'] = 0;
         $_SESSION['USER'] = "";
         $_SESSION['PASS'] = "";
         header("Location: index.php");
      }

      if(!empty($rows)){
         foreach($rows as $row){
            echo "<tr>";
            echo "<th scope='row'>".$row['ID']."</th>";
            echo "<td>".$row['titulo']."</td>";
            echo "<td>".$row['tareas']."</td>";
            echo "<td>".$row['prio']."</td>";
            echo "<td class='accion'>
               <a class='btn' href='bd_editar.php?id=".$row['ID']."'>Editar</a></div>
               <a class='btn delete' href='bd_eliminar.php?id=".$row['ID']."'>Eliminar</a></div>
            </td>";
            echo "</tr>";
         }
      } else {
         echo "<tr><td colspan='5'>No hay tareas disponibles</td></tr>";
      }
   ?>
   </tbody>
   </table>
      <div>
         <form action="">
            <div class="btnArea">
               <a class='btn btn_secondary m-1' href='bd_insert.php'>Añadir tarea</a>
                  <button type="submit" class='btn btn_secondary m-1' name="clear" value="1">Log out</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php include("./inc/pie.php")?>