<?php
session_start();
$_SESSION['id'] = null;
$UWAMPFOLDER="../";
?>

<html>
<head>
<title>LaboTop</title>
<link rel="shortcut icon" type="image/x-icon" href="./?getimg=favicon" />
<link rel="stylesheet" href="res/css/style.css" />
</head>


<body style="background-image: url('img/experimentateur.png');background-repeat:no-repeat;
	background-size: cover;">
<center>
  <div class="container-fluid">
<?php
  if(isset($_SESSION['login'])){
      if($_SESSION['login']==true){
        header('Location: intranet.php');
      }
      else{
        echo '
        <div class="alert alert-danger" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span>
Votre login/mot de passe est erroné
</div>
        ';
      }
  }

echo '<h1></h1><br><br>';
echo '<div class="jumbotron" style="width:60%;opacity:0.92;">

<h1>Connexion</h1>
<form method="post" action="scripts/connexion.php">
	<fieldset>
	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo"  class="form-control"   type="text" id="pseudo" /><br />
	<label for="password">Mot de Passe :</label><input type="password" class="form-control" name="password" id="password" />
	</p>
	</fieldset>
	<p><input type="submit" class="form-control" value="Connexion" /></p></form>
  <a href="register.php">Pas encore inscrit ?</a>
  </div>';

?>
</div>
</center>

</body>
<br><br><br><br><br><br><br>
&#169 AUBRY Romain & PAUL Julie

</html>
