<?php
include("mise_en_page.php");

$stmt = $base->prepare("SELECT * FROM animaux"); // la requête permet de prendre tous les tuples de la tables animaux
$stmt->execute();
$stmt->bind_result($Id_puce, $Espece, $Sexe, $Age); // la requête va afficher tous les attributs de la table
?>
<div class="container-fluid">
  <div id="marge"><p><h4>Listes de tous les animaux utilisés dans les études, ainsi que leurs caractéristiques</h4>
Cette table recense toutes les caractéristiques des animaux utilisés dans les études de recherche. On voit l'ensemble des animaux utilisés,
leur identification unique, le nom d'espèce de l'animal (nom latin), le sexe (1 correspond à mâle et 2 correspond à femelle), ainsi que l'âge (en années)
au moment de l'étude.</p></div>
  <center>
  <img src="./../img/rats.jpg" width="20%"/>
  <table class="table table-striped table-hover table-bordered" border="1px"  width=40%> <!-- mise en page de la table sous forme d'un tableau -->
    <caption><h3><center><b>Animaux</b></center></h3></caption>
    <theader>
      <th width=20%><center>Id_puce</center></th>
      <th width=20%><center>Espèce</center></th>
      <th width=20%><center>Sexe</center></th>
      <th width=20%><center>Âge</center></th>
    </theader>

  <?php
  while($stmt->fetch()){ //tant qu'il y a une ligne de la requête on va afficher le tuple sous forme de ligne d'un tableau
echo"    <tr>
      <td><center>". $Id_puce  ."</center></td>
      <td><center>". $Espece ."</center></td>
      <td><center>". $Sexe ."</center></td>
      <td><center>". $Age ."</center></td>
    </tr>";
}
  ?>

</table>
    <br/>
    <center><a href="./.././../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
</div>';

</body>
</html>
