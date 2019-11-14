<?php
include "header.php";
//include "sesija.php";
?>

<div id="profile">
    <b id="welcome">Dobro dosli : <i><?php /*echo $login_session;*/ echo $_SESSION["login_user"]; ?></i></b>
    <b id="logout"><a href="logout.php">Izloguj se</a></b>
</div>

<?php
include "footer.php";
?>