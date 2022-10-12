<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Paiement- Shop'Pop</title>
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
					//vérif de la session
					if(isset($_SESSION['mail'])){
						// soit il existe post bouton paiment donc on arrive de comfirmation ou il exite payer
						if(isset($_POST['button_paiment']) || isset($_POST['payer'] )){
							//variable en html
							$form='
				<form class="credit_card" action="paiment.php" method="post">
					<div class="info">
						<label>Nom du titulaire :<br />
							<input type="text" name="first_name" id="first_name" required>
						</label><br />
						<label>Numéro de Carte :<br />
							<input type="text" name="card_numero" id="card_numero" pattern="[0-9]{4}( [0-9]{4}){3}" placeholder="0000 0000 0000 0000" required>
						</label><br />
						<div class="card_date">
							<label>Date d\'expiration de Carte (mm/aa) :<br />
								<input type="text" name="card_date" id="card_date" pattern="[0-9]{2}/[0-9]{2}" placeholder="00/00" required>
							</label><br />
						</div>
						<div class="card_pyctogramme">
							<label>Cryptogramme visuel :<br />
								<input type="text" name="card_pyctogramme" id="card_pyctogramme" pattern="[0-9]{3}" placeholder="000"required>
							</label><br />
						</div><br /><br /><br />
						<input type="submit" name="payer" id="payer" value="Payer">
					</div>
				</form>';
							// il existe post payer
							if(isset($_POST['payer'])){
								//oui la commande et comfirmer
								require('function/ajoutcommande.php');
								echo '
				<h1 style="color:darkslateblue; line-height:170%;"> Commande passée merci pour tout ! </h1>';
							}
							else {
								// non donc il faut remplir le formulaire
								echo '
				<h1 style="line-height:170%;">Veuillez passer au paiement </h1>';
								echo "
				<p>(fictif juste rentrer les valeurs)</p>";
								echo $form;
							}
						}
						//condition non verfier donc on renvoie à l'accueil
						else {
							header('location: index.php');
						}
					}
					//il faut se connecter
					else {
						echo "
				<p>Vous devez être connecté pour effectuer cette action. Si vous n'êtes pas incrit <a href=\"inscription.php\">Cliquez ici </a> !</p>";
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
