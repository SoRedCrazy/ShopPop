<?php
//supriion de la session puis retour a l'aceuil
session_start();
session_destroy();
header('location: ../index.php');
exit;
?>
