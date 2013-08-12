
<?php
session_start();

if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] =  
   array($_GET['id'] => 
   	array(
   		'id' => $_GET['id'],
   		'count' => 1
   		)
   	);
}
elseif (!isset($_SESSION['cart'][$_GET['id']] ) )
{
	$_SESSION['cart'][$_GET['id']] = array('id' => $_GET['id'], 'count' => 1);
}
else {
   $_SESSION['cart'][$_GET['id']]['count']++;
}

session_write_close();

header('Location: /butterfly/shopping/shopping_cart.php');



?>
