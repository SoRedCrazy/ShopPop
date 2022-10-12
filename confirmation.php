<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Comfirmation - Shop'Pop</title>
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
					//on regarde la session
					if(isset($_SESSION['mail'])){
						// puis si on viens bien de panier
						if(isset($_POST['button_commande'])){
							//besion de function ou code situer dans adresse
							require('function/adresse.php');
							//echo les informations
							echo '<h1 style="color:black;line-height:170%;">Confirmation de l&#39;adresse d&#39;envoi et de facturation</h1>';
							echo '
			<table name="table_confirmation" class="table_taille">
					<thead>
						<tr>
							<th colspan="2"> Adresse </th>
						</tr>
					</thead>
					<tbody>';
							echo '
						<tr>
							<td class="td_alignright">Nom :</td>
							<td class="td_alignleft">'.$_SESSION['nom'].'</td>
						</tr>';
							echo '
						<tr>
							<td class="td_alignright">Prénom :</td>
							<td class="td_alignleft">'.$_SESSION['prenom'].'</td>
						</tr>';
							echo '
						<tr>
							<td class="td_alignright">Rue :</td>
							<td class="td_alignleft">'.$numero.' '.$rue.'</td>
						</tr>';
							echo '
						<tr>
							<td class="td_alignright">Code postal :</td>
							<td class = "td_alignleft">'.$cpt.'</td>
						</tr>';
							echo '
						<tr>
							<td class="td_alignright">Ville :</td>
							<td class="td_alignleft">'.$ville.'</td>
						</tr>';
							echo "
					</tbody>
				</table>";
							echo '
				<form class="paiment" action="paiment.php" method="post">
					<input type="submit" name="button_paiment" value="Confirmer">
				</form>';
							echo '
				<form class="modifier" action="compte.php" method="post">
					<input type="submit" name="button_modifier" value="Modifier">
				</form>';
						}
						else {
							//si on viens pas de panier retour a l'aceuil
							header('location: index.php');
						}
					}
					else {
						//si on viens pas de panier retour a l'aceuil
						echo "Vous devez être connecté pour effectuer cette action. Si vous n'êtes pas incrit <a href=\"inscription.php\">Cliquez ici</a> !";
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
