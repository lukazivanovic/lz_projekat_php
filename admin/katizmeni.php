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

    if(isset($_POST['Submit'])){
      $name = $_POST['name'];
      $imgName = $_FILES['image']['name'];
      $imgTmp = $_FILES['image']['tmp_name'];
      $imgSize = $_FILES['image']['size'];

      if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
        $pic = time().'_'.rand(1000,9999).'.'.$imgExt;

        if(in_array($imgExt, $allowExt)){
          if($imgSize < 5000000){
            unlink($upload_dir.$row['Slika']);
            move_uploaded_file($imgTmp ,$upload_dir.$pic);
          }else{
            $errorMsg = 'Image too large';
          }
        }else{
          $errorMsg = 'Please select a valid image';
        }
      }else{
        $pic = $row['Slika'];
      }

      if(!isset($errorMsg)){
        $sql = "update kategorija set Naziv = '".$name."', Slika = '".$pic."' where ID=".$id;
        $result = mysqli_query($mysqli, $sql);
        if($result){
          $successMsg = 'New record updated successfully';
          header('Location:adminkategorija.php');
        }else{
          $errorMsg = 'Error '.mysqli_error($mysqli);
        }
      }
    }
    ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">назив</label>
            <input type="text" class="form-control" name="name" placeholder="назив" value="<?php echo $row['Naziv']; ?>" required>
          </div>
          <div class="form-group">
            <label for="image">изабери слику</label>
            <div>
              <img src="<?php echo $upload_dir.$row['Slika'] ?>" width="100">
              <input type="file" class="form-control" name="image" value="" required>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">измени категорију</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>