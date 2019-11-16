<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class=container id="prodavnica">
  <div class="row d-flex justify-content-center">
    <?php 
    $mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
    mysqli_set_charset( $mysqli, 'utf8');
    $query = "SELECT * FROM kategorija";
    $result = $mysqli->query($query);

    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "select * from kategorija where ID = ".$id;
      $result = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        unlink($upload_dir.$image);
        $sql = "delete from kategorija where ID=".$id;
        if(mysqli_query($mysqli, $sql)){
          header('location:adminkategorija.php');
        }
      }
    }
    ?>
    <a class="btn btn-primary mr-md-3" href="./" role="button">Назад</a>
    <a class="btn btn-primary" href="katdodaj.php" role="button">Додај...</a>
    <table class="table table-striped table-bordered table-hover table-sm" id="tabela">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Назив</th>
          <th scope="col">Слика</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
            echo "<th scope='row'>".$row['ID']."</th>";
            echo "<td>".$row['Naziv']."</td>";
            echo "<td><img src='img/kategorije/".$row['Slika']."'></td>";
            ?>
            <td>
              <a href="katvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
              <a href="katizmeni.php?id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
              <a href="adminkategorija.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Да ли хоћеш да избришеш ову категорију?')"><i class="fa fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php
    $result->close();
    $mysqli->close();
    ?>
  </div>
</div>

<?php
include "footer.php";
?>