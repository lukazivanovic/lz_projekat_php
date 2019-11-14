<?php
include "header.php";
include "login.php"; // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profil.php");
}
?>

<div id="main" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div id="login">
                <h2>Пријава</h2>
                <form action="" method="post">
                    <label>корисничко име :</label>
                    <input id="name" name="username" placeholder="корисничко име" type="text">
                    <label>Лозинка :</label>
                    <input id="password" name="password" placeholder="**********" type="password">
                    <input name="submit" type="submit" value=" ПРИЈАВИ СЕ ">
                    <span><?php echo $error; ?></span>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>