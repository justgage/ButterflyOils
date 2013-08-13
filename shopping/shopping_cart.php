<?php

$site_title = "shopping cart";
include '../include/header.php';
?>

<h1>Shopping cart</h1>
<ul>

	<p><a href="cart_clear.php">Clear all items</a>
<p><a href="cart_clear.php">Clear all items</a>
</ul>
</p>

<?php

session_start();

if (isset($_SESSION['cart'])) {

	echo "<table id='oil-list'>";

	echo "
	<tr>
		<th>price</th>
		<th>name</th>
		<th>amount</th>
	</tr>
	";

   $total = 0;

	foreach ($_SESSION['cart'] as $id) 
	{
		echo "<tr>";
		$result =  $db->get_oil($id['id']);

      $total += $result['price'];

		echo "<td>" . "\$" . $result['price'] . "</td>";
		echo "<td><a href='" . SITEURL . "/single.php?id={$result['id']}'>" . $result['name'] . "</a></td>";
		echo "<td>" . $id['count'] . "</td>";

		echo "</tr>";

	}

	echo "</table>";
   echo  "<h3>Total \$$total</h3>";
}
else {
	echo "<h2>No items, visit the <a href='../index.php'>shop</a> to add some!</h2>";
}

session_write_close();
?>


<?php

include '../include/footer.php';
?>
