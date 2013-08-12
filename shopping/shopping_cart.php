<?php
include '../include/header.php';
?>

<h1>Shopping cart</h1>
<p><a href="cart_clear.php">Clear all items</a>
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


	foreach ($_SESSION['cart'] as $id) 
	{
		echo "<tr>";
		$result =  $db->get_oil($id['id']);

		echo "<td>" . "\$" . $result['price'] . "</td>";
		echo "<td>" . $result['name'] . "</td>";
		echo "<td>" . $id['count'] . "</td>";

		echo "</tr>";
	}

	echo "</table>";
}
else {
	echo "<h2>No items, visit the <a href='../index.php'>shop</a> to add some!</h2>";
}

session_write_close();
?>


<?php

include '../include/footer.php';
?>
