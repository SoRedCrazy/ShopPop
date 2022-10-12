<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Compte - Shop'Pop</title>
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
		<?php
		//recuperation des données
			if(isset($_SESSION['mail'])){
				require('function/db.php');
				$mail=$_SESSION['mail'];
				$req=$db->query("SELECT idadresse,Numero,rue,code_postal,ville FROM adresse WHERE email='$mail' ");
				$req->data_seek(0);
				$row=$req->fetch_assoc();
				$idadresse=$row['idadresse'];
				$numero=$row['Numero'];
				$rue=$row['rue'];
				$cpt=$row['code_postal'];
				$ville=$row['ville'];
				$db->close();
			}
			else {
				header('location: index.php');
			}
		?>
		<div class="contenu_global">
			<div class="centre">
				<h2>Mes informations personnelles</h2>
				<p>Mon Email : <?php echo($_SESSION['mail']) ?></p>
				<p>Mon mot de passe : ************</p>
				<p>Mon Nom : <?php echo($_SESSION['nom']) ?></p>
				<p>Mon Prénom : <?php echo($_SESSION['prenom']) ?></p>
				<p>Mon Numéro de rue : <?php echo($numero) ?></p>
				<p>Mon adresse : <?php echo($rue) ?></p>
				<p>Ma Ville : <?php echo($ville) ?></p>
				<p>Mon Code Postal : <?php echo($cpt) ?></p>
				<p>
					<a href="editionprofil.php">Editer mon profil</a> /
					<a href="mescommandes.php">Mes commandes</a> /
					<a href="editpassword.php">Editer mot de passe</a>
				</p>
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
