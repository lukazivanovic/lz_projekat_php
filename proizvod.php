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

<img class='img-thumbnail' src="<?php echo $row['Slika']; ?>" alt="...">
<br>
<p>Назив: <?php echo $row['Naziv']; ?></p>
<p class="text-justify">Опис: <?php echo $row['Opis']; ?></p>
<p>Количина: <?php echo $row['Kolicina']; ?></p>
<p>Цена: <?php echo number_format($row['Cena'],2); ?> динара</p>


<a class="btn btn-primary" id="fetchUserDataBtn" href="ses_korpa.php?id=<?php echo $row['ID'] ?>" role="button">DODAJ U KORPU</a>
<?php
$result->close(); 
$mysqli->close();
?>
</div>
</div>

<?php
include "footer.php";
?>