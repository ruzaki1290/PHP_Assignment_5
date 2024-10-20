<?php 
   $productCode = $_POST['productCode'];
   require_once('../model/database_oo.php');
   // get the data from index.php input contact_id
   //$contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);

   // code to save to MySQL Database goes here
   // validate inputs(checking if none of the inputs are = null)
   if ($productCode != false)
   {
      try {
         $db = Database::getDB();
         $query = 'DELETE FROM products WHERE productCode = :mysqlProductCode';

         $statement = $db->prepare($query);
         $statement->bindValue(':mysqlProductCode', $productCode);

         // processes to the database
         $statement->execute();
         // close prepared statement
         $statement->closeCursor();
      } catch (PDOException $e) {
         $error_message = $e->getMessage();
         include('../errors/database_error.php');
         exit();
      }
   }

   // reload index page
   $url = "index.php";
   header("Location: " . $url);
   die();
?>
