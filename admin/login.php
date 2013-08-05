

<?php

if($_POST) {
   if (!$_POST['username'] || !$_POST['password']) {
      $_SESSION['failed'] = 'yes';
   }
   else {
      echo $_POST['username'];
      echo $_POST['password'];
   }

}

?>

<?php
if ($_SESSION['failed'] = 'yes') {
   include 'include/login_form.php';
}
?>
