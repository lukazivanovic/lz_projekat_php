<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}

// Create database connection
$conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $conn, 'utf8');
$upload_dir = 'img/proizvodi/';

if (isset($_POST['Submit'])) {
	$kategorija = $_POST['kategorija'];
	$name = $_POST['name'];
	$opis = $_POST['opis'];
	$kolicina = $_POST['kolicina'];
	$cena = $_POST['cena'];
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
		$sql = "insert into proizvod(Kategorija, Naziv, Opis, Kolicina, Cena, Slika) values('".$kategorija."', '".$name."', '".$opis."', '".$kolicina."', '".$cena."', '".$pic."')";
		$result = mysqli_query($conn, $sql);

		if($result){
			$successMsg = 'New record added successfully';
			header('Location: adminproizvod.php');
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
				<a class="btn btn-primary" href="adminproizvod.php" role="button">Назад</a>
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kategorija">Категорија</label>
						<?php
						$sqlKat=mysqli_query($conn, "SELECT * FROM kategorija");
						if(mysqli_num_rows($sqlKat)){
							$selectKat= '<select class="custom-select" id="kategorija" name="kategorija">';
							$selectKat.='<option selected></option>';
							while($rs=mysqli_fetch_array($sqlKat)){
								$selectKat.='<option value="'.$rs['ID'].'">'.$rs['Naziv'].'</option>';
							}
						}
						$selectKat.='</select>';
						echo $selectKat;
						?>
					</div>
					<div class="form-group">
						<label for="name">назив</label>
						<input type="text" class="form-control" name="name" placeholder="назив" value="" required>
					</div>
					<div class="form-group">
						<label for="name">опис</label>
						<textarea type="text" class="form-control" name="opis" placeholder="опис" rows="5"></textarea>
					</div>
					<div class="form-group">
						<label for="name">количина</label>
						<input type="number" class="form-control" name="kolicina" placeholder="количина" value="">
					</div>
					<div class="form-group">
						<label for="name">цена</label>
						<input type="number" class="form-control" name="cena" placeholder="цена" value="">
					</div>
					<div class="form-group">
						<label for="image">изабери слику</label>
						<input type="file" class="form-control" name="image" value="" required>
					</div>
					<div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">направи производ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>