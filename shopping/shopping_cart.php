<?php

$site_title = "shopping cart";
include '../include/header.php';

session_start();
//this will UPDATE the cart's quantity
if ($_POST) {

	//combine them in the same array
	$cart_items = array_combine($_POST['id'],$_POST['count']);

	// update items
	foreach($cart_items as $id => $count) {
		$_SESSION['cart'][$id]['count'] = $count;
	}

}
session_write_close();
?>

<h1>Shopping cart</h1>

<script type="text/javascript" charset="utf-8">
    function submitForm(action)
    {
        document.getElementById('shopping-form').action = action;
        if (action.search("clear") == -1) {
          document.getElementById('shopping-form').submit();
        }
        else if (confirm("Are you sure you want to delete all these items?\n These will be gone forever!"))  {
          document.getElementById('shopping-form').submit();
        }
    }
</script>

<form id="shopping-form" action="#" method="post" accept-charset="utf-8">

<div>
	<input type="button" onclick="submitForm('shopping_cart.php')" value="update cart" />
	<input type="button" onclick="submitForm('cart_clear.php')" value="clear all items" />
</div>
<br class='float-fix'/>
<?php

session_start();

if (isset($_SESSION['cart'])) {

	echo "<table id='oil-list'>";

	echo "
	<tr>
		<th>price</th>
		<th>name</th>
		<th>amount</th>
		<th>remove</th>
	</tr>
	";

   $total = 0.0;

	foreach ($_SESSION['cart'] as $id) 
	{
		echo "<tr>";
		$result =  $db->get_oil($id['id']);

      $total += $result['price'];

		echo "<td>" . "\$" . $result['price'] . "</td>";
		echo "<td><a href='" . SITEURL . "/single.php?id={$result['id']}'>" . $result['name'] . "</a></td>";
		echo "
		<td> <input name='count[]' type='textbox' value='" . $id['count'] . "' /> ";

		echo "<input name='id[]' type='hidden' value='" . $id['id'] . "' />
		</td>";
		echo "<td><a href='cart_remove.php?id={$id['id']}'>remove item</a></td>";

		echo "</tr>";

	}

	echo "</table>";
   echo  "<h3>Total \$" . $total . "</h3>";
}
else {
	echo "<h2>No items, visit the <a href='../index.php'>shop</a> to add some!</h2>";
}

session_write_close();
?>

<div>
	<input type="button" onclick="submitForm('shopping_cart.php')" value="update cart" />
	<input type="button" onclick="submitForm('cart_clear.php')" value="clear all items" />
</div>
<br class='float-fix'/>
</form>



<?php

include '../include/footer.php';
?>
