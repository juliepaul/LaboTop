<?php
session_start();
include("connexion_BD.php");

        $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME); //connexion à la base de données pour effectuer la requête qui suit

        if (!$_POST['nom']==""){
                if (!$_POST['prenom']==""){
                  $update=$base->prepare('UPDATE users SET Nom = ? , Prenom = ? WHERE LOGIN LIKE ?');
                  $update->bind_param('sss', $_POST['nom'], $_POST['prenom'], $_SESSION['pseudo']);
                  $update->execute();
                  $update->close();
                }
                else {
                  $update=$base->prepare('UPDATE users SET Nom = ?  WHERE LOGIN LIKE ?');
                  $update->bind_param('ss', $_POST['nom'],$_SESSION['pseudo']);
                  $update->execute();
                  $update->close();
                }
        }
        else {

          if (!$_POST['prenom']==""){
            $update=$base->prepare('UPDATE users SET  Prenom = ? WHERE LOGIN LIKE ?');
            $update->bind_param('ss', $_POST['prenom'],$_SESSION['pseudo']);
            $update->execute();
            $update->close();
          }
        }

//MODIFICATION JULIE
        $base2 = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
        $result=false;
        $amdp=sha1($_POST['amdp']);
        $nmdp=sha1($_POST['nmdp']);
        $vmdp=sha1($_POST['vmdp']);
        if (($amdp!='')&&($nmdp!='')&&($vmdp!='')) {
          $pseudo=$_SESSION['pseudo'];
          $smdp = $base2->query("SELECT MDP FROM users WHERE LOGIN LIKE '".$pseudo."'");
          $res = $smdp->fetch_object()->MDP;


          if ($amdp==$res){
                if($nmdp==$vmdp){
                    $base3 = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
                    $sql=$base3->prepare("UPDATE users SET MDP ='$nmdp' WHERE login='$pseudo'");
                    $sql->execute();
                    if($sql == true){
                      echo 'Modification du mot de passe effectuee avec succes';
                    }else{
                      echo 'Erreur inconnue';
                    }
                    }
                else {
                      echo 'Erreur entre le nouveau mot de passe entrée; et la vérification';
                        }
                }
            else {
                echo 'Le mot de passe actuel n\'est pas valide';
                  }
            }
         else {
            echo 'Veuillez remplir tous les champs';
          }

        header('Location: ./../espace_perso.php');

    ?>
