<?php
include "header.php";
//include "sesija.php";

$connection = mysqli_connect("localhost", "root", "");
// Selecting Database
$db = mysqli_select_db($connection, "lz_php_projekat");
//session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select * from kupac where Korisnicko_ime='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session_id =$row['ID'];
$login_session =$row['Korisnicko_ime'];
$login_session_lozinka =$row['Lozinka'];
$login_session_ime =$row['Ime'];
$login_session_prezime =$row['Prezime'];
$login_session_telefon =$row['Telefon'];
$login_session_email =$row['Email'];
$login_session_grad =$row['Grad'];
$login_session_pb =$row['Post_broj'];
$login_session_adresa =$row['Adresa'];
?>

<div class="container row justify-content-center" id="profile">
    <div class="col-md-6">
        <p><b>Добро дошли</b></p>
        <p><i><?php /*echo $login_session;*/ //echo $_SESSION["login_user"]; ?></i></p>
        <p>Корисничко име: <?php echo $login_session; ?></p>
        <p>Име: <?php echo $login_session_ime; ?></p>
        <p>Презиме: <?php echo $login_session_prezime; ?></p>
        <p>Телефон: <?php echo $login_session_telefon; ?></p>
        <p>Имејл: <?php echo $login_session_email; ?></p>
        <p>Град: <?php echo $login_session_grad; ?></p>
        <p>Поштански број: <?php echo $login_session_pb; ?></p>
        <p>Адреса: <?php echo $login_session_adresa; ?></p>
        <p><a class="btn btn-primary" href="profilistorija.php"><i class="fas fa-history"></i> претходне наруџбине</a></p>
        <p><a class="btn btn-primary" href="profilizmeni.php"><i class="fas fa-edit"></i> измени податке</a></p>
        <p><a class="btn btn-primary" href="profilpassword.php"><i class="fas fa-key"></i> измени лозинку</a></p>
    </div>
</div>

<?php
include "footer.php";
?>