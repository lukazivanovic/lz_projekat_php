<?php
include "header.php";

if (!isset( $_SESSION['login_admin'] ) ) { 
    header("location: loginformaadmin.php");
}?>
<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminkorisnik.php" role="button">Назад</a>

<form id="formaadmin">
  <div class="form-group">
    <label for="korkorime">Kor. ime</label>
    <input type="text" class="form-control form-control-sm" id="korkorime" placeholder="korisnicko ime">
  </div>
  <div class="form-group">
    <label for="korlozinka">Lozinka</label>
    <input type="text" class="form-control form-control-sm" id="korlozinka" placeholder="lozinka">
  </div>
  <div class="form-group">
    <label for="korime">Ime</label>
    <input type="text" class="form-control form-control-sm" id="korime" placeholder="ime">
  </div>
  <div class="form-group">
    <label for="korprezime">Prezime</label>
    <input type="text" class="form-control form-control-sm" id="korprezime" placeholder="prezime">
  </div>
  <div class="form-group">
    <label for="kortelefon">Telefon</label>
    <input type="text" class="form-control form-control-sm" id="kortelefon" placeholder="telefon">
  </div>
  <div class="form-group">
    <label for="koremail">Email</label>
    <input type="text" class="form-control form-control-sm" id="koremail" placeholder="email">
  </div>
  <div class="form-group">
    <label for="korgrad">Grad</label>
    <input type="text" class="form-control form-control-sm" id="korgrad" placeholder="grad">
  </div>
  <div class="form-group">
    <label for="korpb">Post.br.</label>
    <input type="text" class="form-control form-control-sm" id="korob" placeholder="postanski broj">
  </div>
  <div class="form-group">
    <label for="koradresa">Adresa</label>
    <input type="text" class="form-control form-control-sm" id="koradresa" placeholder="adresa">
  </div>
  <button type="submit" class="btn btn-primary">додај korisnika</button>
</form>

</div>
</div>

<?php
include "footer.php";
?>