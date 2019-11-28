<?php 
//otavranje konekcije
$id = $_GET['id'] ?? '';
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM proizvod WHERE ID=$id";
$result = $mysqli->query($query);
$row = $result->fetch_array();
//pocetak sesije
session_start();
//dodavanje predmeta u korpi
if(empty($_SESSION['korpa'])){
    $_SESSION['korpa'] = array();
}
$korpa_predmet = array();
$prokolicina = $_POST['prokolicina'];
$proUkupnaCena = $row['Cena'] * $prokolicina;
array_push($korpa_predmet, $row['ID'], $row['Naziv'], $row['Opis'], $row['Cena'], $prokolicina, $proUkupnaCena, $row['Slika']);
array_push($_SESSION['korpa'], $korpa_predmet);
$ukupnaCena = 0;
//povratak u kopru
header('Location: korpa.php');
//zatvaranje konekcije
$result->close();
$mysqli->close();
?>