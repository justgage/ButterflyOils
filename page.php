<?php include 'include/header.php'; ?>
<div id="content">
<?php
if (isset($_GET['id'])) {
   $single = $db->get_page($_GET['id']); 
   if ($single == false) {
      echo '<h1>:( Sorry this link is wrong. </h1>';
   }
   else
   {
?>

<h3><a href="index.php">&larr; back to shop</a></h3>
<h1><?=$single['name']?></h1>
<div id="oil-info">
<?php
echo Markdown($single['content']);
?>
</div>


<?php
   }
}
else {// oil not found
   echo '<h1>:( Sorry this link is wrong. </h1>';
}
?>
</div>

<?php include 'include/footer.php'; ?>

