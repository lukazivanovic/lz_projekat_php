<?php
include "header.php";
//provera korisnika
if (!isset( $_SESSION['login_user'] ) ) { 
    header("location: loginforma.php");
}?>
<div class="main">
  <div class="container">
    <?php
    //otvaranje konekcije
    $mysqli = mysqli_connect("localhost", "root", "", "lz_php_projekat");
    mysqli_set_charset( $mysqli, 'utf8');
    ?>
    <a class="btn btn-primary" href="profilistorija.php" role="button">Назад</a>
    <!--tabela za prikaz stavki pojedinacnog racuna korisnika-->
    <table class="table table-striped table-bordered table-hover table-sm" id="tabela">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Рач. ИД</th>
          <th scope="col">Про. ИД</th>
          <th scope="col">Производ назив</th>
          <th scope="col">Про. цена</th>
          <th scope="col">Кол.</th>
          <th scope="col">Ук. цена</th>
        </tr>
      </thead>
      <tbody>
         <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from stavke_racuna where Racun_id=".$id;
            $result = mysqli_query($mysqli, $sql);
            $ukcena = 0;
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['ID']."</td>";
                echo "<td>".$row['Racun_id']."</td>";
                echo "<td>".$row['Proizvod_id']."</td>";
                echo "<td>".$row['Proizvod_naziv']."</td>";
                echo "<td>".number_format($row['Proizvod_cena'],2)."</td>";
                echo "<td>".$row['Kolicina']."</td>";
                echo "<td>".number_format($row['Ukupna_cena'],2)."</td>";
                echo "</tr>";
                $ukcena += $row['Ukupna_cena'];
              }
            }
          }
        ?>
      </tbody>
      <?php 
      echo "<tr>";
      echo "<td colspan='7'><div class='float-right'>Укупна цена: ".number_format($ukcena,2)." динара</div></td>"; 
      echo "</tr>";
      ?>
    </table>
  </div>
</div>
<?php
include "footer.php";
?>