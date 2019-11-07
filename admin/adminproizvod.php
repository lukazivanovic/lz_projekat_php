<?php
include "header.php";
?>

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM proizvod";
$result = $mysqli->query($query);

?>

<div class=container id="prodavnica">

<div class="row d-flex justify-content-center">

<a class="btn btn-primary" href="./" role="button">Назад</a>

<table class="table table-striped table-bordered table-hover table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col">Категорија</th>
      <th scope="col">Назив</th>
      <th scope="col">Опис</th>
      <th scope="col">Количина</th>
      <th scope="col">Цена</th>
      <th scope="col">Слика</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
      echo "<th scope='row'>".$row['ID']."</th>";
      echo "<td><button type='button' class='btn btn-primary'>Измени...</button></td>";
      echo "<td>".$row['Kategorija']."</td>";
      echo "<td>".$row['Naziv']."</td>";
      echo "<td class='opistabela'>".$row['Opis']."</td>";
      echo "<td>".$row['Kolicina']."</td>";
      echo "<td>".$row['Cena']."</td>";
      echo "<td><img src=../".$row['Slika'].">".$row['Slika']."</td>";
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