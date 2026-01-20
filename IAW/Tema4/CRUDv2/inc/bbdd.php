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
      exit;
   }
   return $rows;
}

function selectTarea($id){
   $con = conectaDB() ;
   try{
      $sql = "Select * from tareas where id=$id";
      $stmt = $con->query($sql);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $rows;
}

function checkUser($username,$password){
   $correct = False;
   $con = conectaDB() ;
   try{
      $sql = "Select * from users where username = :username";
      $stmt = $con->prepare($sql);
      $stmt -> execute([ ':username' => $username ]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch(PDOException $e){
      echo "ERROR: Error al seleccionar la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   if (password_verify($password, $row['PASSWORD'])) {
      unset($row['password']);
      $correct = True;
   }
   return $correct;
}


function borrarTarea($id){
   $con = conectaDB();
   try{
      $sql = "DELETE FROM tareas where id=$id";
      $stmt = $con->prepare($sql);
      $resultado = $stmt->execute();
   }catch(PDOException $e){
      echo "ERROR: Error al seleccionar las tareas".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $stmt->rowCount() > 0;
}

function insertaTarea($titulo,$descripcion,$prioridad){
   $con = conectaDB();
   try{
      $sql = "INSERT INTO tareas(titulo,tareas,prio) VALUES(:titulo,:descripcion,:prioridad)";
      $stmt = $con->prepare($sql);

      $stmt->bindparam(':titulo',$titulo);
      $stmt->bindparam(':descripcion',$descripcion);
      $stmt->bindparam(':prioridad',$prioridad);

      $stmt->execute();
   }catch(PDOException $e){
      echo "ERROR: Error al inserta la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $con->lastInsertId();
}

function updateTarea($id,$titulo,$descripcion,$prioridad){
   $con = conectaDB();
   try{
      $sql = "UPDATE tareas set titulo=:titulo, tareas=:descripcion, prio=:prioridad where id=:id";
      $stmt = $con->prepare($sql);

      $stmt->bindparam(':id',$id);
      $stmt->bindparam(':titulo',$titulo);
      $stmt->bindparam(':descripcion',$descripcion);
      $stmt->bindparam(':prioridad',$prioridad);

      $stmt->execute();
   }catch(PDOException $e){
      echo "ERROR: Error al update la tarea".$e->getMessage();
      file_put_contents("PDOErrors.txt","\r\n".date('j F, Y mg:i a').$e->getMessage(),FILE_APPEND);
      exit;
   }
   return $stmt->rowCount();
}
?>