<?php
//supprimer une commande
if(isset($_GET['id'])){
  $idcommande=$_GET['id'];
  require('db.php');
  $db->query("DELETE FROM contient where idcommande='$idcommande'");
  $db->query("DELETE FROM commande where idcommande='$idcommande'");
  $db->close();
  header('location: ../mescommandes.php');
}
else {
  header('location: index.php');
}



 ?>
