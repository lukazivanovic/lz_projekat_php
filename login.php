<?php
include "header.php";
?>

<div class="main">
<div class="container">

<form id="formaadmin">
    <div class="form-group">
        <label for="exampleDropdownFormEmail1">Имејл</label>
        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="form-group">
        <label for="exampleDropdownFormPassword1">Лозинка</label>
        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Улогуј се</button>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">нови корисник...</a>
    <a class="dropdown-item" href="#">заборављена лозинка?</a>
</form>

</div>

</div>
<?php
include "footer.php";
?>