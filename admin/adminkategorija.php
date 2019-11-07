<?php
include "header.php";
$id = $_GET['id'] ?? '';
?>

<?php 
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
    <li class="breadcrumb-item"><a href="admin.php">АДМИН</a></li>
    <li class="breadcrumb-item active" aria-current="page">категорије</li>
  </ol>
</nav>

<div class=container-fluid id="prodavnica">

<div class="d-flex justify-content-center">
<button type="button" class="btn btn-primary btn-lg">Претрага производа</button>
</div>

<div class="row d-flex justify-content-center">

<table class="table table-striped table-bordered table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>

<?php
while($row = mysqli_fetch_assoc($resultKat)) {
echo "<a class='text-decoration-none' href='proizvod.php?id=".$row['ID']."'>";
echo "<div class='col-xs-6 col-sm-6 col-md-4 col-lg-3 text-center'>";
echo "<div class='card'>";
echo "<img src='".$row['Slika']."' class='card-img-top' alt='...'>";
echo "<div class='card-body'>";
echo "<p class='card-text'>".$row['Naziv']."</p>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</a>";
}

$result->close();
$mysqli->close();
?>

</div>
</div>

<?php
include "footer.php";
?>