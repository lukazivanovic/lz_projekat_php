<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}
//otvaranje konekcije
$conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $conn, 'utf8');
$upload_dir = 'img/proizvodi/';
//definisanje podataka o proizvodu
if (isset($_POST['Submit'])) {
	$kategorija = $_POST['kategorija'];
	$name = $_POST['name'];
	$opis = $_POST['opis'];
	$kolicina = $_POST['kolicina'];
	$cena = $_POST['cena'];
	$imgName = $_FILES['image']['name'];
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgSize = $_FILES['image']['size'];

	$error = 1;
	$cenaMsg = "";
	$slikaMsg = "";

	$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
	$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
	$pic = time().'_'.rand(1000,9999).'.'.$imgExt;
	if(in_array($imgExt, $allowExt)){
		if($imgSize > 5000000){
			$error = 0;
			$slikaMsg .= ' Image too large';
		}
	}else{
		$error = 0;
		$slikaMsg .= ' Please select a valid image';
	}
	if(!is_numeric($cena)){
		$error = 0;
		$cenaMsg .= " Cena mora biti broj.";
	}
	
	if($error==1){
		//SQL upit za dodavanje proizvoda
		$sql = "insert into proizvod(Kategorija, Naziv, Opis, Kolicina, Cena, Slika) values('".$kategorija."', '".$name."', '".$opis."', '".$kolicina."', '".$cena."', '".$pic."')";
		move_uploaded_file($imgTmp ,$upload_dir.$pic);
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
				<!--forma za dodavanje novog proizvoda-->

				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="kategorija">Категорија</label>
						<?php
						$sqlKat=mysqli_query($conn, "SELECT * FROM kategorija");
						if(mysqli_num_rows($sqlKat)){
							$selectKat= '<select class="custom-select" id="kategorija" name="kategorija">';
							$selektovana="";
							while($rs=mysqli_fetch_array($sqlKat)){
							if(isset($kategorija)){
							if($kategorija==$rs['ID']){
								$selektovana="selected";
							}else $selektovana="";
							}
								$selectKat.="<option value=$rs[ID] $selektovana> $rs[Naziv]</option>";
							}
						}
						$selectKat.='</select>';
						echo $selectKat;
						?>
					</div>
					<div class="form-group">
						<label for="name">назив</label>
						<input type="text" class="form-control" name="name" placeholder="назив" value="<?php if(!empty($name)) echo $name; ?>" required>
					</div>
					<div class="form-group">
						<label for="name">опис</label>
						<textarea type="text" class="form-control" name="opis" placeholder="опис" rows="5" required></textarea>
					</div>
					<div class="form-group">
						<label for="name">количина</label>
						<input type="number" class="form-control" name="kolicina" placeholder="количина" value="" required>
					</div>
					<div class="form-group">
						<label for="name">цена</label>
						<?php
							if(!empty($cenaMsg)){
							echo "<div class='alert alert-danger' role='alert'>";
								echo $cenaMsg;
							echo "</div>";
							}
						?>
						<input type="text" class="form-control" name="cena" placeholder="цена" value="" required>
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