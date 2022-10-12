<?php
//recuperer l'adess d'une personne
require('db.php');
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
 ?>
