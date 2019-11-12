<?php
include "header.php";
?>

<div class=container-fluid id="prodavnica">

<div class="d-flex justify-content-center">
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Претражи" aria-label="Search">
    <button class="btn btn-primary my-2 my-sm-2" type="submit">Претражи</button>
</form>
</div>

<div class="row d-flex justify-content-center">

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM kategorija";
$result = $mysqli->query($query);

while($row = mysqli_fetch_array($result)) {?>
<a class="text-decoration-none" href="kategorija.php?id=<?php echo $row['ID']; ?>">
<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 text-center">
<div class="card">
<img src="admin/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
<div class="card-body">
<p class="card-text"><?php echo $row['Naziv']; ?></p>
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