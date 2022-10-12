<?php
 //ajout d'un produit dans le panier
session_start();
if(isset($_SESSION['mail'])){
require ('db.php');
require ('panierfun.php');
$idproduit=$_GET['id'];
$idclient= idclient($_SESSION['mail']);
$idpanier= idpanier($idclient);
$db->query("INSERT into avoir(idpanier,idproduit) values ('$idpanier','$idproduit')");
$db->close();
header('location: ../panier.php');
}
else {
  header('location: ../connexion.php');
}
 ?>
