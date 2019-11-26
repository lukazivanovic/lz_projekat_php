<?php
include "header.php";
$id = $_GET['id'] ?? '';

$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM proizvod WHERE Kategorija=$id";
$result = $mysqli->query($query);
$queryKat = "SELECT * FROM kategorija WHERE ID=$id";
$resultKat = $mysqli->query($queryKat);
$rowKat = $resultKat->fetch_assoc();
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="prodavnica.php">Продавница</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $rowKat['Naziv']; ?></li>
  </ol>
</nav>

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

    $result->close();
    $mysqli->close();
  ?>
  </div>
</div>

<?php
include "footer.php";
?>