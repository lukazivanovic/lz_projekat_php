<?php
include "header.php";
//provera korisnika
if (!isset( $_SESSION['login_user'] ) ) { 
    header("location: index.php");
}?>
<div class="main">
  <div class="container">
    <?php
    //otvaranje konekcije
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lz_php_projekat");
    //cuvanje sesije o korisniku
    $user_check=$_SESSION['login_user'];
    //SQL upit za trazenje korisnika
    $ses_sql=mysqli_query($connection, "select * from kupac where Korisnicko_ime='$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);
    //izmena podataka o korisniku
    if(isset($_POST['Submit'])){
      $kor_ime = $_POST['kor_ime'];
      $ime = $_POST['ime'];
      $prezime = $_POST['prezime'];
      $telefon = $_POST['telefon'];
      $email = $_POST['email'];
      $grad = $_POST['grad'];
      $post_broj = $_POST['post_broj'];
      $adresa = $_POST['adresa'];
      if(!isset($errorMsg)){
        $sql = "update kupac set Korisnicko_ime = '".$kor_ime."', Ime = '".$ime."', Prezime = '".$prezime."', Telefon = '".$telefon."', Email = '".$email."', Grad = '".$grad."', Post_broj = '".$post_broj."', Adresa = '".$adresa."' where ID=".$row['ID'];
        $result = mysqli_query($connection, $sql);
        if($result){
          $successMsg = 'New record updated successfully';
          header('Location:index.php');
        }else{
          $errorMsg = 'Error '.mysqli_error($connection);
        }
      }
    }
    ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="profil.php" role="button">Назад</a>
        <!-- forma za izmenu podataka o korisniku-->
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Корисничко име</label>
            <input type="text" class="form-control" name="kor_ime" placeholder="Корисничко име" value="<?php echo $row['Korisnicko_ime']; ?>" required>
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
            <button type="submit" name="Submit" class="btn btn-primary waves">измени податке</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>