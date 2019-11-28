<?php
session_start();
if(session_destroy()) //unistavanje sesije
{
    header("Location: index.php"); //povratak na pocetnu stranu
}
?>