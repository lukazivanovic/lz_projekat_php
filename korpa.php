<?php
include "header.php";
?>

<?php 
session_start();
$mysqli = new mysqli("localhost", "root", "", "lz_php_projekat");
mysqli_set_charset( $mysqli, 'utf8');
$query = "SELECT * FROM kategorija";
$result = $mysqli->query($query);
?>

<?php 
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>

<?php
$total = '';
$i=1;
 foreach ($cartitems as $key=>$id) {
	$sql = "SELECT * FROM products WHERE id = $id";
	$res=mysqli_query($mysqli, $query);
	$r = mysqli_fetch_assoc($result);
?>	  	
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> <?php echo $r['Naziv']; ?></td>
		<td>$<?php echo $r['Cena']; ?></td>
	</tr>
<?php 
	$total = $total + $r['price'];
	$i++; 
	} 
?>

<tr>
	<td><strong>Total Price</strong></td>
	<td><strong>$<?php echo $total; ?></strong></td>
	<td><a href="#" class="btn btn-info">Checkout</a></td>
</tr>

<?php
include "footer.php";
?>