<?php
//this will create a constant to the base directory.
define("SITEURL", "http://localhost/butterfly/");
include_once($_SERVER['DOCUMENT_ROOT'] . '/butterfly/admin/lib/markdown.php');

if (!isset($site_title)) {
   $site_title = 'Home';
}
$site_name = 'ButterflyOils.com';

class database {
   /**
      * oils setup:
      *  id 	name 	description 	price 	time 	visible 
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

         $result = $query->fetch();
         } catch (PDOException $e) { 
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }


         return $result;
      }

      public function set_page($id, $name, $content)
      {

         try {
         $sql = 'UPDATE `pages` SET `name`=:name,`content`=:content WHERE id=:id';


         $query = $this->db->prepare($sql);
         echo $query->execute(array(
            ':name'=> $name,
            ':content'=> $content,
            ':id'=>$id));

         $result = $query->fetch();
         } catch (PDOException $e) { 
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }

         return $result;
      }

      public function add_oil($name, $description, $price, $visible)
      {
         if ($visible == "on") {
            $visible = TRUE;
         }
         else {
            $visible = FALSE;
         }

         try {
            $sql = 'INSERT INTO `oils` (name, description, price, visible)
               VALUES (:name, :description, :price, :visible);';

            $query = $this->db->prepare($sql);
            echo $query->execute(array(
               ':name'=> $name,
               ':description'=> $description,
               ':price'=> $price,
               ':visible'=> $visible));
         } catch (PDOException $e) { 
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }
      }

      public function add_page($name, $content)
      {

         try {
            $sql = 'INSERT INTO `pages` (name, content)
               VALUES (:name, :content);';

            $query = $this->db->prepare($sql);
            echo $query->execute(array(
               ':name'=> $name,
               ':content'=> $content));
         } catch (PDOException $e) { 
            echo 'ERROR:Connection failed: ' . $e->getMessage();
         }
      }

      public function get_oil($id)
      {
         $sql = "SELECT * FROM oils WHERE id=$id;";

         $query = $this->db->prepare($sql);
         $query->execute();

         $result = $query->fetch();

         return $result;
      }

      public function get_page($id)
      {
         $sql = "SELECT * FROM pages WHERE id=$id;";

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

      public function pages_array()
      {
         $sql = 'SELECT * FROM pages;';

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
            $description = Markdown($oils['description']);
            $price = $oils['price'];
            $time = $oils['time'];
            $visible = $oils['visible'];

            $output = "";
            $output .= <<<EOF
<div class="product">
   <h3><a href="single.php?id=$id">$name</a></h3>
   <p class='price'>\$$price</p>
   <a href="single.php?id=$id"><img src='img/bottle.jpg' /></a>
   <a target="blank" href="shopping/cart_add.php?id=$id">Add to cart</a>
</div>

EOF;
            echo $output;
            
         }
         echo "<br class='float-fix' />";
      }
}

$db = new database();

?>
