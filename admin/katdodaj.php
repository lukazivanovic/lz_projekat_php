<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}

// Create database connection
$conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $conn, 'utf8');

$upload_dir = 'img/kategorije/';

if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$imgName = $_FILES['image']['name'];
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];
	if(empty($name)){
			$errorMsg = 'Please input name';
	}else{
		$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
		$pic = time().'_'.rand(1000,9999).'.'.$imgExt;
		if(in_array($imgExt, $allowExt)){
			if($imgSize < 5000000){
				move_uploaded_file($imgTmp ,$upload_dir.$pic);
			}else{
				$errorMsg = 'Image too large';
			}
		}else{
			$errorMsg = 'Please select a valid image';
		}
	}
	if(!isset($errorMsg)){
		$sql = "insert into kategorija(Naziv, Slika)
				values('".$name."', '".$pic."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$successMsg = 'New record added successfully';
			header('Location: adminkategorija.php');
		}else{
			$errorMsg = 'Error '.mysqli_error($conn);
		}
	}
}
?>

<div class="main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">назив</label>
						<input type="text" class="form-control" name="name" placeholder="назив" value="" required>
					</div>
					<div class="form-group">
						<label for="image">изабери слику</label>
						<input type="file" class="form-control" name="image" value="" required>
					</div>
					<div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">направи категорију</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>