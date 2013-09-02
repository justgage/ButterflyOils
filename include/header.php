<?php include 'functions.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">
   <title><?php echo "$site_title | $site_name"; ?></title>
   <link rel="stylesheet" href="<?=SITEURL?>/include/reset.css" type="text/css" media="screen" charset="utf-8">
   <link rel="stylesheet" href="<?=SITEURL?>/include/style.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<div class="right" id="cart">
   <a href="<?=SITEURL?>/shopping/shopping_cart.php">
   Shopping Cart (
<?php
session_start();
if (isset($_SESSION['cart'])) {
   echo count($_SESSION['cart']); 
}
else { echo 0; }

session_write_close();?>
)
      <img class="right" src="<?=SITEURL?>/img/cart.png"> 
   </a>
</div>
<div id="wrapper">
<div id="header">
   <p id="logo"> <a href="<?=SITEURL?>"><img src="/butterfly/img/logo.png" alt="Butterfly Oils" /></a> </p> 
   <p id="tagline">Pure essential Oils</p>
   <div id="nav">
      <ul>
<li><a href="index.php">Shop</a></li>
<?php
$pages = $db->pages_array();

foreach ($pages as $single) {
   echo "<li><a href='page.php?id={$single['id' ]}'>{$single['name']}</a></li>";
}

?>
      </ul>
   </div>
   <br class="float-fix"/>
</div>


