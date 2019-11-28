<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
  <div class="container">
    <?php
    //pocetak konekcije
    $mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
    mysqli_set_charset( $mysqli, 'utf8');
    $upload_dir = 'img/carousel/';
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      //SQL upit za izbor galerije
      $sql = "select * from galerija where ID=".$id;
      $result = mysqli_query($mysqli, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
      }else {
        $errorMsg = 'Could not Find Any Record';
      }
    }
    if(isset($_POST['Submit'])){
      $name = $_POST['name'];
      $opis = $_POST['opis'];
      $alt = $_POST['alt'];
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
        //SQL upit za izmenu slike
        $sql = "update galerija set Naslov = '".$name."', Opis = '".$opis."', Slika = '".$pic."', Alt = '".$alt."' where ID=".$id;
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
    <!--forma za izmenu slike u galeriji-->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a class="btn btn-primary" href="admingalerija.php" role="button">Назад</a>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">наслов</label>
            <input type="text" class="form-control" name="name" placeholder="наслов" value="<?php echo $row['Naslov']; ?>" required>
          </div>
          <div class="form-group">
            <label for="name">опис</label>
            <input type="text" class="form-control" name="opis" placeholder="опис" value="<?php echo $row['Opis']; ?>">
          </div>
          <div class="form-group">
            <label for="image">изабери слику</label>
            <div>
              <img src="<?php echo $upload_dir.$row['Slika'] ?>" width="100">
              <input type="file" class="form-control" name="image" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="name">Alt</label>
            <input type="text" class="form-control" name="name" placeholder="Alt" value="<?php echo $row['Alt']; ?>">
          </div>
          <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary waves">измени слику</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>