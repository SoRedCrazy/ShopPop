<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>FAQ - Shop'Pop</title>
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
				<h1>FAQ</h1>
				<p>
					Vous souhaitez obtenir de l'aide ?<br />
					Notre FAQ est le moyen le plus rapide pour en obtenir.Vous trouverez des réponses sur de nombreux sujets, tels que les moyens de paiement disponibles sur Shop’pop.<br />
					A propos de nous :
					Nous sommes des étudiants actuellement en License informatique et ce site est notre projet.
				</p>
				<br />

				<h2>Livraison</h2>

				<fieldset>
					Puis-je me faire livrer dans un pays autre que la France ?<br />
					Oui la livraison est disponible en France, Belgique et Suisse. Malheureusement nous ne livrons pas encore dans les DOM-TOM.
				</fieldset>
				<br /><br />
				<fieldset>
					Quelle est votre politique de retour ?<br />
					Nous acceptons les retours pour tous les articles dans les 30 jours suivant la date de commande. Contactez le service après-vente pour plus d’explication.
				</fieldset>
				<br /><br />
				<fieldset>
					Quels modes d’expédition proposez-vous ?<br />
					Nous proposons des livraisons à domicile avec suivi de colis.
				</fieldset>
				<br /><br />
				<fieldset>
					Quels sont les délais de livraison ?<br />
					La livraison devrait se faire une semaine après l’achat.
				</fieldset>
				<br /><br />
				<fieldset>
					Puis-je faire une commande avec un motif personnalisé ?<br />
					Il nous est impossible de proposer des motifs personnalisés à cause des droits d’auteurs.
				</fieldset>
				<br /><br />
				<fieldset>
					A combien sont les frais de livraisons ?<br />
					A partir de 40€ les frais de livraisons sont gratuits.
				</fieldset>
				<br /><br />
				<h2>Après-vente</h2><br />
				<fieldset>
					Où se trouve mon numéro de suivi ? <br />
					Votre numéro de suivi se trouve dans votre espace « suivre mon colis », il est également sur votre facturation.
				</fieldset>
				<br /><br />
				<fieldset>
					Je n’ai pas reçu mon colis, que faire ?<br />
					Contactez le service après-vente pour un remboursement.
				</fieldset>
				<br /><br />
				<fieldset>
					Je n’ai pas reçu le mail d’expédition, est-ce normal ?<br />
					Le colis n’est surement pas encore près à l’expédition et si 1 semaine après votre achat vous ne l’avez toujours pas reçu, veuillez contacter le service après-vente.
				</fieldset>
				<br /><br />
				<fieldset>
					Je n’ai pas de réponse du service client, que faire ?<br />
					Désoler, tentez de recontacter le service client ou essayez de nous recontacter a cette adresse mail: lara.tatouille@shop-pop.sjarb.fr.
				</fieldset>
				<br /><br />
				<fieldset>
					Je n’ai pas reçu le bon produit, que faire ?<br />
					Contactez le SAV pour le renvoi.
				</fieldset>
				<br /><br />
				<fieldset>
					Mon produit est endommagé, que faire ?<br />
					Contactez le SAV pour le renvoi.
				</fieldset>
				<div class="monospace"></div>
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
