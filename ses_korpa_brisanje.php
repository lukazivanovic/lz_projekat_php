<?php 
session_start();
$id = $_GET['id'] ?? '';

$key=array_search($id,$_SESSION['korpa']);
unset($_SESSION['korpa'][$id]);
$_SESSION["korpa"] = array_values($_SESSION["korpa"]);

header('Location: korpa.php');

?>