<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: index.php");
}?>

<div class="main">
  <div class="container">
    <?php

$connection = mysqli_connect("localhost", "root", "");
// Selecting Database
$db = mysqli_select_db($connection, "lz_php_projekat");
//session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_admin'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select * from administrator where Korisnicko_ime='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);

    if(isset($_POST['Submit'])){
      $kor_ime = $_POST['kor_ime'];
      $email = $_POST['email'];
      
      if(!isset($errorMsg)){
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
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Корисничко име</label>
            <input type="text" class="form-control" name="kor_ime" placeholder="Корисничко име" value="<?php echo $row['Korisnicko_ime']; ?>">
          </div>
          <div class="form-group">
            <label for="name">Имејл</label>
            <input type="text" class="form-control" name="email" placeholder="Имејл" value="<?php echo $row['Email']; ?>">
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