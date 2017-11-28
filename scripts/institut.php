<?php
include("connexion_BD.php");

$mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);

if (isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $mysqli->query("SELECT DISTINCT Institut FROM recherche WHERE Institut LIKE   '%".$searchTerm."%'");
  while ($row = $query->fetch_assoc()) {
        $data[] = $row['Institut'];
    }
}

echo json_encode($data);
?>
