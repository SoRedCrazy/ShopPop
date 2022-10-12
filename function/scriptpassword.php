<?php
// modification du password avec hash
require('db.php');
$mail=$_SESSION['mail'];
$res= $db->query("SELECT password from clients where email='$mail'");
$res->data_seek(0);
$row= $res->fetch_assoc();
if(password_verify($_POST['oldpassword'], $row['password'])){
  if($_POST['newpassword']==$_POST['newpassword1']){
    $pass_hache = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
    $res= $db->query('UPDATE clients set password="'.$pass_hache.'" where email="'.$mail.'"');
    $db->close();
    echo "<h1> Mots de passe changé</h1>";
  }
  else {
    $db->close();
    echo "<h1> Les deux nouveaux mots de passe ne correspondent pas </h1>";
    echo $form;
  }
  }
else {
  $db->close();
  echo "<h1> Erreur ancien mots de passe</h1>";
  echo $form;
}




 ?>
