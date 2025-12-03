<?php include("library.php"); ?>

<?php 
   $text = "Menús ".NUM_MENU." - Inicio";
   $menu = MENU_PRINCIPAL;
   cabecera($text, $menu)
?>

<main>
   <p>Está usted <b><?php echo $_SESSION['estado']; ?></b><p>
</main>

<?php pie(); ?>

