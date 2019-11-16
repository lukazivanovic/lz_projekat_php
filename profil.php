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

<div class="container" id="profile">
    <p id="welcome"><b>Добро дошли</b><i><br>
        <?php /*echo $login_session;*/ //echo $_SESSION["login_user"]; ?></i>
    </p>
    <i><p>Корисничко име: <?php echo $login_session; ?></p>
    <p>Име: <?php echo $login_session_ime; ?></p>
    <p>Презиме: <?php echo $login_session_prezime; ?></p>
    <p>Телефон: <?php echo $login_session_telefon; ?></p>
    <p>Имејл: <?php echo $login_session_email; ?></p>
    <p>Град: <?php echo $login_session_grad; ?></p>
    <p>Поштански број: <?php echo $login_session_pb; ?></p>
    <p>Адреса: <?php echo $login_session_adresa; ?></p>
    <p><a href="profilizmeni.php">измени податке</a></p>
    <p><a href="profilpassword.php">измени лозинку</a></p>
</div>

<?php
include "footer.php";
?>