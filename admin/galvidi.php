<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
<div class="container">

<?php
$mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');

$upload_dir = 'img/carousel/';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from galerija where ID=".$id;
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }else {
    $errorMsg = 'Could not Find Any Record';
  }
}
?>


<div class="row justify-content-center">
  <div class="col-md-6">
    <a class="btn btn-primary" href="admingalerija.php" role="button">Назад</a>
    <p><?php echo $row['Naslov']; ?></p>
    <p><?php echo $row['Opis']; ?></p>
    <img src="<?php echo $upload_dir.$row['Slika']; ?>" height="200">
    <p><?php echo $row['Slika']; ?></p>
    <p><?php echo $row['Alt']; ?></p>
  </div>
</div>

</div>
</div>
<?php
include "footer.php";
?>