<?php
include("mise_en_page.php");

$stmt = $base->prepare("SELECT * FROM recherche");
$stmt->execute();
$stmt->bind_result($Id_exp, $DCI, $N_protocole, $Equipe, $Institut, $Date_etude);
?>
<div class="container-fluid"
  <div id="marge"><p><h4>Listes de toutes les recherches effectuées par les expérimentateurs</h4>
    La table recherche présente le (ou les) expérimentateurs en charge de l'étude, le médicament étudié. Le numéro de protocole
    qui permet de retrouver l'étude ; l'équipe, l'institut, qui ont mené la recherche, ansi que la date (format de la date : aaaa-mm-jj)
    de début de l'étude. </p></div>
  <center>
  <table class="table table-striped table-hover table-bordered" border="1px"  width=60%>
    <caption><h3><center><b>Recherche</b></center></h3></caption>
    <theader>
      <th width=15%><center>Id_exp</center></th>
      <th width=15%><center>DCI</center></th>
      <th width=15%><center>N_protocole</center></th>
      <th width=15%><center>Equipe</center></th>
      <th width=15%><center>Institut</center></th>
      <th width=15%><center>Date</center></th>

    </theader>

  <?php
  while($stmt->fetch()){
echo"    <tr>
      <td><center>". $Id_exp  ."</center></td>
      <td><center>". $DCI   ."</center></td>
      <td><center>". $N_protocole  ."</center></td>
      <td><center>". $Equipe  ."</center></td>
      <td><center>". $Institut  ."</center></td>
      <td><center>". $Date_etude  ."</center></td>

    </tr>";
}

  ?>
</table>
    <br/>
    <center><a href="./../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
</div>';

</body>
</html>
