<?php
include "header.php";
//provera administratora
if (isset( $_SESSION['login_admin'])) { 
    header("location: loginformaadmin.php");
}
//otvaranje konekcije
$mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
if (isset($_GET['id'])) {
$id = $_GET['id'];
//SQL upit za izbor administratora
$sql = "select * from administrator";
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}else {
    $errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
    $kor_ime = $_POST['kor_ime'];
    $email = $_POST['email'];
    $lozinka2 = $_POST['lozinka2'];
    $lozinka3 = $_POST['lozinka3'];
    if($lozinka2 == $lozinka3){
        if(!isset($errorMsg)){
            //SQL upit za izmenu lozinke
            $sql = "update administrator set Lozinka = '".$lozinka2."' where Korisnicko_ime='".$kor_ime."' and Email='".$email."'";
            $result = mysqli_query($mysqli, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                header('Location:loginformaadmin.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($mysqli);
            }
        }
    }
}
?>
<div class="main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
                <a class="btn btn-primary" href="loginformaadmin.php" role="button">Назад</a>
                <!--forma za izmenu lozinke-->
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">корисничко име</label>
						<input type="text" class="form-control" name="kor_ime" placeholder="корисничко име" value="">
					</div>
					<div class="form-group">
						<label for="name">имејл</label>
						<input type="text" class="form-control" name="email" placeholder="имејл" value="">
                    </div>
                    <div class="form-group">
						<label for="name">нова лозинка</label>
						<input type="password" class="form-control" name="lozinka2" placeholder="лозинка" value="">
                    </div>
                    <div class="form-group">
						<label for="name">иста нова лозинка</label>
						<input type="password" class="form-control" name="lozinka3" placeholder="лозинка" value="">
					</div>
                    <div class="form-group">
						<button type="submit" name="Submit" class="btn btn-primary waves">измени лозинку</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>