<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Editions de profil - Shop'Pop</title>
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
				$req=$db->query("SELECT idadresse,Numero,rue,code_postal,ville FROM adresse  where email='$mail' ");
				$req -> data_seek(0);
				$row = $req->fetch_assoc();
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
				<h2> Edition de mon profil </h2>
				<form method='POST' action="function/editprofil.php">
					<label>
					Votre nouveau nom :
					<input type="text" name="newname" placeholder='Nouveau Nom' value="<?php echo $_SESSION['nom'];  ?>" required/><br /><br />
					</label>
					<label>
					Votre nouveau prénom :
					<input type="text" name="newfirstname" placeholder='Nouveau prenom' value="<?php echo $_SESSION['prenom']; ?>" required/><br /><br />
					</label>
					<label>
					Votre nouveau numéro de rue :
					<input type="text" name="newstreetnumber" placeholder='Nouveau numéro de rue' value="<?php echo $numero;  ?>" required/><br /><br />
					</label>
					<label>
					Votre nouvelle adresse :
					<input type="text" name="newaddress" placeholder='Nouvelle adresse' value="<?php echo $rue;  ?>" required/><br /><br />
					</label>
					<label>
					Votre nouveau code postal :
					<input type="text" name="newpostalcode" placeholder='Nouveau code postal' value="<?php echo $cpt;  ?>" required/><br /><br />
					</label>
					<label>
					Votre nouvelle ville :
					<input type="text" name="newcity" placeholder='Nouvelle ville' value="<?php echo $ville  ?>" required/><br /><br />
					</label>
					<input type="submit" value="Mettre à jour votre profil" name='boutonediter' >
				</form>
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
