<?php
include "header.php";
?>

<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "lz_php_projekat");
  mysqli_set_charset( $db, 'utf8');
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['Naziv']);
  	// image file directory
  	$target = "img/kategorije/".basename($image);
  	$sql = "INSERT INTO kategorija (Naziv, Slika) VALUES ('$image_text', '$image')";
  	// execute query
  	mysqli_query($db, $sql);
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "слика успешно послата";
  	}else{
  		$msg = "неуспешно слање слике";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM kategorija");
?>

<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>

<div id="content">
<form id="formaadmin" method="POST" action="adminkategorija.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="katnaziv">Назив</label>
    <input type="text" class="form-control form-control-sm" name="Naziv" id="katnaziv" placeholder="назив нове категорије">
  </div>
  <div class="form-group">
    <label for="katslika">Слика (није неопходно)</label>
    <input type="file" class="form-control-file form-control-sm" id="katslika" name="image">
  </div>
  <button type="submit" name="upload" class="btn btn-primary">додај категорију</button>
</form>

</div>
</div>

<?php
include "footer.php";
?>