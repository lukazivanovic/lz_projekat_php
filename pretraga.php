<?php
include "header.php";
//otvaranje konekcije
$mysqli = mysqli_connect("localhost", "root", "");
mysqli_set_charset( $mysqli, 'utf8');
mysqli_select_db($mysqli, "lz_php_projekat");
?>
<!--forma za pretragu proizvoda-->
<div class="container-fluid" id="prodavnica">
    <div class="d-flex justify-content-center">
        <form class="form-inline my-2 my-lg-0" action="" method="POST" enctype="multipart/form-data">   
            <input class="form-control mr-sm-2" type="search" placeholder="Претражи" aria-label="Search" name="name" required>
            <input class="btn btn-primary my-2" type="submit" name="submit" value="ПРЕТРАЖИ">
        </form>
    </div>
    <!--prikaz nadjenih proizvoda-->
    <div class="row d-flex justify-content-center">
        <?php  
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            if(empty($name)){
                $make = '<h4>Напиши речи из назива или описа поизвода</h4>';
            }else{
                //poruka u slucaju da nije pronadjen proizvod
                $make = '<h4>Није пронађен ниједан производ! Покушај поново..</h4>';
                //SQL upit za trazenje proizvoda
                $selekt = "SELECT * FROM proizvod WHERE Naziv LIKE '%$name%' OR Opis LIKE '%$name%'";
                $result = mysqli_query($mysqli, $selekt);
                if(mysqli_num_rows($result)){
                    echo "<div class='col-12 text-center'>тражени појам: ".$name. "</div>";
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <a class="text-decoration-none" href="proizvod.php?id=<?php echo $row['ID']; ?>">
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 text-center">
                            <div class="card">
                                <img src="admin/img/proizvodi/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['Naziv']; ?></p>
                                    <?php if($row['Kolicina']<=0){ ?>
                                    <p class="nijedostupno">НИЈЕ ДОСТУПНО</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    <?php
                    }
                }else{
                    echo $make;
                }
                $result->close(); 
                $mysqli->close();
            }
        }
        ?>
    </div>
</div>
<?php
include "footer.php";
?>