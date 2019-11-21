<?php
include "header.php";

if (!isset( $_SESSION['login_user'] ) ) { 
    header("location: loginforma.php");
}?>
<div class=container id="prodavnica">
  <div class="row d-flex justify-content-center">
    <?php 
    $mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
    mysqli_set_charset( $mysqli, 'utf8');
    $query = "SELECT * FROM racun WHERE Kupac_naziv = '".$_SESSION["login_user"]."'";
    $result = $mysqli->query($query);
    ?>
    <a class="btn btn-primary mr-md-3" href="profil.php" role="button">Назад</a>
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
              <a href="profilracvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
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