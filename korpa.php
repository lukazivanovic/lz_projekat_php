<?php
include "header.php";
?>

<?php
session_start();
?>

<div class="container" style="padding-bottom: 200px;">

<table class="table table-striped table-bordered table-hover table-sm" id="tabela">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Назив</th>
      <th scope="col">Опис</th>
      <th scope="col">Слика</th>
      <th scope="col">Цена</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $ukupnaCena = 0;
foreach($_SESSION['korpa'] as $key=>$predmetUKorpi) {
    echo "<tr>";
      echo "<td>".$predmetUKorpi[0]."</td>";
      echo "<td class='opistabela'>".$predmetUKorpi[1]."</td>";
      echo "<td><img src=".$predmetUKorpi[3]."></td>";
      echo "<td class='font-weight-bold'>".number_format($predmetUKorpi[2],2)."</td>";
      $ukupnaCena += $predmetUKorpi[2];
      echo "<td><a class='btn btn-primary' href='ses_korpa_brisanje.php?id=".$key."' role='button'>уклони из корпе</a></td>";
	echo "</tr>";
	
  }
  ?>
  </tbody>
</table>

<?php
if($ukupnaCena > 0){ ?>
  <p class='font-weight-bold'>Укупна цена: <?php echo number_format($ukupnaCena,2); ?> динара</p>
  <p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    КУПИ
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="alert alert-warning" role="alert">
    Да ли сте сигурни да купујете ове производе? 
    <button type="button" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">НЕ</button>
    <button type="button" class="btn btn-primary btn-lg">ДА</button>
  </div>
</div>
<?php } else { ?>
  <div class="alert alert-danger" role="alert">корпа је празна</div>
<?php } ?>

</div>
<?php
include "footer.php";
?>