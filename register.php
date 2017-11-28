<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">


 <head>
   <meta charset="UTF-8">
   <title>Inscription</title>
   <link rel="shortcut icon" type="image/x-icon" href="./?getimg=favicon" />
   <link rel="stylesheet" href="res/css/style.css" />
 </head>

 <body style="background-image: url('img/experimentateurs.jpg');background-repeat:no-repeat;
 	background-size: cover;">
  <center>

  <div class="jumbotron" style="width:60%;opacity:0.92;margin-top:30px">
    <div class="container-fluid">
    <h2>Inscription gratuite</h2>

<div class="form-group">
 <form method="post" action="scripts/inscription.php">
   <p>
   </br>
   </br>
   <table>
     <tr>
     <td><label class="form-group">Votre pseudo : </label></td>
     <td><input class="form-group" type="text" name="pseudo" required /></br></td>
     </tr>
     <tr>
     <td><label class="form-group" for="pass">Votre mot de passe : </label></td>
     <td><input class="form-group" type="password" name="pass" id="pass" required  /></br></td>
     </tr>
     <tr>
     <td><label class="form-group">Votre nom</label> : </td>
     <td><input class="form-group" type="text" name="nom" required /></br></td>
     </tr>
     <tr>
     <td><label class="form-group">Votre prénom</label> : </td>
     <td><input class="form-group" type="text" name="prenom" required /></br></td>
     </tr>
     <tr>
     <td><label class="form-group">Votre adresse e-mail : </label></td>
     <td><input class="form-group" type="email" required /></br></td>
     </tr>
   </table>
   </br>
   </br>

   <table>
     <p>Veuillez indiquer votre profession :</p>
     <tr>
       <td><input class="form-group" type="radio" name="profession" value="etudiant" id="etudiant" /></td>
       <td><label for="Etudiant">  Etudiant</label></br></td>
     </tr>
     <tr>
       <td><input type="radio" name="profession" value="chercheur" id="chercheur" /></td>
       <td><label for="chercheur">  Chercheur</label></br></td>
     </tr>
     <tr>
       <td><input type="radio" name="profession" value="biologiste" id="biologiste" /></td>
       <td><label for="biologiste">  Biologiste</label></br></td>
     </tr>
     <tr>
       <td><input type="radio" name="profession" value="biostatisticien" id="biostatisticien" /></td>
       <td><label for="biostatisticien">  Biostatisticien</label></br></td>
     </tr>
     <tr>
     <td><input type="radio" name="profession" value="medecin" id="medecin" /></td>
     <td><label for="medecin">  Médecin</label></br></td>
     </tr>
     <tr>
     <td><input type="radio" name="profession" value="pharmacien" id="pharmacien" /></td>
     <td><label for="pharmacien">  Phamacien</label></br></td>
     </tr>
     <tr>
     <td><input type="radio" name="profession" value="autre" id="autre" /></td>
     <td><label> Autres</label> : <input type="text" name="profession" /></td>
   </table>
   </br>
   </br>

   <label for="pays">Dans quel pays habitez-vous ?</label></br>
        <select name="pays" id="pays">
            <option value="france">France</option>
            <option value="espagne">Espagne</option>
            <option value="italie">Italie</option>
            <option value="royaume-uni">Royaume-Uni</option>
            <option value="canada">Canada</option>
            <option value="etats-unis">États-Unis</option>
            <option value="chine">Chine</option>
            <option value="japon">Japon</option>
            <option value="allemagne">Allemagne</option>
        </select>
   </br>
   </br>
   <input type="submit" value="Créer mon compte" class="btn btn-primary disabled">
   <br>
   <br>
   <a href="index.php"><div class="btn btn-primary">Retour à la page de connexion</div></a>
   </p>
 </form>
</div>
</div>
</center>

<?php
if(isset($_SESSION['register_error'])){
      echo '
      <div class="alert alert-danger" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span>
Ce login est déjà utilisé !
</div>
      ';
    }
?>


  </div>
 </body>
 </html>
