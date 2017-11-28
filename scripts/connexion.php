<html>
<head>
<title>LaboTop</title>
<link rel="stylesheet" href="./../res/css/style.css" />
</head>

<?php
session_start();
include_once("connexion_BD.php");
if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oubli d'un champ, soit pseudo, soit password, ou bien les deux
    {
        $_SESSION['LOGIN'] = false; //On ne peut pas entrer sur l'intranet et de ce fait on est rediriger vers une "page" d'erreur
        echo '
            <center>
                <div class="alert alert-dismissible alert-warning">Veuillez saisir un pseudo et un mot de passe</div>
                <img src="./../img/error.jpg"/ style="display:block">
                <a href="./../index.php">
                    <div class="btn btn-primary">Retourner à la page de connexion</div>
                </a>
            </center>
            ';
    }
    else //On vérifie le mot de passe
    {
      $pseudo =$_POST['pseudo'];
      $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
      $stmt = $base->prepare("SELECT MDP,granting FROM users where login = ?"); //la requête sélectionne le MDP et le granting (rôle)
      $stmt->bind_param("s",$pseudo);                                           //dont le pseudo a été saisi dans le champ prévu à cet effet
      $stmt->execute();                                                         //exécution de la requête
      $res = $stmt->get_result();                                               //on récupère les résultats de la requête
      $res = $res->fetch_all();
      $stmt->close();

    if ( count($res) > 0) // Acces OK ! car le résultat est supérieur à 0, il revoit 1 quand on obtient "true"
    {
      if ( $res[0][0]== sha1($_POST['password'])) // Acces OK ! on vérifie que le résultat de la requête correspond bien au mot de passe crypté (sha1)
      {
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['LOGIN'] = true;
        $_SESSION['grant'] = $res[0][1];
        header('Location: ./../intranet.php'); //la connexion est établie et la redirection est effectuée vers la page intranet
      }
      else // Acces pas OK !
      {
          $login_failed = true; //le login ne correspond pas à celui de la base
      }
    }
    else // Acces pas OK !
    {
          $login_failed = true; //le login ne correspond pas à celui de la base
    }

    if($login_failed){
      $_SESSION['LOGIN'] = false; //erreur de connexion, redirection vers la "page" d'erreur
      echo '
        <center>
            <div class="alert alert-dismissible alert-warning">Le pseudo ou le mot de passe saisi est incorrect</div>
            <img src="./../img/error.jpg"/ style="display:block">
            <a href="./../index.php">
                <div class="btn btn-primary">Retourner à la page de connexion</div>
            </a>
        </center>
        ';
    }
  }
?>
