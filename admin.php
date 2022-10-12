<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Panel Admin - Shop'Pop</title>
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
				<h1>Données du site shop-pop</h1>
				<?php
				//recuperation des données
					if ($_SESSION['mail']=='admin@admin.admin') {
						require('function/adminfun.php');
						$nbclient=nombreClient();
						$nbcommande=nombreCommande();
						$moyennecommande=$nbcommande/$nbclient;
						$total=total();
						$moyennesomme=$total/$nbcommande;
						$date=datelastcommande();
						$nbproduit=nombreProduit();
						$anime=moyenneprixcatg('anime');
						$nerd=moyenneprixcatg('nerd');
						$gamer=moyenneprixcatg('gamer');
					}
					else {
						header('location: ../index.php');
					}
				?>
				<p>Nombre de clients sur le site  : <?php echo $nbclient; ?></p>
				<p>Nombre de commandes : <?php echo $nbcommande; ?></p>
				<p>Moyenne de commandes par personne : <?php echo $moyennecommande; ?></p>
				<p>Total en euros de toutes les commandes : <?php echo $total; ?></p>
				<p>Moyenne en euros par commande : <?php echo $moyennesomme; ?></p>
				<p>Date de la derniere commande : <?php echo $date; ?></p>
				<p>Nombre de produits : <?php echo $nbproduit; ?></p>
				<p>Moyenne des prix des articles appartenant à animé : <?php echo $anime ; ?></p>
				<p>Moyenne des prix des articles appartenant à gamer : <?php echo $gamer; ?></p>
				<p>Moyenne des prix des articles appartenant à nerd : <?php echo $nerd; ?></p>
				<a href="commandeadmin.php">Voir les commandes du site</a>
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
