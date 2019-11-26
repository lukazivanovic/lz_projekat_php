<?php
include "header.php";

if (isset( $_SESSION['login_user'])) { 
    header("location: loginforma.php");
}

// Create database connection
$mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');

if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from kupac";
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
            $sql = "update kupac set Lozinka = '".$lozinka2."' where Korisnicko_ime='".$kor_ime."' and Email='".$email."'";
            $result = mysqli_query($mysqli, $sql);
            if($result){
                $successMsg = 'New record updated successfully';
                header('Location:loginforma.php');
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
				<a class="btn btn-primary" href="loginforma.php" role="button">Назад</a>
				<form class="" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">корисничко име</label>
						<input type="text" class="form-control" name="kor_ime" placeholder="корисничко име" value="" required>
					</div>
					<div class="form-group">
						<label for="name">имејл</label>
						<input type="text" class="form-control" name="email" placeholder="имејл" value="" required>
                    </div>
                    <div class="form-group">
						<label for="name">нова лозинка</label>
						<input type="password" class="form-control" name="lozinka2" placeholder="лозинка" value="" required>
                    </div>
                    <div class="form-group">
						<label for="name">иста нова лозинка</label>
						<input type="password" class="form-control" name="lozinka3" placeholder="лозинка" value="" required>
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