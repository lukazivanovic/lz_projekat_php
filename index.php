<?php
include "header.php";
?>
    <!--velika slika na pocetnoj strani-->
    <div id="cover">
        <div id="banner">
            <img src="admin/img/logo.png" alt="Музичка продавница">
            <h1>Музичка продавница</h1>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div id="content">
                <!--informacije i promocije-->
                <div class="row equal-cols text-center">
                    <div class="col-md-6">
                        <div class="jumbotron">
                            <h2>Информације</h2>
                            <p class="text-justify">
                                Предузеће је основано 2015. године и бави се продајом музичких инструмената и пратеће опреме. У склопу свог пословања бави се и пројектовањем и опремањем свих врста локала који имају потребу за системима озвучења. Од свог оснивања до данас остварило је значајне успехе на пољу дистрибуције музичке опреме и инструмената врхунских светских произвођача. Наша фирма је успела да задобије поверење купаца високим квалитетом производа и услуга, као и професионалним односом на пољу сервисирања и одржавања опреме. Музички медија центар на 200м2 поседује малопродајни објекат који у својој понуди има 4 различита простора у којима можете изабрати све врсте инструмената.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="jumbotron">
                            <h2>Промоције</h2>
                            <p>Стигла је нова роба!</p>
                            <p>Снижене су цене албума.</p>
                            <p><a class="btn btn-danger btn-lg" href="prodavnica.php" role="button">Ка продавници &#8649;</a></p>
                            <img class="img-responsive" src="admin/img/photoStore.jpg" id="onamaSlika" alt="алати на зиду и радни сто">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--crvena traka-->
    <div class="container-fluid text-center" id="brojevi">
        <div class="row d-flex justify-content-center">
            <div class="col-6 col-sm-4 col-md-3">
                <i class="fas fa-guitar fa-3x"></i>
                <p>музички инструменти</p>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <i class="fas fa-microphone-alt fa-3x"></i>
                <p>техничка опрема</p>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <i class="fas fa-compact-disc fa-3x"></i>
                <p>албуми</p>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <i class="fas fa-headphones fa-3x"></i>
                <p>слушалице</p>
            </div>
            <div class="col-6 col-sm-4 col-md-2">
                <i class="fas fa-tshirt fa-3x"></i>
                <p>мајице</p>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>