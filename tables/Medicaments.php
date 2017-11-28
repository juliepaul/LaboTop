<?php
include("mise_en_page.php");

$stmt = $base->prepare("SELECT * FROM medicaments");
$stmt->execute();
$stmt->bind_result($DCI, $Nom_generique,$Principe_actif, $Forme_galenique);
?>
<div class="container-fluid"
  <div id="marge"><p><h4>Listes de tous les médicaments utilisés dans les études, ainsi que leurs caractéristiques</h4>
  Cette page nous présente les médicaments qui ont été étudiés par les expérimentateurs.Ils sont différenciés par leur DCI (Dénomination
  Commune Internationale), leur nom générique, leur principe actif et leur forme galénique.</p></div>
  <center>
  <table class="table table-striped table-hover table-bordered" border="1px"  width=40%>
    <caption><h3><center><b>Médicaments</b></center></h3></caption>
    <theader>
      <th width=20%><center>DCI</center></th>
      <th width=20%><center>Nom générique</center></th>
      <th width=20%><center>Principe actif</center></th>
      <th width=20%><center>Forme galénique</center></th>
    </theader>

  <?php
  while($stmt->fetch()){
echo"    <tr>
      <td><center>". $DCI ."</center></td>
      <td><center>". $Nom_generique  ."</center></td>
      <td><center>". $Principe_actif  ."</center></td>
      <td><center>". $Forme_galenique  ."</center></td>
    </tr>";
}

  ?>
</table>
    <br/>
    <center><a href="./../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
</div>';

</body>
</html>
