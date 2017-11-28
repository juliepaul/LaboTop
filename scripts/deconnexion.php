<?php
session_start();
session_destroy(); // déconnexion de la personne connectée
header('Location: ./../index.php'); //redirection vers la page d'index, qui permet à un autre utilisateur de se connecter
 ?>
