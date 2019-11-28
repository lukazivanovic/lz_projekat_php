<?php
include "header.php";
$id = $_GET['id'] ?? '';
//otvaranje konekcije
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
//SQL upit za pretragu proizvoda po ID kategorije
$query = "SELECT * FROM proizvod WHERE Kategorija=$id";
$result = $mysqli->query($query);
//SQL upit za pretragu kategorije
$queryKat = "SELECT * FROM kategorija WHERE ID=$id";
$resultKat = $mysqli->query($queryKat);
$rowKat = $resultKat->fetch_assoc();
?>
<!--navigacija po prodavnici-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="prodavnica.php">Продавница</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $rowKat['Naziv']; ?></li>
  </ol>
</nav>
<!--prikaz proizvoda po izabranoj kategoriji-->
<div class="container-fluid" id="prodavnica">
  <div class="row d-flex justify-content-center">
  <?php
    while($row = mysqli_fetch_assoc($result)) { ?>
    <a class="text-decoration-none" href="proizvod.php?id=<?php echo $row['ID']; ?>">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 text-center">
      <div class="card">
        <img src="admin/img/proizvodi/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text"><?php echo $row['Naziv']; ?></p>
          <?php if($row['Kolicina']<=0){ ?>
            <p class="nijedostupno">НИЈЕ ДОСТУПНО</p>
          <?php } ?>
        </div>
      </div>
    </div>
    </a>
    <?php
    }
    //zatvaranje konekcije
    $result->close();
    $mysqli->close();
  ?>
  </div>
</div>
<?php
include "footer.php";
?>