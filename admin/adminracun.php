<?php
include "header.php";
//provera administratora
if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class=container id="prodavnica">
  <div class="row d-flex justify-content-center">
    <?php 
    //pocetak konekcije
    $mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
    mysqli_set_charset( $mysqli, 'utf8');
    $query = "SELECT * FROM racun";
    $result = $mysqli->query($query);
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      //SQL upit za izbor racuna
      $sql = "select * from racun where ID = ".$id;
      $result = mysqli_query($mysqli, $sql);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        //SQL upiti za brisanje racuna i stavki racuna
        $sql = "delete from racun where ID=".$id;
        $sql1 = "delete from stavke_racuna where Racun_id=".$id;
        if(mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $sql1)){
          header('location:adminracun.php');
        }
      }
    }
    ?>
    <a class="btn btn-primary mr-md-3" href="./" role="button">Назад</a>
    <!--tabela za prikaz svih racuna-->
    <table class="table table-striped table-bordered table-hover table-sm" id="tabela">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Купац</th>
          <th scope="col">Датум</th>
          <th scope="col">Ук. цена</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
            echo "<th scope='row'>".$row['ID']."</th>";
            echo "<td>".$row['Kupac_naziv']."</td>";
            echo "<td>".$row['Datum']."</td>";
            echo "<td>".$row['Ukupna_cena']."</td>";
            ?>
            <td>
              <a href="racvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
              <a href="adminracun.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Да ли хоћеш да избришеш овај рачун?')"><i class="fa fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <?php
    //zatvaranje konekcije
    $result->close();
    $mysqli->close();
    ?>
  </div>
</div>
<?php
include "footer.php";
?>