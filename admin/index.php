<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
    <div class="container">
        <h1>АДМИН</h1>
        <br>
        <a href="adminkategorija.php"><i class="fas fa-certificate"></i> Све категорије</a><br><br>
        <a href="adminproizvod.php"><i class="fas fa-microchip"></i> Сви производи</a><br><br>
        <a href="adminkorisnik.php"><i class="fas fa-user"></i> Сви корисници</a><br><br>
        <a href="admingalerija.php"><i class="far fa-images"></i> Галерија</a>
    </div>
</div>
<?php
include "footer.php";
?>