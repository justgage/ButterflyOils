<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');

if (isset($_POST['id'])) {
	$db->delete_page($_POST['id']);
}
else {
	echo "<h2>No oils selected</h2>";
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/footer.php');
 ?>