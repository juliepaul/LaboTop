<?php
include("connexion_BD.php");

$mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);

if (isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $mysqli->query("SELECT DISTINCT Nom,Prenom FROM experimentateur WHERE Nom LIKE   '%".$searchTerm."%' OR  Prenom LIKE   '%".$searchTerm."%' ");
  while ($row = $query->fetch_assoc()) {
        $data[] = $row['Nom']. " ". $row['Prenom'];
    }
}

echo json_encode($data);
?>
