<?php
session_start();
include("connexion_BD.php");

        $mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);
        $insert = $mysqli->prepare("INSERT into users(LOGIN,MDP,Nom,Prenom) values(?, ?, ?, ?)");
        $stmt = $mysqli->prepare("SELECT LOGIN FROM users WHERE LOGIN = ?");

        $pseudo = $_POST['pseudo'];
        $stmt->bind_param("s",$pseudo);
        $stmt->execute();
        $res = $stmt->get_result();


        if($res->num_rows == 0){
          $_SESSION['pseudo'] = $_POST['pseudo'];
          $_SESSION['LOGIN'] = true;
          var_dump($insert);
          $insert->bind_param("ssss", $pseudo, sha1($_POST['pass']), $_POST['nom'], $_POST['prenom']);
          $_SESSION['grant'] = 'user';
          $insert->execute();

          header('Location: ./../intranet.php');
        }
        else{
          $_SESSION['register_error'] = true;
          header('Location:./../register.php');
        }
        $query->CloseCursor();

    ?>
