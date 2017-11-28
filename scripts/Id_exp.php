<?php
include("connexion_BD.php");

$mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);

if (isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $mysqli->query("SELECT Id_exp FROM experimentateur WHERE Id_exp LIKE   '%".$searchTerm."%'");
  while ($row = $query->fetch_assoc()) {
        $data[] = $row['Id_exp'];
    }
}

echo json_encode($data);
?>
