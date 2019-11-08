<?php
include "header.php";
?>

<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>

<form id="formaadmin">
  <div class="form-group">
    <label for="katnaziv">Назив</label>
    <input type="text" class="form-control form-control-sm" id="katnaziv" placeholder="назив нове категорије">
  </div>
  <div class="form-group">
    <label for="katslika">Слика (није неопходно)</label>
    <input type="file" class="form-control-file form-control-sm" id="katslika">
  </div>
  <button type="submit" class="btn btn-primary">додај категорију</button>
</form>

</div>
</div>

<?php
include "footer.php";
?>