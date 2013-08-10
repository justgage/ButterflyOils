<?php
//this will create a constant to the base directory.
define("SITEURL", "http://localhost/butterfly/");
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/lib/markdown.php');

class database {
   /**
      * oils setup:
      *  id 	name 	desciption 	price 	time 	visible 
    **/

      private $dsn = "mysql:dbname=butterfly_DB;host=localhost";
      private $username = "bot";
      private $pass = "uQceH4FqnS99Fmv8";
      private $db;
      

      function __construct() {
         try {
            $this->db = new PDO($this->dsn, $this->username, $this->pass);
         } catch (PDOException $e) {
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }
      }

      public function set_oil($id, $name, $description, $price, $visible)
      {

         if ($visible == "on") {
            $visible = TRUE;
         }
         else {
            $visible = FALSE;
         }

         try {
         $sql = 'UPDATE `oils` SET `name`=:name,`description`=:description,`price`=:price,`visible`=:visible WHERE id=:id';



         $query = $this->db->prepare($sql);
         echo $query->execute(array(
            ':name'=> $name,
            ':description'=> $description,
            ':price'=> $price,
            ':visible'=> $visible,
            ':id'=>$id));

         var_dump($query);

         $result = $query->fetch();
         } catch (PDOException $e) { 
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }


         return $result;
      }

      public function get_oil($id)
      {
         $sql = "SELECT * FROM oils WHERE id=$id;";

         $query = $this->db->prepare($sql);
         $query->execute();

         $result = $query->fetch();

         return $result;
      }

      public function oils_array()
      {
         $sql = 'SELECT * FROM oils;';

         $query = $this->db->prepare($sql);
         $query->execute();

         $result = $query->fetchAll(PDO::FETCH_ASSOC);

         return $result;
      }
      public function display_oils()
      {
         $sql = 'SELECT * FROM oils;';

         $query = $this->db->prepare($sql);
         $query->execute();

         $result = $query->fetchAll(PDO::FETCH_ASSOC);

         foreach ($result as $oils) {

            $id = $oils['id'];
            $name = $oils['name'];
            $desciption = Markdown($oils['description']);
            $price = $oils['price'];
            $time = $oils['time'];
            $visible = $oils['visible'];

            $output = "";
            $output .= <<<EOF
<div class="product">
<h3>$name</h3>
<span class='price'>\$$price</span>
<img src='img/bottle.jpg' />
<p>$desciption</p>
</div>

EOF;
            echo $output;
            
         }
         echo "<br class='float-fix' />";
      }
}

$db = new database();

?>
