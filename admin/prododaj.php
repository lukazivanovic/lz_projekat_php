<?php
include "header.php";
?>

<div class="main">
<div class="container">

<a class="btn btn-primary" href="adminproizvod.php" role="button">Назад</a>

<form id="formaadmin">
<div class="form-group">
    <label for="selectkategorija">Категорија</label>
    <select class="custom-select" id="selectkategorija">
    <option selected></option>
    <option value="1">1 један</option>
    <option value="2">2 два</option>
    <option value="3">3 три</option>
    </select>
</div>
  <div class="form-group">
    <label for="pronaziv">Назив</label>
    <input type="text" class="form-control form-control-sm" id="pronaziv" placeholder="назив">
  </div>
  <div class="form-group">
    <label for="proopis">Опис</label>
    <textarea class="form-control form-control-sm" id="proopis" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="prokolicina">Назив</label>
    <input type="text" class="form-control form-control-sm" id="prokolicina" placeholder="количина">
  </div>
  <div class="form-group">
    <label for="procena">Назив</label>
    <input type="text" class="form-control form-control-sm" id="procena" placeholder="цена">
  </div>
  <div class="form-group">
    <label for="proslika">Слика (није неопходно)</label>
    <input type="file" class="form-control-file form-control-sm" id="proslika">
  </div>
  <button type="submit" class="btn btn-primary">додај производ</button>
</form>

</div>
</div>

<?php
include "footer.php";
?>