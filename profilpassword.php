<?php
include "header.php";
//provera korisnika
if (!isset( $_SESSION['login_user'])) { 
    header("location: index.php");
}
//otvaranje konekcije
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lz_php_projekat");
//cuvanje sesije o korisniku
$user_check=$_SESSION['login_user'];
//SQL upit za nalazenje korisnika
$ses_sql=mysqli_query($connection, "select * from kupac where Korisnicko_ime='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
//funkcije za promenu lozinke
if(isset($_POST['Submit'])){
    $lozinka1 = $_POST['lozinka1'];
    $lozinka2 = $_POST['lozinka2'];
    $lozinka3 = $_POST['lozinka3'];
    if($lozinka1 == $row["Lozinka"]){
        if($lozinka2 == $lozinka3){
            if(!isset($errorMsg)){
                $sql = "update kupac set Lozinka = '".$lozinka2."' where ID=".$row['ID'];
                $result = mysqli_query($connection, $sql);
                if($result){
                    $successMsg = 'New record updated successfully';
                    header('Location:index.php');
                }else{
                    $errorMsg = 'Error '.mysqli_error($connection);
                }
            }
        }
    }
}
?>
<div class="main">
	<div class="container">
        <!--forma za promenu lozinke-->
        <div class="row justify-content-center">
			<div class="col-md-6">
				<a class="btn btn-primary" href="profil.php" role="button">Назад</a>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
						<label for="name">стара лозинка</label>
						<input type="password" class="form-control" name="lozinka1" placeholder="лозинка" value="" required>
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