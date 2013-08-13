<?php include 'include/header.php'; ?>
<div id="content">
<?php
if (isset($_GET['id'])) {
   $single = $db->get_oil($_GET['id']); 
   if ($single == false) {
      echo '<h1>:( Sorry this link is wrong. </h1>';
      echo "<p><em>Perhaps you can find it in our shop?</em></p>";
      $db->display_oils();
   }
   else
   {
?>

<h3><a href="index.php">&larr; back to shop</a></h3>
<h1><?=$single['name']?> <a class='right' target="blank" href="shopping/cart_add.php?id=<?php echo $_GET['id'] ?>">Add to cart</a></h1>
<img src='img/bottle.jpg' />
<p>$<?=$single['price']?></p>
<div id="oil-info">
<?php
echo Markdown($single['description']);
?>
</div>


<?php
   }
}
else {// oil not found
   echo '<h1>:( Sorry this link is wrong. </h1>';
      $db->display_oils();
}
?>
</div>

<?php include 'include/footer.php'; ?>
