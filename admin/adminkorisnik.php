<?php
include "header.php";
?>

<div class=container id="prodavnica">

<div class="row d-flex justify-content-center">

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM kupac";
$result = $mysqli->query($query);
?>

<a class="btn btn-primary" href="./" role="button">Назад</a>
<a class="btn btn-primary" href="kordodaj.php" role="button">Додај...</a>

<table class="table table-striped table-bordered table-hover table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col">Кор. име</th>
      <th scope="col">Име</th>
      <th scope="col">Презиме</th>
      <th scope="col">Телефон</th>
      <th scope="col">Имејл</th>
      <th scope="col">Град</th>
      <th scope="col">ПБ</th>
      <th scope="col">Адреса</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
      echo "<th scope='row'>".$row['ID']."</th>";
      echo "<td><a href='korizmeni.php?id=".$row['ID']."'><button type='button' class='btn btn-primary'>Измени...</button></a></td>";
      echo "<td>".$row['Korisnicko_ime']."</td>";
      echo "<td>".$row['Ime']."</td>";
      echo "<td>".$row['Prezime']."</td>";
      echo "<td>".$row['Telefon']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "<td>".$row['Grad']."</td>";
      echo "<td>".$row['Post_broj']."</td>";
      echo "<td>".$row['Adresa']."</td>";
      echo "<td><button type='button' class='btn btn-primary'>Избриши</button></td>";
    echo "</tr>";
  }
  ?>
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