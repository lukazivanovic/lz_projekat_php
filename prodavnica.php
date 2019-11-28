<?php
include "header.php";
?>
<div class=container-fluid id="prodavnica">
    <div class="row d-flex justify-content-center">
        <?php
        //otvaranje konekcije 
        $mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
        mysqli_set_charset( $mysqli, 'utf8');
        //SQL upit za trazenje kategorije
        $query = "SELECT * FROM kategorija";
        $result = $mysqli->query($query);
        //prikaz svih kategorija
        while($row = mysqli_fetch_array($result)) {?>
            <a class="text-decoration-none" href="kategorija.php?id=<?php echo $row['ID']; ?>">
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 text-center">
                    <div class="card">
                        <img src="admin/img/kategorije/<?php echo $row['Slika']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?php echo $row['Naziv']; ?></p>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
        //zatvaranje konekcije
        $result->close();
        $mysqli->close();
        ?>
    </div>
</div>  
<?php
include "footer.php";
?>