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

    if(isset($_POST['Submit'])){
      $kor_ime = $_POST['kor_ime'];
      $lozinka = $_POST['lozinka'];
      $ime = $_POST['ime'];
      $prezime = $_POST['prezime'];
      $telefon = $_POST['telefon'];
      $email = $_POST['email'];
      $grad = $_POST['grad'];
      $post_broj = $_POST['post_broj'];
      $adresa = $_POST['adresa'];
      
      if(!isset($errorMsg)){
        $sql = "update kupac set Korisnicko_ime = '".$kor_ime."', Lozinka = '".$lozinka."', Ime = '".$ime."', Prezime = '".$prezime."', Telefon = '".$telefon."', Email = '".$email."', Grad = '".$grad."', Post_broj = '".$post_broj."', Adresa = '".$adresa."' where ID=".$id;
        $result = mysqli_query($mysqli, $sql);
        if($result){
          $successMsg = 'New record updated successfully';
          header('Location:adminkorisnik.php');
        }else{
          $errorMsg = 'Error '.mysqli_error($mysqli);
        }
      }
    }
    ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="adminkorisnik.php" role="button">Назад</a>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Корисничко име</label>
            <input type="text" class="form-control" name="kor_ime" placeholder="Корисничко име" value="<?php echo $row['Korisnicko_ime']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Лозинка</label>
            <input type="text" class="form-control" name="lozinka" placeholder="Лозинка" value="<?php echo $row['Lozinka']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Име</label>
            <input type="text" class="form-control" name="ime" placeholder="Име" value="<?php echo $row['Ime']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Презиме</label>
            <input type="text" class="form-control" name="prezime" placeholder="Презиме" value="<?php echo $row['Prezime']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Телефон</label>
            <input type="text" class="form-control" name="telefon" placeholder="Телефон" value="<?php echo $row['Telefon']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Имејл</label>
            <input type="text" class="form-control" name="email" placeholder="Имејл" value="<?php echo $row['Email']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Град</label>
            <input type="text" class="form-control" name="grad" placeholder="Град" value="<?php echo $row['Grad']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Поштански број</label>
            <input type="text" class="form-control" name="post_broj" placeholder="Поштански број" value="<?php echo $row['Post_broj']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Адреса</label>
            <input type="text" class="form-control" name="adresa" placeholder="Адреса" value="<?php echo $row['Adresa']; ?>">
          </div>
          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">измени корисника</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>