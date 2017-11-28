<?php
include('mise_en_page.php');

$stmt = $base->prepare("SELECT * FROM teste");
$stmt->execute();
$stmt->bind_result($Id_puce, $DCI, $Voie_administration, $Bien_etre, $Parametre_mesure, $Effets, $Effets_secondaires, $Delai, $Duree, $Dose);
?>
<div class="container-fluid"
  <div id="marge"><p><h4>Listes des expériences réalisées sur les animaux et leurs résultats</h4>
    La table teste permet le regroupement de tous les résultats de l'étude effectuée sur un ou plusieurs animaux. Elle comprend l'identifiant de l'animal
    la DCI du médicament testé, sa voie d'administration, le bien-être de l'animal suite à cette injection, le paramètre biologique mesuré, les effets de
    la molécules et la présence ou non d'effets secondaires, les caractéristiques sur l'activité du médicaments (délai et durée d'action), ainsi que la dose
    (en µg)administrée.</p></div>
  <center>
    <table class="table table-striped table-hover table-bordered" border="1px" width=60%>
    <caption><h3><center><b>Teste</b></center></h3></caption>
    <theader>
      <th width=10%><center>Id_puce</center></th>
      <th width=10%><center>DCI</center></th>
      <th width=10%><center>Voie d'administration</center></th>
      <th width=10%><center>Bien être</center></th>
      <th width=10%><center>Paramètre mesuré</center></th>
      <th width=10%><center>Effets</center></th>
      <th width=10%><center>Effets secondaires</center></th>
      <th width=10%><center>Délai d'action (en min)</center></th>
      <th width=10%><center>Durée d'action (en min)</center></th>
      <th width=10%><center>Dose (en µg)</center></th>
    </theader>

  <?php
  while($stmt->fetch()){
echo"    <tr>
      <td><center>". $Id_puce   ."</center></td>
      <td><center>". $DCI  ."</center></td>
      <td><center>". $Voie_administration   ."</center></td>
      <td><center>". $Bien_etre   ."</center></td>
      <td><center>". $Parametre_mesure  ."</center></td>
      <td><center>". $Effets  ."</center></td>
      <td><center>". $Effets_secondaires  ."</center></td>
      <td><center>". $Delai  ."</center></td>
      <td><center>". $Duree  ."</center></td>
      <td><center>". $Dose  ."</center></td>
    </tr>";
}

  ?>
</table>
    <br/>
    <center><a href="./../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
</div>';

</body>
</html>
