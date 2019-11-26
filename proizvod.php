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
      <div class="col-sm-12 col-md-8 col-lg-6">
        <img id="myImg" class='img-thumbnail' src='admin/img/proizvodi/<?php echo $row['Slika']; ?>' alt="<?php echo $row['Naziv']; ?>">
      </div>
      <div class="col-sm-12 col-md-4 col-lg-6">
        <form class="" action="ses_korpa.php?id=<?php echo $row['ID'] ?>" method="post" enctype="multipart/form-data">
          <?php if($row['Kolicina']>0){ ?>  
          <p>Цена: <?php echo number_format($row['Cena'],2); ?> динара</p>
          <?php if(isset($_SESSION['login_user'])){ ?>
          <div class="form-group">
						<label for="prokolicina">количина</label>
						<input type="number" class="form-control-sm" name="prokolicina" value="1" required>
          </div>
          <div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">ДОДАЈ У КОРПУ</button>
					</div>
          <?php } else { ?><div class='font-weight-bold'><a href="loginforma.php">ПРИЈАВИТЕ СЕ</a> да бисте купили производ</div><?php }
          } else { ?>
            <p class="nijedostupno">НИЈЕ ДОСТУПНО</p>
          <?php } ?>
        </form>
      </div>
    </div>
  <br>
  <p class="text-justify" style="white-space: pre-line;"><?php echo $row['Opis']; ?></p>
  </div>
</div>

<!--<img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px">-->
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span class="close">&times;</span>
  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">
  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script src="js/proizvod.js"></script>

<?php
$result->close(); 
$mysqli->close();
include "footer.php";
?>