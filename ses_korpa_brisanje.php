<?php 
//otvaranje sesije
session_start();
$id = $_GET['id'] ?? '';
//brisanje stavke korpe
$key=array_search($id,$_SESSION['korpa']);
unset($_SESSION['korpa'][$id]);
$_SESSION["korpa"] = array_values($_SESSION["korpa"]);
//povratak u korpu
header('Location: korpa.php');
?>