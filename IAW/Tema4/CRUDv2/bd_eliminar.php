<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>
<?php loggingCheck(); ?>
<?php parameterCheck(); ?>

<h1 class="p-5 m-0 " data-bs-theme="dark">Borrar tareas</h1>

<div class="Pcard w-70 m-0 mx-auto">
   <p>
      <?php
         $id = $_REQUEST["id"];
         $borrado =  borrarTarea($id);
         if ($borrado){
            echo "la Tarea $id borrado";
         }else{
            echo "No se puede borrar la tarea $id";
         }
      ?>
   </p>
   <a href="index.php" class="btn back">Voler a Index</a>
</div>

<?php include("./inc/pie.php")?>