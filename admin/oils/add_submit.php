
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/redirect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include/header.php');


if (isset($_POST)) {
   if (isset($_POST['name']) && $_POST['desciption'] && $_POST['price'] && $_POST['visible'] ) {
      $db->add_oil($_POST['name'], $_POST['desciption'], $_POST['price'], $_POST['visible']);
      echo "Oil added... redirecting";
      header('Location: /butterfly/admin/index.php');
   }

   echo 'your oil did not submit properly, did you fill out all the information?';

}

include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/include//footer.php');

?>
