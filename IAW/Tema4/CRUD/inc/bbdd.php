<?php
function conectaDB(){
   try{
      $con = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",USER,PASS);
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $con;
   }catch(PDOException $e){
      echo "ERROR: Error al conectar".$e->getMessage();
      exit;
   }
}

function selectTodasTareas(){
   $con = conectaDB() ;
   try{
      $sql = "Select * from tareas";
      $stmt = $con->query($sql);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar las tareas".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
   }
   return $rows;
}

function borrarTareas($id){
   $con = conectaDB();
   try{
      $sql = "DELETE FROM tareas where id=$id";
   }catch(PDOException $e){
      echo "ERROR: Error al seleccionar las tareas".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
   }
}
?>