<?php
include "header.php";
include "loginadmin.php"; // Includes Login Script

if(isset($_SESSION['login_admin'])){
header("location: index.php");
}
?>

<div id="main" class="container">
    <div id="login">
        <h2>ПРИЈАВА админ</h2>
        <form action="" method="post">
            <label>корисничко име :</label>
            <input id="name" name="username" placeholder="корисничко име" type="text">
            <label>лозинка :</label>
            <input id="password" name="password" placeholder="*****" type="password">
            <input name="submit" type="submit" value=" ПРИЈАВИ СЕ ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>