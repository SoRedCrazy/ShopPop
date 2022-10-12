<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Inscription - Shop'Pop</title>
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
if(!isset($_SESSION['mail'])){
//variable
$form='	<p>Merci de rentrer les informations nécessaires pour votre inscription:</p>
  <form action="inscription.php" method="post">
    <div class="email_inscription">
      <label for="radio">Email:</label><br>
      <input type="text" name="user_mail" id="mail" required>
    </div>
    <div class="password_inscription">
      <label for="password">Mot de passe:</label><br>
      <input type="password" name="user_password" id="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
    </div>
    <div class="password_inscription_confirmation">
      <label for="password2">Retaper mdp:</label><br>
      <input type="password" name="user_password2" id="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
    </div>
    <div class="nom_inscription">
      <label for="nom">Nom:</label><br>
      <input type="text" name="user_nom" id="nom" required>
    </div>
    <div class="prenom_inscription">
      <label for="prenom">Prénom:</label><br>
      <input type="text" name="user_prenom" id="prenom" required>
    </div>
    <div class="num_inscription">
      <label for="numero">Numéro de rue:</label><br>
      <input type="text" name="user_numero" id="numero" required>
      </div>
    <div class="address_inscription">
      <label for="adress">Adresse:</label><br>
      <input type="text" name="user_adress" id="adress" required>
    </div>
    <div class="ville_inscription">
      <label for="ville">Ville:</label><br>
      <input type="text" name="user_ville" id="ville" required>
    </div>
    <div class="code_postal">
      <label for="cpt">Code postal:</label><br>
      <input type="text" name="user_cpt" id="cpt" required>
    </div>
    <div class="checkbox_inscription_cgu">
      <label>
      <input type="checkbox" name="user_valid" required>
        J\'accepte les <a href="condgeneral.php">termes et conditions</a>
      </label>
    </div>
    <div class="button_inscription">
      <button type="submit" id="button" >Inscription</button>
    </div>
  </form>
  <p>Déjà inscrit ? <a href="connexion.php">Clique ici !</a></p>';

// Vérification de la validité des informations
if(!empty($_POST['user_mail']))
{
if ($_POST['user_password2'] !=  $_POST['user_password']){
  echo ('<h1 style="color: red" >Les mots de passe sont différents</h1>');
  echo ($form);
}
else{
// Hachage du mot de passe
$pass_hache = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
//connection bdd
require('function/db.php');
//test connection base de donné
if ($db->connect_error) {
    echo ('Connect Error: ' . $db->connect_error);
    echo ('<h1 style="color: red"> Erreur</h1>');
    echo ('<p>Essayez plus tard </a></p>');
}

else {
  //recuperation du table pt1
  $nom= $_POST['user_nom'];
  $prenom = $_POST['user_prenom'];
  $mail=$_POST['user_mail'];

  //verification si l'email n'est pas deja dans la base
if (exist($mail)){
  echo ('<h1 style="color: red"> Mail déjà existant dans nos données</h1>');
  echo ($form);
}
else{
// Insertion du client
$req = $db->query("INSERT INTO clients(nom, prenom, email, password) VALUES('$nom',' $prenom', '$mail', '$pass_hache')");

// allez cherhcer l'id du client
$id=idclient($mail);

//recuperation du tableau pt2
$num = $_POST['user_numero'];
$adress =addslashes ( $_POST['user_adress']);
$cpt =$_POST['user_cpt'];
$ville =addslashes (  $_POST['user_ville']);


// Insertion de l'adresse du client
$req = $db->query("INSERT INTO adresse(Numero, rue, code_postal, ville, idclient , email) VALUES( '$num','$adress', '$cpt', '$ville' , '$id', '$mail')");
$req = $db->query("INSERT INTO panier(idclient , email) VALUES( '$id', '$mail')");
$db->close();
//si arriver ici resultat
echo ('<h1 style="color: green"> Bienvenue parmis nous '. $prenom.'</h1>');
echo ('<p>La connexion se passe ici <a href="connexion.php">Clique-ici !</a></p>');

}
}
}
}
else{
  echo ($form);
}
}
else {
	header('location: ./index.php');
}

//function recuperation de l'id client pour l'adresse
function idclient($mail){
  require('function/db.php');
   $req = $db->query("SELECT idclient FROM clients WHERE email='$mail'");
   $req -> data_seek(0);
   $row = $req->fetch_assoc();
	 $db->close();
   return $row['idclient'];
}

//function de verif de l'xistance ou pas
function exist($mail){
  require('function/db.php');
   $req = $db->query("SELECT idclient FROM clients WHERE email='$mail'");
	 $db->close();
   if($req->num_rows >0){
     return true;
   }
   else{
     return false;
   }
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
