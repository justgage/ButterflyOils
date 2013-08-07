<?php

session_start();
ob_start();

if (!isset($_SESSION['butterflys_admin'])) {
      if (isset($_POST['username']) == false || isset($_POST['password']) == false) {
         $_SESSION['failed'] = 'yes';
      }
      elseif ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
         $_SESSION['failed'] = 'no';
         $_SESSION['butterflys_admin'] = true;
      }
}
else
{
   $_SESSION['failed'] = 'no';
   $_SESSION['butterflys_admin'] = true;
}



if ($_SESSION['failed'] == 'yes') {
   session_write_close();
   include 'include/login_form.php';
}
else
{
   session_write_close();
   header('Location: /butterfly/admin/index.php');
}
ob_end_flush();
?>
