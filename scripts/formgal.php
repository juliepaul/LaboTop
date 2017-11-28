<?php
include("connexion_BD.php");

$mysqli = new mysqli(MYHOST, MYUSER, MYPASS, DBNAME);

if (isset($_GET['term'])){
  $searchTerm = $_GET['term'];
  $query = $mysqli->query("SELECT DISTINCT Forme_galenique FROM medicaments WHERE Forme_galenique LIKE   '%".$searchTerm."%'");
  while ($row = $query->fetch_assoc()) {
        $data[] = $row['Forme_galenique'];
    }
}

echo json_encode($data);
?>
