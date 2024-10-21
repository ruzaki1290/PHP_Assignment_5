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
      <h2>Search Customers</h2>
      <form action="index.php" method="get">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" placeholder="jasper" required>
            <input type="submit" value="Search">
      </form>
      <h2>Results</h2>
      <table>
         <thead>
            <tr>
               <th>Name</th>
               <th>Email Address</th>
               <th>City</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            // database class
            require_once('../model/database_oo.php');

            // gets database connection
            $db = Database::getDB();

            // check if the last name is provided
            $lastName = filter_input(INPUT_GET, 'lastName', FILTER_SANITIZE_STRING);

            //fetch customer data
            IF ($lastName) {
               $query = 'SELECT CONCAT(firstName, " ", lastName) AS name, email, city FROM customers WHERE lastName = :lastName';
               $statement = $db->prepare($query);
               $statement->bindValue(':lastName', $lastName);
            } else {
               $query = 'SELECT CONCAT(firstName, " ", lastName) AS name, email, city FROM customers';
               $statement = $db->prepare($query);
            }
            $statement->execute();
            $customers = $statement->fetchAll();
            $statement->closeCursor();

            // displays customer data
            foreach ($customers as $customer) {
               echo '<tr>';
               echo '<td>' . htmlspecialchars($customer['name']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['email']) . '</td>';
               echo '<td>' . htmlspecialchars($customer['city']) . '</td>';
               echo '<td><form action="view_update_customer.php" method="get">';
               echo '<input type="hidden" name="id" value="' . htmlspecialchars($customers['id']) . '">';
               echo '<input type="submit" value="Select">';
               echo '</form></td>';
               echo '</tr>';
            }   
            ?>
         </tbody>
      </table>
   </main>
   <?php include '../view/footer.php'; ?> 
</body>
</html>