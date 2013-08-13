<?php
session_start();

if (isset($_SESSION['cart'][$_GET['id']]) )
{
   unset($_SESSION['cart'][$_GET['id']]);
}

session_write_close();

header('Location: /butterfly/shopping/shopping_cart.php');



?>
