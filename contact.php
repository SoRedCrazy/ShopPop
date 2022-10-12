<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="oey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<link rel="stylesheet" href="style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Contact - Shop'Pop</title>
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
				<h1>Contactez-nous !</h1>

				<p>Par mail: <a href="mailto:lara.tatouille@shop-pop.sjarb.fr" >lara.tatouille@shop-pop.sjarb.fr</a></p>
				<p>Par téléphone : 06 12 34 56 78</p>
				<p>Gérant du site : Lara Tatouille</p>

				<fieldset class="contact">
					<legend>Détaillez-nous votre problème</legend>
<?php
//variable
$form= '<form action="contact.php" method="post">
	<div>
		<label for="nom">Nom :</label> <br><input type="text" id="nom" name="user_nom" requierd>
	</div>
	<div>
		<label for="mail">E-mail :</label><br><input type="email" id="mail" name="user_mail" requierd>
	</div>
	<div>
		<label for="msg">Message :</label><br>
		<textarea id="msg" name="user_msg" requierd></textarea>
	</div>
	<div>
		<button type="submit">Envoyer</button>
	</div>
</form>';

// si poste existe
if (!empty($_POST['user_nom'])){
	//oui donc on envoie marche que sur machine
	$retour = mail('lara.tatouille@shop-pop.sjarb.fr', 'Envoi depuis la page Contact par '.$_POST['user_nom'], $_POST['user_msg']."  ".$_POST['user_mail']);
	//on verifier le retour
	 if ($retour) {
		 //marche
			 echo '<p>Votre message a bien été envoyé.</p>';
	 }
	 else {
		 //marche pas
		 	echo '<p>Votre message a eu une erreur .</p>';
	 }
}
else {
	//non on affiche le formulaire
	echo $form;
}


 ?>
				</fieldset>
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
