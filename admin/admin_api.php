<?php

include 'functions.php'; 

$response = array();

session_start();
if (isset($_SESSION['butterflys_admin']) == false) {
   $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI']; //store the page they were trying to access
   $response = array("err" => false, "logged" => true,  "mess" => "you ARE logged in");

   if (isset($_POST['oil']) {
      if (isset($_POST['add'])) {
         if (isset($_POST['name']) && $_POST['desciption'] && $_POST['price'] && $_POST['visible'] ) {
            $db->add_oil($_POST['name'], $_POST['desciption'], $_POST['price'], $_POST['visible']);
            $response['mess'] = "File was sucessfully deleted";
         }
         else {
            $response['mess'] = "All required feilds didn't exist";
         }

      }
   }

   exit;
} 
else {
   $response = array("err" => true, "logged" => false, "mess" => "You are not logged in!");
}

echo json_encode($response);

?>
