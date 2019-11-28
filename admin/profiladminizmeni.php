<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: index.php");
}?>
<div class="main">
  <div class="container">
    <?php
    //otvaranje konekcije
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lz_php_projekat");
    //cuvanje sesile
    $user_check=$_SESSION['login_admin'];
    //SQL upit za izbor administratora
    $ses_sql=mysqli_query($connection, "select * from administrator where Korisnicko_ime='$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);
    if(isset($_POST['Submit'])){
      $kor_ime = $_POST['kor_ime'];
      $email = $_POST['email'];
      if(!isset($errorMsg)){
        //SQL upit za izmenu podataka o administratoru
        $sql = "update administrator set Korisnicko_ime = '".$kor_ime."', Email = '".$email."' where ID=".$row['ID'];
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
        <a class="btn btn-primary" href="profiladmin.php" role="button">Назад</a>
        <!--forma za izmenu podataka o administratoru-->
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Корисничко име</label>
            <input type="text" class="form-control" name="kor_ime" placeholder="Корисничко име" value="<?php echo $row['Korisnicko_ime']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">Имејл</label>
            <input type="text" class="form-control" name="email" placeholder="Имејл" value="<?php echo $row['Email']; ?>" required>
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