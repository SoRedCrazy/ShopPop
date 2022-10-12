<?php

//foncton pour avoir l'id client
      function idclient($mail){
        require('db.php');
         $req = $db->query("SELECT idclient FROM clients WHERE email='$mail'");
         $db->close();
         $req -> data_seek(0);
         $row = $req->fetch_assoc();
         return $row['idclient'];
      }
//foncton pour avoir l'id panier
      function idpanier($idclient){
        require('db.php');
         $req = $db->query("SELECT idpanier FROM panier INNER JOIN clients on panier.idclient=clients.idclient AND panier.email=clients.email where clients.idclient='$idclient'");
         $db->close();
         $req -> data_seek(0);
         $row = $req->fetch_assoc();
         return $row['idpanier'];
      }
//fonction pour recuper les info produit du panier
      function produit ($idpanier){
        require('db.php');
        $req = $db->query("SELECT produit.idproduit,nom,prix FROM produit INNER JOIN avoir ON produit.idproduit=avoir.idproduit inner JOIN panier on avoir.idpanier=panier.idpanier where panier.idpanier='$idpanier'");
        $db->close();
        return $req;

      }
//recuperer l'idphoto de tout les photo et la photo
      function idphoto ($idproduit) {
       require('db.php');
       $req = $db->query("SELECT idphoto,photo FROM photo INNER JOIN produit on photo.idproduit=produit.idproduit where produit.idproduit ='$idproduit'");
       $db->close();
       return $req;
}
//pour calculer les total
      function total($produit){
        $prix =0;
        $produit -> data_seek(0);
        while($row = $produit ->fetch_assoc()){
          $prix +=$row['prix'];
        }
        return $prix;
      }



















































      // recup session : $_SESSION['mail'] --------------------------------------
     // empty($_SESSION['mail']) = retourne si session vide ou non --------------


?>
