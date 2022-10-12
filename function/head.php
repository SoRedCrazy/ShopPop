<?php
//header en fonction de l'etat de connexion
  $connecter= '<a href="index.php">Accueil</a> - <a href="compte.php">Mon compte</a> - <a href="panier.php">Panier</a>  - <a href="function\deconnexion.php">Deconnexion</a>';
  $deconnecter = '<a href="index.php">Accueil</a> - <a href="connexion.php">Connexion</a> - <a href="inscription.php">Inscription</a> ';
  $admins='<a href="admin.php">Admin</a> - <a href="index.php">Accueil</a> - <a href="compte.php">Mon compte</a> - <a href="panier.php">Panier</a>  - <a href="function\deconnexion.php">Deconnexion</a>';
  if(isset($_SESSION['mail'])){
    if ($_SESSION['mail']=='admin@admin.admin') {
      echo $admins;
    }
    else {
    echo $connecter;
    }

  }
  else {
    echo $deconnecter;
  }


 ?>
