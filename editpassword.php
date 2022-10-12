<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Editions de mot de passe - Shop'Pop</title>
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
    if(isset($_SESSION['mail']) ){
			//forlulaire de changement
 $form='		<div class="contenu_global">
 			<div class="centre">
 				<h2> Edition de mon mot de passe </h2>
 				<form method="POST" action="editpassword.php">
 					<label>
 					Ancien mot de passe :
 					<input type="password" name="oldpassword" placeholder="Ancien mot de passe" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required/><br /><br />
 					</label>
 					<label>
 					Nouveau mot de passe :
 					<input type="password" name="newpassword" placeholder="Nouveau mot de passe" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required/><br /><br />
 					</label>
 					<label>
 					Retaper le nouveau mot de passe :
 					<input type="password" name="newpassword1" placeholder="Retaper nouveau mot de passe"  required/><br /><br />
 					</label>
 					<input type="submit" value="Modifier mon mot de passe " name="boutonediter" >
 				</form>
 			</div>
 		</div>';
		//si resultat formulaire existe alors lancer la function sinon afficher formulaire 
    if(isset($_POST['oldpassword'])){
      require('function/scriptpassword.php');
    }
    else{
      echo $form;
    }

	}
	else {
		header('location: index.php');
	}
		?>







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
