<?php
include("connexion_BD.php");

$mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);

if (isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $mysqli->query("SELECT Distinct Espece FROM animaux WHERE Espece LIKE   '%".$searchTerm."%'");
  while ($row = $query->fetch_assoc()) {
        $data[] = $row['Espece'];
    }
}

echo json_encode($data);
?>
