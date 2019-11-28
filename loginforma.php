<?php
include "header.php";
include "login.php";
//provera korisnika
if(isset($_SESSION['login_user'])){
header("location: profil.php");
}
?>
<div id="main" class="container">
    <!--forma za prijavu korisnika-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div id="login">
                <h2>Пријава</h2>
                <form action="" method="post">
                    <label>корисничко име :</label>
                    <input id="name" name="username" placeholder="корисничко име" type="text" required>
                    <label>Лозинка :</label>
                    <input id="password" name="password" placeholder="**********" type="password" required>
                    <input name="submit" type="submit" value=" ПРИЈАВИ СЕ ">
                    <span><?php echo $error; ?></span><br><br>
                    <a href="registerforma.php">регистрација новог корисника</a><br><br>
                    <a href="password.php">заборављена лозинка</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>