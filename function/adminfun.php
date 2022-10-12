<?php
//nombre de client inscrit
function nombreClient()
{
  require('db.php');
  $req = "SELECT idclient  FROM clients;";
  $data = $db->query($req);

    // positionne au debut
    $nb_ligne = 0;
    $data->data_seek(0);
    // parcourt les lignes
    while ($row = $data->fetch_assoc()) {
       $nb_ligne += 1;
    }
    $db->close();
    return $nb_ligne;
}

//nombre de commde faite sir le site
function nombreCommande()
{
  require('db.php');
  $req = "SELECT idcommande FROM commande;";
  $data = $db->query($req);

    // positionne au debut
    $nb_ligne = 0;
    $data->data_seek(0);
    // parcourt les lignes
    while ($row = $data->fetch_assoc()) {
       $nb_ligne += 1;
    }
    $db->close();
    return $nb_ligne;
}

//argent genere part le site
function total(){
  require('db.php');
  $req = "SELECT idcommande FROM commande;";
  $data = $db->query($req);
  $data->data_seek(0);
    $total = 0;
    while ($row = $data->fetch_assoc()) {
      $idcommande=$row['idcommande'];
       $req="SELECT prix from produit inner join contient on produit.idproduit=contient.idproduit inner JOIN commande on commande.idcommande=contient.idcommande where commande.idcommande=$idcommande ";
       $res= $db->query($req);
       $res->data_seek(0);
       // parcourt les lignes
       while ($row2 = $res->fetch_assoc()) {
          $total += $row2['prix'];
       }
    }
    $db->close();
    return $total;


}

//date de la derniere commande
 function datelastcommande()
{
  require('db.php');
  $req = "SELECT 	date_commande FROM commande order by idcommande DESC;";
  $data = $db->query($req);
  $data->data_seek(0);
  $row = $data->fetch_assoc();
  $db->close();
  return $row['date_commande'];
}
//nombre de produit enregistrer
function nombreProduit()
{
  require('db.php');
  $req = "SELECT idproduit FROM produit;";
  $data = $db->query($req);

    // positionne au debut
    $nb_ligne = 0;
    $data->data_seek(0);
    // parcourt les lignes
    while ($row = $data->fetch_assoc()) {
       $nb_ligne += 1;
    }
    $db->close();
    return $nb_ligne;
}

//moyenne prix par categorie
function moyenneprixcatg($categorie)
{
  require('db.php');
  $req = "SELECT AVG(prix) as moyprix FROM categorie INNER JOIN appartient on appartient.idcategorie=categorie.idcategorie INNER join produit on produit.idproduit=appartient.idproduit where categorie.nom='$categorie' GROUP BY categorie.nom";
  $data = $db->query($req);
    $nb_ligne = 0;
    $data->data_seek(0);
    $row = $data->fetch_assoc();
    $db->close();
    return $row['moyprix'];
}



 ?>
