<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
<div class="container">
<h1>АДМИН</h1>
<br>
<a href="adminkategorija.php">Све категорије</a><br><br>
<a href="adminproizvod.php">Сви производи</a><br><br>
<a href="adminkorisnik.php">Сви корисници</a>

<a href="admingalerija.php">Galerija</a>

</div>
</div>
<?php
include "footer.php";
?>