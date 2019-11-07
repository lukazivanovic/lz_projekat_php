<?php
include "header.php";
?>

<div class=container-fluid id="prodavnica">

<div class="d-flex justify-content-center">
<button type="button" class="btn btn-primary btn-lg">Претрага производа</button>
</div>

<div class="row d-flex justify-content-center">

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM kategorija";
$result = $mysqli->query($query);

while($row = mysqli_fetch_array($result)) {
echo "<a class='text-decoration-none' href='kategorija.php?id=".$row['ID']."'>";
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