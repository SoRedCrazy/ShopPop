<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Produit - Shop'Pop</title>
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
//on regarde si l'id existe dans le lien (voir faille xss)
if(isset($_GET['id'])){
		//recherher les fonctions interresante
		require('function/infoproduit.php');
		//on recupere les varible
		$produit=getproduit($_GET['id']);
		$nom=$produit['nom'];
		$prix=$produit['prix'];
		$description=$produit['description'];
		$photo=idphoto($_GET['id']);
		//on regarde si il existe une photo ou pas
		if($photo->num_rows ==0){
			//pas de photo
  		$row['photo']="<p> pas de photo pour cette article</p>";
		}
		else {
			// on recupere la photo
  		$photo -> data_seek(0);
  		$row = $photo->fetch_assoc();
		}
	}
	//si il n'y pas d'id on renvois sur index
	else {
  	header('location: ../404.php');
	}
//on utilise les donnée
 ?>
<div class="Info_produit">
  <h2><?php echo $nom; ?></h2>
  <p>Prix : <?php echo $prix; ?> euro</p>
  <p>En savoir plus : <?php echo $description; ?></p>
</div>
<div class="photo">
  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>'; ?>
</div>
<form class="produit_form" action="function/ajoutproduit.php?id=<?php echo $_GET['id'];  ?>" method="post">
<input type="submit" name="produit_button" value="Ajouter au panier">
</form>
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
