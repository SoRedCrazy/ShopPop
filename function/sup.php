<?php
 //suprimer de panier pas une fonction mais juste un bout de code
require('db.php');
$idpanier=$_GET['idpanier'];
$idproduit=$_GET['idproduit'];
$db->query("DELETE FROM avoir
WHERE idpanier='$idpanier' and idproduit='$idproduit' limit 1 ");
$db->close();

header('location: ../panier.php');



 ?>
