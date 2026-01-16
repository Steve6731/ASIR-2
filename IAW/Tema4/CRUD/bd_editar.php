<?php 
 if (empty($_REQUEST)){header("Location: index.php");exit;}
?>

<?php include("./inc/configuracion.php")?>
<?php include("./inc/function.php")?>
<?php include("./inc/bbdd.php")?>
<?php include("./inc/encabezado.php")?>
<h1 class="p-5 m-0 " data-bs-theme="dark">Editar tareas</h1>

<div class="Pcard w-70 m-0 mx-auto">
   <?php
      if(!isset($_REQUEST["Titulo"])||!isset($_REQUEST["Descriptcion"])||!isset($_REQUEST["prio"])){
        
      $id = $_REQUEST["id"];
      $datos = selectTarea($id);

      $tiutlo = $datos[0]["titulo"];
      $descriptcion = $datos[0]["tareas"];
      $prioridad = $datos[0]["prio"];

   ?>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
         <label for="Titulo" class="form-label">Titulo</label>
         <input type="text" class="form-control" id="Titulo" name="Titulo" value="<?php echo $tiutlo; ?>">
      </div>
      <div class="mb-3">
         <label for="Descriptcion" class="form-label">Descriptcion</label>
         <input type="text" class="form-control" id="Descriptcion" name="Descriptcion" value="<?php echo $descriptcion; ?>">
      </div>
      <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="alto" value="alto" <?php if ($prioridad=="alto"){echo "checked";} ?>>
         <label class="form-check-label" for="alto">
            Alto
         </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="medio" value="medio" <?php if ($prioridad=="medio"){echo "checked";} ?>>
         <label class="form-check-label" for="medio">
            Medio
         </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="radio" name="prio" id="bajo" value="bajo" <?php if ($prioridad=="bajo"){echo "checked";} ?>>
         <label class="form-check-label" for="bajo">
            Bajo
         </label>
         <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="index.php" class="btn btn_primary">Voler a Index</a>
   </form>
   <?php
      }else{   
         $id = recoge("id");
         $titulo = recoge("Titulo");
         $descriptcion = recoge("Descriptcion");
         $prioridad = recoge("prio");

         updateTarea($id,$titulo,$descriptcion,$prioridad);
         if ($id != 0){
            echo "<p>la Tarea $id modificado</p>";
         }else{
            echo "<p>No se puede añadir la tarea</p>";
         }
         echo "<a href='index.php' class='btn back'>Voler a Index</a>";
      }
   ?>
   </div>
</div>

<?php include("./inc/pie.php")?>