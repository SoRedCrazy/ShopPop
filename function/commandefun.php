<?php

//recuperation des produit d'une commande
function produitcommande ($idcommande){
  require('db.php');
  $req = $db->query("SELECT produit.idproduit,nom,prix FROM produit INNER JOIN contient ON produit.idproduit=contient.idproduit inner JOIN commande on commande.idcommande=contient.idcommande where commande.idcommande='$idcommande'");
  $db->close();
  return $req;

}
//prenom d'une commande
function prenomCommander($idcommande){
  require('db.php');
  $req = $db->query("SELECT prenom FROM clients INNER JOIN commande ON clients.idclient=commande.idclient  where commande.idcommande='$idcommande'");
  $req-> data_seek(0);
  $row = $req ->fetch_assoc();
  $db->close();
  return $row['prenom'];
}

//nom d'une comande
function nomCommander($idcommande){
  require('db.php');
  $req = $db->query("SELECT nom FROM clients INNER JOIN commande ON clients.idclient=commande.idclient  where commande.idcommande='$idcommande'");
  $req-> data_seek(0);
  $row = $req ->fetch_assoc();
  $db->close();
  return $row['nom'];
}








 ?>
