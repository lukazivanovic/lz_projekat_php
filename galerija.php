<?php
include "header.php";

$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');

function make_query($mysqli)
{
 $query = "SELECT * FROM galerija ORDER BY ID ASC";
 $result = mysqli_query($mysqli, $query);
 return $result;
}

function make_slide_indicators($mysqli)
{
$output = ''; 
$count = 0;
$result = make_query($mysqli);
while($row = mysqli_fetch_array($result))
{
  if($count == 0)
  {
  $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>';
  }
  else
  {
  $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
  }
  $count = $count + 1;
}
return $output;
}

function make_slides($mysqli)
{
$output = '';
$count = 0;
$result = make_query($mysqli);
while($row = mysqli_fetch_array($result))
{
  if($count == 0)
  {
  $output .= '<div class="carousel-item active">';
  }
  else
  {
  $output .= '<div class="carousel-item">';
  }
  $output .= '
  <img src="'.$row['Slika'].'" class="d-block w-100" alt="'.$row['Alt'].'">
  <div class="carousel-caption d-none d-md-block">
    <h5 class="text-white bg-dark">'.$row['Naslov'].'</h5>
    <p class="text-white bg-dark">'.$row['Opis'].'</p>
  </div>
  </div>
  ';
  $count = $count + 1;
}
return $output;
}
?>  

<div class="main">
  <div class="container">
    <div class="galerija">
      <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
        <?php echo make_slides($mysqli); ?>
        </div>
        <a class="carousel-control-prev" href="#dynamic_slide_show" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#dynamic_slide_show" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php
$mysqli->close();
?>

<?php
include "footer.php";
?>