<?php

class user {


   /**
    * This will make the connection
    **/
   function __construct()
   {
      $dbh;
      /*** mysql hostname ***/
      $hostname = 'localhost';

      /*** mysql username ***/
      $username = 'gagesPHP';

      /*** mysql password ***/
      $password = 'EpCn4sAjvSYyEj4v';
      try {
         $this->dbh = new PDO("mysql:host=$hostname;dbname=test", $username, $password);

         /*** echo a message saying we have connected ***/
         echo '<b>Connected to database</b><br />';


      }
      catch(PDOException $e)
      {
         echo $e->getMessage();
      }
   }

   /**
    * this will make an sql statement
    * returns false if it dosn't work.
    **/ 

   function sql($sql){
         return $this->dbh->query($sql);
   }

   /**
    * This will close the sql statement
    **/
   function kill()
   {
      /*** close the database connection ***/
      $this->dbh = null;
   }

}

?>

