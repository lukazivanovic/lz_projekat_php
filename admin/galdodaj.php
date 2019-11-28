<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}
//otvaranje konekcije
$conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $conn, 'utf8');
$upload_dir = 'img/carousel/';
if (isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$opis = $_POST['opis'];
	$alt = $_POST['alt'];
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
		//SQL upit za dodavanje slike u galeriju
		$sql = "insert into galerija(Naslov, Opis, Slika, Alt) values('".$name."', '".$opis."', '".$pic."', '".$alt."')";
		$result = mysqli_query($conn, $sql);
		if($result){
			$successMsg = 'New record added successfully';
			header('Location: admingalerija.php');
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
				<a class="btn btn-primary" href="admingalerija.php" role="button">Назад</a>
				<!--forma za dodavanje slike u galeriju-->
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">наслов</label>
						<input type="text" class="form-control" name="name" placeholder="наслов" value="" required>
					</div>
					<div class="form-group">
						<label for="name">опис</label>
						<input type="text" class="form-control" name="opis" placeholder="опис" value="">
					</div>
					<div class="form-group">
						<label for="image">изабери слику</label>
						<input type="file" class="form-control" name="image" value="" required>
					</div>
					<div class="form-group">
						<label for="name">alt</label>
						<input type="text" class="form-control" name="alt" placeholder="alt" value="">
					</div>
					<div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">направи слику</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>