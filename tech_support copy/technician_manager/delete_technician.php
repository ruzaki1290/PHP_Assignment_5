<?php 
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

   $techID = $_POST['techID'];
   require_once('../model/database_oo.php');

   // code to save to MySQL Database goes here
   // validate inputs(checking if none of the inputs are = null)
   if ($techID != false)
   {
      try {
         $db = Database::getDB();
         $query = 'DELETE FROM technicians WHERE techID = :techID';

         $statement = $db->prepare($query);
         $statement->bindValue(':techID', $techID);

         // processes to the database
         $statement->execute();
         // close prepared statement
         $statement->closeCursor();

      }catch(PDOException $e) {
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
