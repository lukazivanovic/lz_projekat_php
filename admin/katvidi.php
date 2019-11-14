<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>

<?php
$mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');

$upload_dir = 'img/kategorije/';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from kategorija where ID=".$id;
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }else {
    $errorMsg = 'Could not Find Any Record';
  }
}
?>


<div class="row justify-content-center">
    <p><?php echo $row['Naziv'] ?></p>
    <img src="<?php echo $upload_dir.$row['Slika'] ?>" height="200">
</div>

</div>
</div>
<?php
include "footer.php";
?>