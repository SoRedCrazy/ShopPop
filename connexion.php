<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Connexion - Shop'Pop</title>
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
					//varible formulaire
					$form= '
				<p>Merci de rentrer les informations nécessaires</p>
				<form action="connexion.php" method="post">
					<div class="mail_connection">
						<label for="mail">Email:</label><br />
						<input type="text" name="user_mail" id="mail">
					</div>
					<div class="password_connection">
						<label for="password">Mots de passe:</label><br />
						<input type="password" name="user_password" id="password">
					</div>
					<div class="button_connection">
						<button type="submit">Connexion</button>
					</div>
				</form>
				<p>Pas encore inscrit ? <a href="inscription.php">Inscris-toi !</a></p>';
				if(!isset($_SESSION['mail'])){
					//si les info exit
					if (!empty($_POST['user_mail']) & !empty($_POST['user_password'])){
						//applle de la base de donner
						require('function/db.php');
						//test connection base de donné
						if ($db->connect_error) {
							//fonctionne pas
							echo ('Connect Error : '.$db->connect_error);
							echo ('
				<h1 style="color:red">Erreur</h1>');
							echo ('
				<p>Essayer plus tard</p>');
						}
						else {
							//fonctionne
							// on prend les variable
							$password  = $_POST['user_password'];
							$mail=$_POST['user_mail'];
							//on envoie
							$req = $db->query("SELECT prenom,nom,password FROM clients WHERE email='$mail'");
							//on traite les resultat si existe ou pas
							if ($req->num_rows ==0) {
								// si 0 alors n'existe pas
								echo ('
				<h1 style="color:red">Le mail est inexistant dans nos données</h1>');
								echo ($form);
							}
							else {
								//sinon on regarde le mdp
								$req -> data_seek(0);
								$row = $req->fetch_assoc();
								if (password_verify($_POST['user_password'], $row['password'])) {
									//on cree la session
									$_SESSION['prenom'] = $row['prenom'];
									$_SESSION['nom'] = $row['nom'];
									$_SESSION['mail'] = $mail;
									// et on part a l'accueil
									header('location: ./index.php');
								}
								else {
									//sinon mdp Mauvais
									echo '
				<h1 style="color:red">Mauvais mot de passe</h1>';
									echo $form;
								}
							}
							$db->close();
						}
					}
					else {
						//sinon juste affaicher le formulaire
						echo ($form);
					}
				}
				else {
					header('location: ./index.php');
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
