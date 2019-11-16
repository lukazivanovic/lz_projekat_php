<?php
include "header.php";
?>

<div class="container">
  <div class="row">
    <!--kontakt podaci-->
    <div class="col-md-6">
      <h2 class="page-header">Где се налазимо</h2>
      <address>
        <i class="fas fa-map-marked fa-2x" aria-hidden="true"></i> Горанска 353<br><br>
        <i class="fas fa-phone fa-2x" aria-hidden="true"></i> +381 (0)26 123 45 67<br><br>
        <i class="fas fa-envelope fa-2x" aria-hidden="true"></i> info@mp.rs<br><br>
        <i class="fas fa-clock fa-2x" aria-hidden="true"></i> Радним данима: 08-17ч, суботом: 08-14ч<br><br>
      </address>
      <!--mapa-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2837.8928501894993!2d20.89624331504244!3d44.66054079472712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDM5JzM3LjkiTiAyMMKwNTMnNTQuNCJF!5e0!3m2!1ssr!2srs!4v1551822488162"
        allowfullscreen></iframe>
    </div>
    <!--forma za slanje poruke-->
    <div class="col-md-6">
      <h2 class="page-header">Контакт форма</h2>
      <form name="forma" id="forma">
        <div class="form-group">
          <label for="firstname">Име и презиме:</label>
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="твоје име и презиме...">
          <p id="rezIme"></p>
        </div>
        <div class="form-group">
          <label for="address">Имејл:</label>
          <input type="text" class="form-control" id="email" placeholder="твој имејл...">
          <p id="rezEmail"></p>
        </div>
        <div class="form-group">
          <label for="address">Веб адреса:</label>
          <input type="text" class="form-control" id="address" placeholder="твоја веб адреса...">
          <p id="rezAdresa"></p>
        </div>
        <div class="form-group">
          <label for="telephone1">Телефон:</label>
          <input type="text" class="form-control" id="telephone1" placeholder="0xx/xxx-xxxx">
          <p id="rezTelefon1"></p>
        </div>
        <div class="form-group">
          <label for="inputTekst">Порука:</label>
          <textarea rows="12" class="form-control" id="inputTekst"></textarea>
          <p id="rezPoruka"></p>
        </div>
        <button type="submit" class="btn btn-danger btn-block" onclick="proveri()">Пошаљи</button>
      </form>
    </div>
  </div>
</div>

<script src="js/kontakt.js"></script>
<?php
include "footer.php";
?>