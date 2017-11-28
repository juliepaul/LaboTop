<?php
session_start();
include("scripts/connexion_BD.php"); //connexion à la base de données
if(!isset($_SESSION['LOGIN'])){
  header('Location: index.php'); //si on ne rentre pas de pseudo, ni le mot de passe correspondant,
}                                //alors on ne peut pas accéder à la page de l'intranet
                                // redirection vers la page index (page qui permet de se connecter)
 ?>

 <html> <!-- mise en page de toutes les pages après la connexion, c'est-à-dire intranet, tables, espace personel-->
 <head>
   <title>LaboTop</title>
   <link rel="shortcut icon" type="image/x-icon" href="./?getimg=favicon" />
   <link rel="stylesheet" href="res/css/style.css" />
   <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="res/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
 </head>

 <body>
 <center>
   <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./../intranet.php">LaboTop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tables<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="tables/Experimentateurs.php">Expérimentateurs</a></li>
            <li><a href="tables/Recherche.php">Recherche</a></li>
            <li><a href="tables/Medicaments.php">Médicaments</a></li>
            <li><a href="tables/Teste.php">Teste</a></li>
            <li><a href="tables/Animaux.php">Animaux</a></li>
          </ul>
        </li>
      </ul>

      <?php

      if($_SESSION['grant']=='admin'){
        echo'       <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion des données <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="CRUD/index_experimentateur.php">Expérimentateurs</a></li>
                    <li><a href="CRUD/index_recherche.php">Recherche</a></li>
                    <li><a href="CRUD/index_medicament.php">Médicaments</a></li>
                    <li><a href="CRUD/index_teste.php">Teste</a></li>
                    <li><a href="CRUD/index_animal.php">Animaux</a></li>
                    <li><a href="CRUD/index_users.php">Utilisateurs</a></li>
                  </ul>
                </li>
              </ul>';
      }
      ?>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon Compte <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="espace_perso.php">Espace Personnel</a></li>
            <li><a href="./../scripts/deconnexion.php">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   <div class="container-fluid">

   </div>
   </center>
 </body>
 </html>
