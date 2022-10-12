<?php
//recuperation d'un produit
 function getproduit($idproduit)
{
  require('db.php');
  $req = $db->query("SELECT nom,description,prix FROM produit where idproduit='$idproduit'");
  $db->close();
  if($req->num_rows ==0){
    header('location: ../404.php');
  }
  else {
    $req -> data_seek(0);
    $row = $req->fetch_assoc();
    return $row;
  }
}
//recuperation des photo
function idphoto ($idproduit) {
 require('db.php');
 $req = $db->query("SELECT idphoto,photo FROM photo INNER JOIN produit on photo.idproduit=produit.idproduit where produit.idproduit ='$idproduit'");
 $db->close();
 return $req;
}


 ?>
