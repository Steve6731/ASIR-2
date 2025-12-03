<?php include("library.php"); ?>

<?php 
   ifBackInicio();

   $text = "Menús ".NUM_MENU." - Segunda página";
   $menu = MENU_SECUNDARIO;
   cabecera($text, $menu)
?>

<main>
   <p>Esta es la segunda página.</p>
</main>

<?php pie(); ?>