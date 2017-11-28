<?php
include("mise_en_page.php");
 ?>
<html>
<body style="background-image: url('img/background_espace_perso.jpg');background-repeat:no-repeat;
 	background-size: cover;">
  <div id="marge"><p> Vous trouverez sur le site LaboTop, tout ce qui concerne les études de recherche en expérimentation animale, vous pouvez visualiser les tables dans leur intégralité
  dans l'onglet "Tables". Ou alors accéder aux requêtes plus précises, ci-dessous.</p></div>
<center><div class="jumbotron" style="width:90%;">
  <h1>Recherche</h1>

<?php
if(isset($_GET["query"])){
  if($_GET["query"]==1){
    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
    $stmt = $base->prepare('SELECT Forme_galenique, DCI, Nom_generique FROM medicaments WHERE DCI in (SELECT DCI FROM teste, animaux WHERE teste.Id_puce=animaux.Id_puce AND animaux.espece= ?)');
    $stmt->bind_param('s',$_POST['espece']);
    $stmt->execute();
    $stmt->bind_result($Forme_galenique, $DCI, $Nom_generique);

      echo'<div class="container-fluid"
        <p><h2>Les études selon l\'espèce</h2></p>
        <center>
        <table border="1px"  width=60%>
          <theader>
            <th width=20%><center>Forme_galenique</center></th>
            <th width=20%><center>DCI</center></th>
            <th width=20%><center>Nom_generique</center></th>
          </theader>';

          while ($stmt->fetch()){
       echo"    <tr>
             <td>". $Forme_galenique  ."</td>
             <td>". $DCI ."</td>
             <td>". $Nom_generique ."</td>
           </tr>";
      }
      echo '</table>
      <form><button type="submit" class="btn btn-primary">Retour</button></form>
      </div>';
      $stmt->close();
    }}
      else{
      echo'<h2>Les études selon l\'espèce</h2>
      <form class="form-inline" method="post" action="intranet.php?query=1">
        <div class="form-group mx-sm-3">
          <input type="text" class="form-control autoesp" id="espece" placeholder="Espèce" name="espece">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>';
      }
 ?>

<?php
  if(isset($_GET["query"])){
    if($_GET["query"]==2){
      $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
      $stmt = $base->prepare('SELECT N_protocole, Equipe, Institut FROM recherche WHERE Id_exp in (SELECT Id_exp FROM experimentateur WHERE nom=? AND prenom=?)');
      $str = $_POST['nom'];
      $str = explode(" ", $str);
      $nom = $str[0];
      $prenom = $str[1];
      $stmt->bind_param('ss',$nom, $prenom);
      $stmt->execute();
      $stmt->bind_result($N_protocole, $Equipe, $Institut);

      echo'<div class="container-fluid"
        <p><h2>Les études selon l\'expérimentateur</h2></p>
        <center>
        <table border="1px"  width=60%>
          <theader>
            <th width=20%><center>N_protocole</center></th>
            <th width=20%><center>Equipe</center></th>
            <th width=20%><center>Institut</center></th>
          </theader>';

        while ($stmt->fetch()){
      echo"    <tr>
            <td>". $N_protocole   ."</td>
            <td>". $Equipe    ."</td>
            <td>". $Institut    ."</td>
          </tr>";
      }

      echo'</table>
      <form><button type="submit" class="btn btn-primary">Retour</button></form>
      </div>';
      $stmt->close();
    }
  }
  else{
    echo' <h2>Les études selon l\'expérimentateur</h2>
    <form class="form-inline" method="post" action="intranet.php?query=2">
      <div class="form-group mx-sm-3">
        <input type="text" class="form-control" id="nom" placeholder="Nom & Prenom" name="nom">
      </div>
      <button type="submit" class="btn btn-primary">Rechercher</button>
      </form>';
  }
 ?>

<?php
if(isset($_GET["query"])){
  if($_GET["query"]==3){
    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
    $stmt = $base->prepare('SELECT DISTINCT Delai, Duree, Dose FROM teste WHERE DCI in (SELECT DCI FROM medicaments WHERE forme_galenique=?)');
    $stmt->bind_param('s',$_POST['formegal']);
    $stmt->execute();
    $stmt->bind_result($Delai, $Duree, $Dose);

      echo'<div class="container-fluid"
        <p><h2>Les études selon la forme galénique des médicaments</h2></p>
        <center>
        <table border="1px"  width=60%>
          <theader>
            <th width=20%><center>Delai d\'action</center></th>
            <th width=20%><center>Durée d\'action</center></th>
            <th width=20%><center>Dose</center></th>
          </theader>';

          while ($stmt->fetch()){
      echo"    <tr>
            <td>". $Delai ."</td>
            <td>". $Duree  ."</td>
            <td>". $Dose  ."</td>
          </tr>";
      }

      echo'</table>
      <form><button type="submit" class="btn btn-primary">Retour</button></form>
      </div>';
      $stmt->close();
    }
  }
  else{
    echo'  <h2>Les études selon la forme galénique des médicaments</h2>
    <form class="form-inline" method="post" action="intranet.php?query=3">
      <div class="form-group">
        <input type="text" class="form-control" id="formegal" placeholder="Forme galénique" name="formegal">
      </div>
      <button type="submit" class="btn btn-primary">Rechercher</button>
      </form>';
  }
 ?>

</div>
</center>


<script type="text/javascript">
$(function() {

    //autocomplete
    $("#espece").autocomplete({
        source: "scripts/search.php",
    });

    $("#nom").autocomplete({
        source: "scripts/nom.php",
    });

    $("#formegal").autocomplete({
        source: "scripts/formgal.php",
    });

    $("#Id_exp").autocomplete({
        source: "scripts/Id_exp.php",
    });
});
</script>
<br><br>


<form method="POST" action="resultat.php">
  <center><div class="jumbotron" style="width:90%;">
    <h1>Recherche avancée</h1>

	<p> <input type="checkbox" name="choix_table" value="exp" checked="checked"> Expérimentateur : </p>
<table border=0>
<tr>
  <td>Identifiant expérimentateur : </td>
  <td> <input type="text" name="Id_exp" id="Id_exp" size="50"></td>
</tr>
  <td> Nom expérimentateur : </td>
  <td> <input type="text" name="Nom" size="50"> </td>
</tr>
  <td>Spécialité : </td>
  <td> <select name="Specialite" title="Choississez une spécialité">
    <option value="" >Choississez une spécialité</option>
    <option value="bio">Biologiste</option>
    <option value="biostat" >Biostatisticien</option>
    <option value="neuro" >Neurologue</option>
    <option value="cardio" >Cardiologue</option>
    <option value="nephro" >Néphrologue</option>
    <option value="gastro" >Gastro-entérologue</option>
    <option value="chimiste" >Chimiste</option>
    <option value="pharma" >Pharmacien</option>
  </select></td>
</tr>
</table>
<br>

  <p><input type="checkbox" name="choix_table" value="recherche"> Recherche :</td>
</p>
<table border=0>
<tr>
  <td>Numéro protocole :</td>
  <td><input type="text" name="num" size="50"></td>
</tr>
<tr>
  <td>Equipe:</td>
  <td><input type="text" name="equipe" size="50"></td>
</tr>
<tr>
  <td>Institut :</td>
  <td><input type="text" name="institut" size="50"></td>
</tr>
</table>
<br>

  <p><input type="checkbox" name="choix" value="medicaments"> Médicaments :</p>
<table border=0>
<tr>
  <td>DCI :</td>
  <td><input type="text" name="num" size="50"></td>
</tr>
<tr>
  <td>Nom générique:</td>
  <td><input type="text" name="equipe" size="50"></td>
</tr>
<tr>
  <td>Principe actif :</td>
  <td><input type="text" name="institut" size="50"></td>
</tr>
<tr>
  <td>Forme galénique :</td>
  <td><select name="formegal" title="Choississez une forme galénique">
    <option value="" >Choississez une forme galénique</option>
    <option value="comprime">comprime</option>
    <option value="poudre" >poudre</option>
    <option value="injection" >injection</option>
  </select></td>
</tr>
</table>
<br>

  <p><input type="checkbox" name="choix" value="teste"> Teste :</p>
<table border=0>
<tr>
  <td>Voie administration :</td>
  <td><select name="voie" title="Choississez la voie d'administration">
    <option value="" >Choississez la voie d'administration</option>
    <option value="orale">voie orale</option>
    <option value="anale" >voie anale</option>
    <option value="oculaire">voie oculaire</option>
    <option value="iv" >voie intraveineuse</option>
  </select></td>
</tr>
<tr>
  <td>Bien-être:</td>
  <td><input type="numbre" max="10" name="bien_etre" size="50"></td>
</tr>
<tr>
  <td>Paramètre mesuré :</td>
  <td><input type="text" name="institut" size="50"></td>
</tr>
<tr>
  <td>Effets :</td>
  <td><input type="text" name="institut" size="50"></td>
</tr>
<tr>
  <td>Effets secondaires :</td>
  <td><input type="text" name="institut" size="50"></td>
</tr>
</table>
<br>

  <p><input type="checkbox" name="choix_table" value="animaux"> Animaux :</p>
<table border=0>
<tr>
  <td>Identifiant animal :</td>
  <td><input type="text" name="num" size="50"></td>
</tr>
<tr>
  <td>Espèce:</td>
  <td><input type="text" name="espece" size="50"></td>
</tr>
<tr>
  <td>Sexe :</td>
  <td><select name="sexe" title="Choississez le sexe de l'animal">
    <option value="" >Choississez le sexe de l'animal</option>
    <option value="M">mâle</option>
    <option value="F" >femelle</option>
  </select></td>
</tr>
<tr>
  <td>Age :</td>
  <td><input type="text" name="age" size="50"></td>
</tr>
</table><br>
  <button type="submit" class="btn btn-primary">Rechercher</button></div></center>
<br><br>
&#169 AUBRY Romain & PAUL Julie

</body>
</html>
