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
    ?>
    
    <a class="btn btn-primary" href="adminracun.php" role="button">Назад</a>

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
            if (mysqli_num_rows($result) > 0) {
                $sr = mysqli_fetch_assoc($result);
            }else {
                $errorMsg = 'Could not Find Any Record';
            }

            while($sr = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$sr['ID']."</td>";
            echo "<td>".$sr['Racun_id']."</td>";
            echo "<td>".$sr['Proizvod_id']."</td>";
            echo "<td>".$sr['Proizvod_naziv']."</td>";
            echo "<td>".number_format($sr['Prozivod_cena'],2)."</td>";
            echo "<td>".$sr['Kolicina']."</td>";
            echo "<td>".number_format($sr['Ukupna_cena'],2)."</td>";
            echo "</tr>";
            }
        }
        ?>
      </tbody>
    </table>

  </div>
</div>

<?php
include "footer.php";
?>