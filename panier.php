<?php
//on recupere les fonctions
require 'function/panierfun.php' ;
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="Author" content="Joey Bernard - Julien Boisgard - Selim Ergun - Sean Fauvel - Hippolyte Vangaeveren - Yago Volovitch" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="style.css" />
		<title>Panier - Shop'Pop</title>
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
		<h1 style = "color : black ;"> Votre Panier </h1>

		<?php
		//on regarde si la session n'est pas nul
		 if(isset($_SESSION['mail'])){
			 //recuperation des variable
			$idclient= idclient($_SESSION['mail']);
			$idpanier= idpanier($idclient);
			$produit= produit($idpanier);
			$total=total($produit);
			//on verifie le nombre d'articles
			if ($produit->num_rows ==0){
				//pas d'article
			echo ('<h2 style="color: darkslateblue"> Vous n&#39;avez aucun produit dans votre panier. </h2>') ;
			}
			else {
				//article
				echo '
				<div class ="table_commande" >
				<table name="table_produit" class= "table_taille" >
	<thead>
			<tr>
					<th colspan="4"> <div class = "color_title"> Tous les produits </div> </th>
			</tr>
	</thead>
	<tbody> ';
				//on met a la ligne 0
				$produit -> data_seek(0);
				//on affiche tout les produit
				while($row = $produit ->fetch_assoc()){

					$photo = idphoto($row['idproduit']);
					if ($photo->num_rows ==0){
					echo "<tr><td> Aucune photo </td>";
					}
					else {
					$photo -> data_seek(0);
					$row2 = $photo ->fetch_assoc();
					echo '<tr><td><a href="produit.php?id='.$row['idproduit'].'"><img class="image_panier" src="data:image/jpeg;base64,'.base64_encode( $row2['photo'] ).'"/></a></td>';
					}
				 echo '<td class="produit"><a class="porduitpanier" href="produit.php?id='.$row['idproduit'].'">'.$row['nom']."</a></td>";
				 echo "<td>".$row['prix']." Euros</td>";
				 echo '<td><a href="function/sup.php?idproduit='.$row['idproduit'].'&idpanier='.$idpanier.'"> <img class="corbeille" src="images/corbeille.png"></td></tr>';

			}
			//on ferme le tableau et on ajoute un bouton
			echo "<tr><td></td><td>Total : </td><td>$total Euros</td><td></td></tr>";
			echo "	</tbody> </table>";
			echo '<form class="videpanier" action="function/videpanier.php" method="post">
			 <input type="submit" name="button_videpanier" value="Vider mon panier">
			</form>';
			echo '<form class="commande" action="confirmation.php" method="post">
			 <input type="submit" name="button_commande" value="Commander">
			</form>';


			}
		  }
			// si pas de session on renvoit de se connecter
		  else {
			echo "vous devez être connecté, si vous n'êtes pas incrit <a href = inscription.php >Cliquez ici <a/> !";
		  }
		?>

<br>
<br>
<br>
<br>
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
