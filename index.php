<!DOCTYPE html>
<html lang="fr" class="no_background">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="style.css" />
	<title>Accueil - Shop'Pop</title>
</head>
	<body>
		<ul class="diaporama">
			<li><span>Image 01</span></li>
			<li><span>Image 02</span></li>
			<li><span>Image 03</span></li>
		</ul>
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
		<!--Corps de la page-->
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
