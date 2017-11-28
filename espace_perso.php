<?php
include("mise_en_page.php");

  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
  $stmt = $base->prepare('SELECT LOGIN,Nom,Prenom FROM users WHERE LOGIN=?');
  $stmt->bind_param('s',$_SESSION['pseudo']);
  $stmt->execute();
  $stmt->bind_result($LOGIN, $Nom, $Prenom);
  while ($stmt->fetch()){
    $_SESSION['Nom']= $Nom;
    $_SESSION['Prenom']= $Prenom;
  }

 ?>

<body style="background-image: url('img/background_espace_perso.jpg');background-repeat:no-repeat;
 	background-size: cover;">
<form method="post" action="scripts/update.php">
  <br/><br/><br/><br/>
  <p><center>
    <fieldset>
      <img src="img/espace_perso.png" width="8%"/>
      <label>Pseudo</label> : <label><?php echo $_SESSION['pseudo']; ?></label><br /><br />
      <label>Nom</label> : <input type="text" name="nom" placeholder= <?php echo $_SESSION['Nom']; ?>><br /><br />
      <label>Prénom</label> : <input type="text" name="prenom" placeholder= <?php echo $_SESSION['Prenom']; ?>><br /><br />

<!-- MODIFICATION JULIE -->
      <h5>Changement du mot de passe</h5>
        <label>Mot de passe actuel : <input type="password" name="amdp" ></label>
        <label>Nouveau mot de passe : <input type="password" name="nmdp" ></label>
        <label>Vérification mot de passe : <input type="password" name="vmdp" ></label>

    </fieldset>

      <input type="submit" value="Sauvegarder" />
    </center>

  </p>
</form>

</body>
</html>
