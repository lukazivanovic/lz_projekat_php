<?php
session_start();
if(session_destroy()) //unisti sesiju
{
header("Location: ../index.php"); //povratak na pocetnu stranu
}
?>