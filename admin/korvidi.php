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

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "select * from kupac where ID=".$id;
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
    <a class="btn btn-primary" href="adminkorisnik.php" role="button">Назад</a>
    <p>Корисничко име: <?php echo $row['Korisnicko_ime'] ?></p>
    <p>Име: <?php echo $row['Ime'] ?></p>
    <p>Презиме: <?php echo $row['Prezime'] ?></p>
    <p>Телефон: <?php echo $row['Telefon'] ?></p>
    <p>Имејл: <?php echo $row['Email'] ?></p>
    <p>Град: <?php echo $row['Grad'] ?></p>
    <p>Поштански број: <?php echo $row['Post_broj'] ?></p>
    <p>Адреса: <?php echo $row['Adresa'] ?></p>
  </div>
</div>

</div>
</div>
<?php
include "footer.php";
?>