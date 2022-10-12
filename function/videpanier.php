<?php
session_start();
if (isset($_SESSION['mail'])){
  require 'db.php';
  $mail=$_SESSION['mail'];
  $res= $db->query("Select idpanier from panier where email='$mail'");
  $res->data_seek(0);
  $row= $res->fetch_assoc();
  $id=$row['idpanier'];
  $db->query("DELETE FROM avoir WHERE idpanier='$id'");
  $db->close();
  header('location: ../panier.php');
}
else {
  header('location: ../index.php');
}



 ?>
