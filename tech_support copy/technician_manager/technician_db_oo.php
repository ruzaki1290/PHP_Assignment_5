<?php
   require_once('../model/database_oo.php');
   require_once('technician.php');

   class TechnicianDB {
      public static function addTechnician($technician) {
         $db = Database::getDB();
         $query = 'INSERT INTO technicians
         (techId, firstName, lastName, email, phone, password)
         VALUES
         (:techId, :firstName, :lastName, :email, :phone, :password)';
         $statement = $db->prepare($query);
         $statement->bindValue(':techId', $technician->getTechID());
         $statement->bindValue(':firstName', $technician->getFirstName());
         $statement->bindValue(':lastName', $technician->getLastName());
         $statement->bindValue(':email', $technician->getEmail());
         $statement->bindValue(':phone', $technician->getPhone());
         $statement->bindValue(':password', $technician->getPassword());
         $statement->execute();
         $statement->closeCursor();
      }

      public static function getTechnicians() {
         $db = Database::getDB();
         $query = 'SELECT techID, firstName, lastName, email, phone, password FROM technicians';
         $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        $technicians = [];
        foreach ($rows as $row) {
         $technician = new Technician(
             $row['techID'],
             $row['firstName'],
             $row['lastName'],
             $row['email'],
             $row['phone'],
             $row['password']
         );
         $technicians[] = $technician;
     }
     return $technicians;
      }
   }
?>