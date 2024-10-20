<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Contact Manager - Add Technician</title>
      <link rel="stylesheet" type="text/css" href="/PHP_Assignment_4.2/tech_support copy/main.css">
   </head>
   <body>
   <?php include '../view/header.php'; ?>
      <main>
         <h2>Add Technician</h2>
         <div>
            <form method="post" id="add_technician">
               <div id="technician">
                  <label>Tech ID:</label>
                  <input type="text" name="techId"/><br />

                  <label>First Name:</label>
                  <input type="text" name="firstName"/><br />

                  <label>Last Name:</label>
                  <input type="text" name="lastName"/><br />

                  <label>Email:</label>
                  <input type="email" name="email"/><br />

                  <label>Phone:</label>
                  <input type="text" name="phone"/><br />

                  <label>Password:</label>
                  <input type="password" name="password"/><br />
               </div>
               <div id="buttons">
                  <label>&nbsp;</label>
                  <input type="submit" value="Save Technician" /><br />
               </div>
         </div>

         </form>

         <p><a href="index.php">View Technician List</a></p>
      </main>
      <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once('../technician_manager/technician.php');
            require_once('../technician_manager/technician_db_oo.php');
            var_dump($_POST);

            $techId = $_POST['techId'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            // creates a Technician object
            $technician = new Technician($techId, $firstName, $lastName, $email, $phone, $password);
            
            // validates form data
            $isValid = true;
            switch (true) {
               case empty($technician->getTechID());
               case empty($technician->getFirstName());
               case empty($technician->getLastName());
               case empty($technician->getEmail());
               case empty($technician->getPhone());
               case empty($technician->getPassword());
                  $isValid = false;
                  break;
            }

            if (!$isValid) {
               echo "All fields are required.";
               exit;
            }
                     
            try {
               // get the database connection
               TechnicianDB::addTechnician($technician);

               // redirect to technician list
               header("Location: index.php");
               exit;
            } catch (PDOException $e) {
               echo "Error: " . $e->getMessage();
               exit;
            }    
         }
      ?>
   </body>
   <?php include '../view/footer.php'; ?> 
</html>