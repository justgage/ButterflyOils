<?php
if (!$_SESSION['butterflys_admin']) {
   $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI']; //store the page they were trying to access
   header('Location: /butterfly/admin/login.php');
   exit;
} 
?>
