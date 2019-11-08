<?php
include "header.php";
?>

<div class=container id="prodavnica">

<div class="row d-flex justify-content-center">

<?php 
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM kategorija";
$result = $mysqli->query($query);
?>

<a class="btn btn-primary" href="./" role="button">Назад</a>
<a class="btn btn-primary" href="katdodaj.php" role="button">Dodaj...</a>

<table class="table table-striped table-bordered table-hover table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
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
      echo "<td><a href='katizmeni.php?id=".$row['ID']."'><button type='button' class='btn btn-primary'>Измени...</button></a></td>";
      echo "<td>".$row['Naziv']."</td>";
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