<?php
include "header.php";
$id = $_GET['id'] ?? '';
?>

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM proizvod WHERE ID=$id";
$result = $mysqli->query($query);
$queryKat = "SELECT kategorija.ID, kategorija.Naziv, proizvod.Kategorija FROM kategorija JOIN proizvod ON kategorija.ID = proizvod.Kategorija WHERE proizvod.ID = $id";
$resultKat = $mysqli->query($queryKat);

$row = $result->fetch_array();
$rowKat = $resultKat->fetch_array();
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="prodavnica.php">Продавница</a></li>
    <li class="breadcrumb-item"><a href="kategorija.php?id=<?php echo $row['Kategorija']; ?>"><?php echo $rowKat['Naziv']; ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['Naziv']; ?></li>
  </ol>
</nav>

<div class="container galerija">

<div class="d-flex justify-content-center">
<button type="button" class="btn btn-primary btn-lg">Претрага производа</button>
</div>

<div class="proizvodSlika">
<?php
echo "<img class='img-thumbnail' src='".$row['Slika']."' alt='...'>";
echo "<br>";
echo "<p>Назив: ".$row['Naziv']."</p>";
echo "<p class='text-justify'>Опис: ".$row['Opis']."</p>";
echo "<p>Количина: ".$row['Kolicina']."</p>";
echo "<p>Цена: ".$row['Cena']." динара</p>";

$result->close();
$mysqli->close();
?>
</div>
</div>

<?php
include "footer.php";
?>