<?php
include("mise_en_page.php");

$stmt = $base->prepare("SELECT * FROM experimentateur");
$stmt->execute();
$stmt->bind_result($Id_exp, $Nom, $Prenom, $Specialite, $Mail);
?>
<div class="container-fluid"
  <div id="marge"><p><h4>Listes de tous les expérimentateurs ainsi que les caractéristiques qui les différencient</h4>
  Cette table permet de visualiser les différents expérimentateurs participant aux recherches sur l'expérimentation animale. Les
caractéristiques sont leur identifiant unique, leur nom, ainsi que leur prénom. La spécialité qu'ils exercent, et leur mail, afin
de les contacter.</p></div>
  <center>
  <table class="table table-striped table-hover table-bordered" border="1px" width=60%>
    <caption><h3><center><b>Expérimentateurs</b></center></h3></caption>
    <theader>
      <th width=20%><center>Id_exp</center></th>
      <th width=20%><center>Nom</center></th>
      <th width=20%><center>Prénom</center></th>
      <th width=20%><center>Spécialité</center></th>
      <th width=20%><center>Mail</center></th>
    </theader>

  <?php
  while($stmt->fetch()){
echo"    <tr>
      <td><center>". $Id_exp  ."</center></td>
      <td><center>". $Nom  ."</center></td>
      <td><center>". $Prenom  ."</center></td>
      <td><center>". $Specialite  ."</center></td>
      <td><center>". $Mail  ."</center></td>
    </tr>";
}
  ?>

  </table>
    <br/>
    <center><a href="./../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
</div>';

</body>
</html>
