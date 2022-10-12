<?php
//modification des info du compte
    session_start();
    if(isset($_POST['newname']))
    {
        $nom=$_POST['newname'];
        $prenom=$_POST['newfirstname'];
        $numero=$_POST['newstreetnumber'];
        $cpt=$_POST['newpostalcode'];
        $ville=$_POST['newcity'];
        $rue=$_POST['newaddress'];


          $idclient=idclient($_SESSION['mail']);
          require("db.php");
          $db->query('UPDATE clients SET nom = "'.$nom.'", prenom = "'.$prenom.'" WHERE idclient="'.$idclient.'"');
          $db->query('UPDATE adresse SET numero = "'.$numero.'", rue = "'.$rue.'", ville = "'.$ville.'" ,code_postal = "'. $cpt.'"  WHERE idclient="'.$idclient.'"');
          $db->close();
          header('location: ../compte.php');

  }
    else{
      header('location: ../index.php');
    }


    function exist($mail){
      require('db.php');
       $req = $db->query("SELECT idclient FROM clients WHERE email='$mail'");
       $db->close();
       if($req->num_rows >0){
         return true;
       }
       else{
         return false;
       }

    }

    function idclient($mail){

              require('db.php');
               $req = $db->query("SELECT idclient FROM clients WHERE email='$mail'");
               $req -> data_seek(0);
               $row = $req->fetch_assoc();
               return $row['idclient'];
            }

?>
