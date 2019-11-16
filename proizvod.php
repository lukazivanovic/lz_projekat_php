<?php
include "header.php";
$id = $_GET['id'] ?? '';
 
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
  <div class="proizvodSlika">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <img class='img-thumbnail' src='admin/img/proizvodi/<?php echo $row['Slika']; ?>' alt="...">
      </div>
      <div class="col-sm-12 col-md-6">
        <?php if($row['Kolicina']>0){ ?>  
        <p>Цена: <?php echo number_format($row['Cena'],2); ?> динара</p>
        <?php if (isset( $_SESSION['login_user'] ) ) { ?>
        <a class="btn btn-primary" id="fetchUserDataBtn" href="ses_korpa.php?id=<?php echo $row['ID'] ?>" role="button">ДОДАЈ У КОРПУ</a>
        <?php } else { ?><div class='font-weight-bold'><a href="loginforma.php">ПРИЈАВИТЕ СЕ</a> да бисте купили производ</div><?php }
        } else { ?>
          <p class="nijedostupno">НИЈЕ ДОСТУПНО</p>
        <?php } ?>
      </div>
    </div>
  <br>
  <p class="text-justify"><?php echo $row['Opis']; ?></p>
  </div>
</div>

<?php
$result->close(); 
$mysqli->close();
include "footer.php";
?>