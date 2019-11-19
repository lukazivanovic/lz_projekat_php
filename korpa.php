<?php
include "header.php";
?>

<div class="container" style="padding-bottom: 200px;">
  <table class="table table-striped table-bordered table-hover table-sm" id="tabela">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Назив</th>
        <th scope="col">Опис</th>
        <th scope="col">Слика</th>
        <th scope="col">Цена</th>
        <th scope="col">Кол.</th>
        <th scope="col">Ук. цена</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $ukupnaCena = 0;
      if(isset($_SESSION['korpa'])){
        foreach($_SESSION['korpa'] as $key=>$predmetUKorpi) {
          echo "<tr>";
          echo "<td>".$predmetUKorpi[1]."</td>";
          echo "<td class='opistabela'>".$predmetUKorpi[2]."</td>";
          echo "<td><img src='admin/img/proizvodi/".$predmetUKorpi[6]."'></td>";
          echo "<td class='font-weight-bold'>".number_format($predmetUKorpi[3],2)."</td>";
          echo "<td class='font-weight-bold'>".$predmetUKorpi[4]."</td>";
          echo "<td class='font-weight-bold'>".number_format($predmetUKorpi[5],2)."</td>";
          echo "<td><a class='btn btn-primary' href='ses_korpa_brisanje.php?id=".$key."' role='button'>уклони из корпе</a></td>";
          $ukupnaCena += $predmetUKorpi[5];
          echo "</tr>";
        }
  
        if(isset($_POST['buttonRacun'])) {
          foreach($_SESSION['korpa'] as $key=>$predmetUKorpi) {
            $conn = mysqli_connect("localhost", "root", "", "lz_php_projekat");
            mysqli_set_charset($conn, 'utf8');
            $sql = "insert into racun(Kupac_naziv, Datum, Ukupna_cena) values('".$_SESSION['login_user']."', '".date("Y-m-d")."', '".$ukupnaCena."')";
            $result = mysqli_query($conn, $sql);
            $racun_id =  $conn->insert_id;
          }

          foreach($_SESSION['korpa'] as $key=>$predmetUKorpi) {
            $conn1 = mysqli_connect("localhost", "root", "", "lz_php_projekat");
            mysqli_set_charset($conn1, 'utf8');
            $sql1 = "insert into stavke_racuna(Racun_id, Proizvod_id, Proizvod_naziv, Prozivod_cena, Kolicina, Ukupna_cena) values('".$racun_id."', '".$predmetUKorpi[0]."', '".$predmetUKorpi[1]."', '".$predmetUKorpi[3]."', '".$predmetUKorpi[4]."', '".$predmetUKorpi[5]."')";
            $result = mysqli_query($conn1, $sql1);
          }        
          unset($_SESSION['korpa']);
          //header("Refresh:0");
        }
      }
      ?>
    </tbody>
  </table>

  <?php
  if($ukupnaCena > 0){ ?>
    <p class='font-weight-bold'>Укупна цена: <?php echo number_format($ukupnaCena,2); ?> динара</p>
    <p>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">КУПИ</button>
    </p>
  <div class="collapse" id="collapseExample">
    <div class="alert alert-warning" role="alert">
      <form id="formaKorpa" action="" method="post">
        <div class="form-group">
          <label>Да ли сте сигурни да купујете ове производе?</label>
          <button type="button" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">НЕ</button>
          <button type="submit" name="buttonRacun" class="btn btn-primary btn-lg">ДА</button>
        </div>
      <form>
    </div>
  </div>
  <?php } else { ?>
    <div class="alert alert-danger" role="alert">корпа је празна</div>
  <?php } ?>
</div>

<?php
include "footer.php";
?>