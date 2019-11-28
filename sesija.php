<?php
//otvaranje konekcije
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lz_php_projekat");
session_start();//pocetak sesije
//cuvanje sesije
$user_check=$_SESSION['login_user'];
//SQL upit
$ses_sql=mysqli_query("select * from kupac where Korisnicko_ime='$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['Korisnicko_ime'];
if(!isset($login_session)){
    mysqli_close($connection); //zatvaranje konekcije
    header('Location: index.php'); //povratak na pocetnu stranu
}
?>