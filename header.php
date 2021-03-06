<?php 
session_start();//pocetak sesije
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="admin/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="admin/img/favicon.ico" type="image/x-icon">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/9333006fb1.js" crossorigin="anonymous"></script>
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!--css fajl-->
    <link rel="stylesheet" href="css/style.css">
    <title>Музичка продавница</title>
  </head>
  <body>
    <!--glavna navigacija-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="admin/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Музичка продавница
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="galerija.php"><i class="fas fa-images"></i> Галерија</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prodavnica.php"><i class="fas fa-store"></i> Продавница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pretraga.php"><i class="fas fa-search"></i> Претрага</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php"><i class="far fa-id-card"></i> Контакт</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if(isset($_SESSION["login_user"])){ ?>
                    <li class="nav-item">
                        <a class="nav-link text-primary font-weight-bold" href="korpa.php"><i class="fas fa-shopping-cart"></i> Корпа</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success font-weight-bold" href="profil.php"><i class="fas fa-user-circle"></i>
                            <?php echo $_SESSION["login_user"]; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger font-weight-bold" href="logout.php"><i class="fas fa-sign-out-alt"></i> ОДЈАВА</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link text-warning font-weight-bold" href="loginforma.php"><i class="fas fa-sign-in-alt"></i> ПРИЈАВА</a>
                    </li> 
                <?php } ?>
            </ul>
        </div>
    </nav>
    <!--pozadinska slika teksture-->
    <img src="admin/img/tekstura-001-copy.jpg" class="bg">