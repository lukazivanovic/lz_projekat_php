<?php
include "header.php";
//provera korisnika
if(isset($_SESSION['login_user'])) { 
    header("location: loginforma.php");
}
//otvaranje konekcije
$conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $conn, 'utf8');
//obrada forme
if (isset($_POST['Submit'])) {
    $kor_ime = $_POST['kor_ime'];
    $lozinka = $_POST['lozinka'];
    $lozinka2 = $_POST['lozinka2'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $grad = $_POST['grad'];
    $post_broj = $_POST['post_broj'];
    $adresa = $_POST['adresa'];
    if(!isset($errorMsg)){
        if($lozinka == $lozinka2){
            //SQL upit za unos novog korisnika
            $sql = "insert into kupac(Korisnicko_ime, Lozinka, Ime, Prezime, Telefon, Email, Grad, Post_broj, Adresa) values('".$kor_ime."', '".$lozinka."', '".$ime."', '".$prezime."', '".$telefon."', '".$email."', '".$grad."', '".$post_broj."', '".$adresa."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $successMsg = 'New record added successfully';
                header('Location: loginforma.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($conn);
            }
        }
    }
}
?>
<div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div id="register" class="col-md-6">
                <a class="btn btn-primary" href="loginforma.php" role="button">Назад</a>
                <!--forma za registraciju novog korisnika-->
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">корисничко име</label>
                        <input type="text" class="form-control" name="kor_ime" placeholder="корисничко име" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">лозинка</label>
                        <input type="password" class="form-control" name="lozinka" placeholder="*******" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">потврда лозинке</label>
                        <input type="password" class="form-control" name="lozinka2" placeholder="*******" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">име</label>
                        <input type="text" class="form-control" name="ime" placeholder="име" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">презиме</label>
                        <input type="text" class="form-control" name="prezime" placeholder="презиме" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">телефон</label>
                        <input type="text" class="form-control" name="telefon" placeholder="телефон" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">имејл</label>
                        <input type="text" class="form-control" name="email" placeholder="имејл" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="name">град</label>
                        <input type="text" class="form-control" name="grad" placeholder="град" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">поштански број</label>
                        <input type="text" class="form-control" name="post_broj" placeholder="поштански број" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">адреса</label>
                        <input type="text" class="form-control" name="adresa" placeholder="адреса" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn btn-primary waves">направи налог</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>