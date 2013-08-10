<?php
/**************************************************************************
 * This will redirect the user if they are on a page they shouldn't be on.
 **************************************************************************/
session_start();
if (isset($_SESSION['butterflys_admin']) == false) {
   $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI']; //store the page they were trying to access
   header('Location: /butterfly/admin/login.php');
   exit;
} 
?>
