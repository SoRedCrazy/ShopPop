<?php

//connection a la base
require 'db.php';
//requete
  $res=$db->query("SELECT produit.nom,prix,produit.idproduit from produit inner join appartient on produit.idproduit=appartient.idproduit inner join categorie on appartient.idcategorie= categorie.idcategorie where categorie.nom='$categorie' ");
  $db->close();

//si o erreur donc on renvois a l'acceuil
if($res->num_rows==0){
    header('location: ../index.php');
  }
  else {
    //sinon on affiche
    $res->data_seek(0);
    require('panierfun.php');
    while ($row= $res->fetch_assoc()) {

      $photo=idphoto($row['idproduit']);
      $photo->data_seek(0);
      $row2= $photo->fetch_assoc();
      echo '<div class="produit">';
      echo '<a href="./produit.php?id='.$row['idproduit'].'"><img src="data:image/jpeg;base64,'.base64_encode( $row2['photo'] ).'"/></a>';
      echo '<p><a href="./produit.php?id='.$row['idproduit'].'">'.$row['nom']."</a></p>";
      echo "<p>".$row['prix']." euros </p>";
      echo "</div>";
    }
  }




 ?>
