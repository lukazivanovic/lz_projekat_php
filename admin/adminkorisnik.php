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
$query = "SELECT * FROM kupac";
$result = $mysqli->query($query);
 
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql = "select * from kupac where ID = ".$id;
  $result = mysqli_query($mysqli, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    unlink($upload_dir.$image);
    $sql = "delete from kupac where ID=".$id;
    if(mysqli_query($mysqli, $sql)){
      header('location:adminkorisnik.php');
    }
  }
}
?>

<a class="btn btn-primary" href="./" role="button">Назад</a>
<a class="btn btn-primary" href="kordodaj.php" role="button">Додај...</a>

<table class="table table-striped table-bordered table-hover table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
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
      echo "<td>".$row['Korisnicko_ime']."</td>";
      echo "<td>".$row['Ime']."</td>";
      echo "<td>".$row['Prezime']."</td>";
      echo "<td>".$row['Telefon']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "<td>".$row['Grad']."</td>";
      echo "<td>".$row['Post_broj']."</td>";
      echo "<td>".$row['Adresa']."</td>"; ?>
      <td><a href="korvidi.php?id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
      <a href="korizmeni.php?id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
      <a href="adminkorisnik.php?delete=<?php echo $row['ID'] ?>" class="btn btn-danger" onclick="return confirm('Да ли хоћеш да избришеш овог корисника?')"><i class="fa fa-trash-alt"></i></a></td>
    <?php echo "</tr>";
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