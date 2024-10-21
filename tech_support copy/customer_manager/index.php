<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Customers</title>
   <link rel="stylesheet" href="/PHP_Assignment_5/tech_support copy/main.css">
</head>
<body>
   <?php include '../view/header.php'; ?>
   <main>
      <table>
         <thead>
            <tr>
               <th>Name</th>
               <th>Email Address</th>
               <th>City</th>
            </tr>
         </thead>
         <tbody>
            <?php
            // database class
            require_once('../model/database_oo.php');

            // gets database connection
            $db = Database::getDB();

            //fetch customer data
            $query = 'SELECT CONCAT(firstName, " ", lastName) AS name, email, city FROM customers';
            $statement = $db->prepare($query);
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();

            // debugging: check if customers array is empty
            if (empty($customers)) {
               echo '<tr><td colspan="3">No customers found.</td></tr>';
            } else {
               // displays customer data
               foreach ($customers as $customer) {
                  echo '<tr>';
                  echo '<td>' . htmlspecialchars($customer['name']) . '</td>';
                  echo '<td>' . htmlspecialchars($customer['email']) . '</td>';
                  echo '<td>' . htmlspecialchars($customer['city']) . '</td>';
                  echo '</tr>';
               }   
            }
            ?>
         </tbody>
      </table>
   </main>

</body>
<?php include '../view/footer.php'; ?> 
</html>