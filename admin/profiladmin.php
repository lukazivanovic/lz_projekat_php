<?php
include "header.php";
//otvaranje konekcije
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lz_php_projekat");
//cuvanje sesije
$user_check=$_SESSION['login_admin'];
//SQL upit za izbor administratora
$ses_sql=mysqli_query($connection, "select * from administrator where Korisnicko_ime='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session_id =$row['ID'];
$login_session =$row['Korisnicko_ime'];
$login_session_lozinka =$row['Lozinka'];
$login_session_email =$row['Email'];
?>
<!--prikaz podataka o administratoru--> 
<div class="container row justify-content-center" id="profile">
    <div class="col-md-6">    
        <p id="welcome"><b>Добро дошли</b><i><br></p>
        <i><p>Корисничко име: <?php echo $login_session; ?></p>
        <p>Имејл: <?php echo $login_session_email; ?></p>
        <p><a class="btn btn-primary" href="profiladminizmeni.php">измени податке</a></p>
        <p><a class="btn btn-primary" href="profiladminpassword.php">измени лозинку</a></p>
    </div>
</div>
<?php
include "footer.php";
?>