<?php
$error='';
//provera ispravnosti forme
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    else
    {
        //definisanje korisnickog imena i lozinke
        $username=$_POST['username'];
        $password=$_POST['password'];
        //otvaranje konekcije
        $connection = mysqli_connect("localhost", "root", "");
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        mysqli_select_db($connection, "lz_php_projekat");
        //SQL upit za izbor administratora
        $query = mysqli_query($connection, "select * from administrator where Lozinka='$password' AND Korisnicko_ime='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_admin']=$username; //otvaranje sesije
            header("location: index.php"); //povratak na pocetnu stranu
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($connection); //zatvaranje konekcije
    }
}
?>