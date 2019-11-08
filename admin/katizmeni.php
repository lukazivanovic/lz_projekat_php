<?php
include "header.php";
?>

<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminkategorija.php" role="button">Назад</a>

<form>
  <div class="form-group">
    <label for="katnaziv">Назив</label>
    <input type="text" class="form-control" id="katnaziv" placeholder="назив нове категорије">
  </div>
  <div class="form-group">
    <label for="customFileLangHTML">Слика</label>
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFileLangHTML">
    <label class="custom-file-label" for="customFileLangHTML" data-browse="изабери слику">.jpg или .png</label>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">измени категорију</button>
</form>

</div>
</div>
<?php
include "footer.php";
?>