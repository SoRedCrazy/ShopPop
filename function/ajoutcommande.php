<?php
//preparation variable
require('panierfun.php');
require('db.php');
$mail=$_SESSION['mail'];
$idclient= idclient($mail);
$idpanier= idpanier($idclient);
$produit= produit($idpanier);
$date = date('d/m/y');

//creation commande
$db->query("INSERT INTO commande(date_commande,idclient,email) values ('$date','$idclient','$mail')");

//cherhcer l'id de commande
$req=$db->query("SELECT idcommande from commande where idclient='$idclient' order by idcommande DESC");
$req -> data_seek(0);
$row = $req ->fetch_assoc();
$idcom=$row['idcommande'];

//ajout article commaande
$produit -> data_seek(0);
while($row = $produit ->fetch_assoc()){
  $idproduit=$row['idproduit'];
 $db->query("INSERT INTO contient(idcommande,idproduit) values ('$idcom','$idproduit')");
}

//vider panier
$db->query("DELETE FROM avoir WHERE idpanier='$idpanier'");

$db->close();

 ?>
