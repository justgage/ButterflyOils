<?php 
session_start();
unset($_SESSION['cart']);
session_write_close();

header('Location: /butterfly/shopping/shopping_cart.php');
 ?>