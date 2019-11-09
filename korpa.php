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
      <th scope="col">Цена</th>
      <th scope="col">Слика</th>
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
      echo "<td>".number_format($predmetUKorpi[2],2)."</td>";
      $ukupnaCena += $predmetUKorpi[2];
      echo "<td><img src=".$predmetUKorpi[3]."></td>";
      echo "<td><a class='btn btn-primary' href='ses_korpa_brisanje.php?id=".$key."' role='button'>уклони из корпе</a></td>";
	echo "</tr>";
	
  }
  ?>
  </tbody>
</table>

<?php
if($ukupnaCena > 0){ ?>
<p>Укупна цена: <?php echo number_format($ukupnaCena,2); ?> динара</p>
<button type="button" class="btn btn-primary">КУПИ</button>
<?php } else {
  echo "Корпа је празна";
} ?>

</div>
<?php
include "footer.php";
?>