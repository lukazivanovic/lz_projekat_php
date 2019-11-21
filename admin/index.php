<?php
include "header.php";

if (!isset($_SESSION['login_admin'])){ 
    header("location: loginformaadmin.php");
}?>
<div class="main">
    <div class="container row justify-content-center">
        <div class="col-md-6">
            <h1>АДМИН</h1>
            <br>
            <a class="btn btn-primary" href="adminkategorija.php"><i class="fas fa-certificate"></i> Све категорије</a><br><br>
            <a class="btn btn-primary" href="adminproizvod.php"><i class="fas fa-microchip"></i> Сви производи</a><br><br>
            <a class="btn btn-primary" href="adminkorisnik.php"><i class="fas fa-user"></i> Сви корисници</a><br><br>
            <a class="btn btn-primary" href="adminracun.php"><i class="fas fa-file-invoice"></i> Сви рачуни</a><br><br>
            <a class="btn btn-primary" href="admingalerija.php"><i class="far fa-images"></i> Галерија</a>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>