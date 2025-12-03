<?php include("library.php"); ?>

<?php 
   $text = "Menús ".NUM_MENU." - Segunda página";
   $menu = MENU_SECUNDARIO;
   cabecera($text, $menu)
?>

<main>
   <form action="pagina-2b.php" method="get">
      <p>¿Está seguro de querer ir a la segunda página?</p>

      <p>
      <input type="submit" value="Sí" name="si">
      <input type="submit" value="No" name="no">
      </p>
   </form>
</main>

<?php pie(); ?>