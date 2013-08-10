<?php
session_start();
if (isset($_SESSION['butterflys_admin'])) {
   session_unset($_SESSION['butterflys_admin']);
   echo 'got rid of session ADMIN';
}
if (isset($_SESSION['failed'])) {
   $_SESSION['failed'] = true;

}
header('Location: /butterfly/');
?>


