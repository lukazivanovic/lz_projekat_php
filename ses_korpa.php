<?php 
$id = $_GET['id'] ?? '';
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM proizvod WHERE ID=$id";
$result = $mysqli->query($query);
$row = $result->fetch_array();

session_start();
if(empty($_SESSION['korpa'])){
    $_SESSION['korpa'] = array();
}

$korpa_predmet = array();
array_push($korpa_predmet, $row['Naziv'], $row['Opis'], $row['Cena'], $row['Slika']);
array_push($_SESSION['korpa'], $korpa_predmet);

header('Location: korpa.php');
$result->close();
$mysqli->close();
?>