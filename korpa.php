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
      echo "<td><img src=".$predmetUKorpi[3]."></td>";
      echo "<td><a class='btn btn-primary' href='ses_korpa_brisanje.php?id=".$key."' role='button'>ukloni iz korpe</a></td>";
	echo "</tr>";
	$ukupnaCena += $predmetUKorpi[2];
  }
  ?>
  </tbody>
</table>

<p>UKUPNA CENA: <?php echo number_format($ukupnaCena,2); ?> dinara</p>
<button type="button" class="btn btn-primary">KUPI</button>

</div>
<?php
include "footer.php";
?>