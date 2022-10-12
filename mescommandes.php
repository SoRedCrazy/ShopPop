<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Mes commandes - Shop'Pop</title>
	</head>
	<body>
		<div class="header">
			<img src="images/logo.png" alt="logo" class="logo">
			<div class="link_client">
				<?php
						session_start();
						require('function/head.php');
				 ?>
			</div>
			<div class="link_pages">
				<p>
					<a href="gamer.php" class="page">Gamers</a>
					<a href="nerd.php" class="page">Nerd</a>
					<a href="anime.php" class="page">Animé</a>
				</p>
			</div>
		</div>
    <div class="contenu_global">
      <div class="centre">
        <?php
        if(isset($_SESSION['mail'])){
          require('function/db.php');
					require('function/commandefun.php');
          $mail=$_SESSION['mail'];
          $req= $db->query("SELECT idcommande,date_commande FROM commande WHERE email='$mail' order by idcommande DESC");
					$db->close();
          if(!$req->num_rows ==0){
          $req-> data_seek(0);
					//ouvrir le fieldset et le fermer mettre l'interieur des commande tanuqeu qu'il yes des commandes
          while($row = $req ->fetch_assoc()){
            echo "<fieldset>";
            $numero=$row['idcommande'];
            $date=$row['date_commande'];
            echo "<legend> Commande numéro $numero faite le $date </legend> ";
						echo "<ul>";
						$produit=produitcommande($numero);
						$produit-> data_seek(0);
						$prix=0;
						//ajout de tout les produit
	          while($row2 = $produit ->fetch_assoc()){
							$nom=$row2['nom'];
							$prixu=$row2['prix'];
							echo '<li class="produit">Article :<a href="produit.php?id='.$row2['idproduit'].'">'.$nom.' </a>au prix de : '.$prixu.' euros <li>';
							$prix += $prixu;
						}
						echo "</ul>";
						echo "<p>Prix total = $prix euros</p>";
						echo '<p><a href="function/suppcommande.php?id='.$numero.'">annuler</a></p>';
						echo "</fieldset>";

          }
        }
        else {
          echo "<h1>Pas de commande </h1>";
        }
      }
      else {
        header('location: index.php');
      }
         ?>
    </div>
    </div>
    <div class="footer">
			<div class="link_footer">
				<p>Liens utiles :</p>
				<ul>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="condgeneral.php">Conditions Générales</a></li>
					<li><a href="faq.php">FAQ</a></li>
				</ul>
			</div>
			<div class="creation">
				<p>© Copyright - Tous droits réservés</p>
			</div>
		</div>
	</body>
</html>
