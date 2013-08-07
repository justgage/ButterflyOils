<?php
//this will create a constant to the base directory.
define("SITEURL", "http://localhost/butterfly/");

class database {

      private $dsn = "mysql:dbname=butterfly_DB;host=localhost";
      private $username = "bot";
      private $pass = "uQceH4FqnS99Fmv8";
      private $db;
      

      function __construct() {
         try {
            $this->db = new PDO($this->dsn, $this->username, $this->pass);
            echo 'connected!';
         } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
         }
      }

      public function oils_array()
      {
         $sql = 'SELECT * FROM oils';

         $query = $this->db->prepare($sql);
         $query->execute();

         $result = $query->fetchAll(PDO::FETCH_ASSOC);

         return $result;
      }
}

$db = new database();
?>
