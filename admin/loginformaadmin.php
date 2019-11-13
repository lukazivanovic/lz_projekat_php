<?php
include "header.php";
include "loginadmin.php"; // Includes Login Script

if(isset($_SESSION['login_admin'])){
header("location: index.php");
}
?>

<div id="main" class="container">
    <h1>PHP Login Session Example</h1>
    <div id="login">
        <h2>Login Form</h2>
        <form action="" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>