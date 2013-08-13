<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');


if (isset($_POST)) {
   if (isset($_POST['id'])) {
      $db->set_oil($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['visible']);
      echo "Oil updated... redirecting";
      header('Location: /butterfly/admin/index.php');
   }

   echo 'woops oil didn\'t save';

}

include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include//footer.php');

?>
