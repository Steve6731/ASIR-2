<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>
<?php loggingCheck(); ?>
<?php parameterCheck(); ?>

<h1 class="p-5 m-0 " data-bs-theme="dark">Añadir tareas</h1>

<div class="Pcard w-70 m-0 mx-auto">
   <?php
      if(empty($_REQUEST)){
   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
         <label for="Titulo" class="form-label">Titulo</label>
         <input type="text" class="form-control" id="Titulo" name="Titulo">
      </div>
      <div class="mb-3">
         <label for="Descriptcion" class="form-label">Descriptcion</label>
         <input type="text" class="form-control" id="Descriptcion" name="Descriptcion">
      </div>
      <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="alto" value="alto" checked>
         <label class="form-check-label" for="alto">
            Alto
         </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="medio" value="medio">
         <label class="form-check-label" for="medio">
            Medio
         </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="bajo" value="bajo">
         <label class="form-check-label" for="bajo">
            Bajo
         </label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class="btn btn_primary">Voler a Index</a>
   </form>
   <?php
      }else{
         $titulo = recoge("Titulo");
         $descriptcion = recoge("Descriptcion");
         $prioridad = recoge("prio");

         $id =  insertaTarea($titulo,$descriptcion,$prioridad);
         if ($id != 0){
            echo "<p>la Tarea $id añadido</p>";
         }else{
            echo "<p>No se puede añadir la tarea</p>";
         }
         echo "<a href='index.php' class='btn back'>Voler a Index</a>";
      }
   ?>
   </div>
</div>

<?php include("./inc/pie.php")?>