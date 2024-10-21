<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Manager - View/Update Customer</title>
   <link rel="stylesheet" href="/PHP_Assignment_5/tech_support copy/main.css">
</head>
<body>
   <?php include '../view/header.php'; ?>
   <main>
      <?php
      require_once('../model/database_oo.php');

      // gets database connection
      $db = Database::getDB();

      // gets customer ID from the query string
      $customerId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

      // fetch customer data
      if ($customerId) {
         $query = 'SELECT firstName, lastName, address, city, state, postalCode, countryCode, phone, email FROM customers WHERE id = :id'; 
         $statement = $db->prepare($query);
         $statement->bindValue(':id', $customerId);
         $statement->execute();
         $customer = $statement->fetch();
         $statement->closeCursor();
      } else {
         echo '<p>Invalid customer ID.</p>';
         exit();
      }
      ?>

      <h1>View/Update Customer</h1>
      <form action="view_update_customer.php" method="post"></form>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($customerId); ?>">
      <label for="firstName">First Name:</label>
      <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($customer['firstName']); ?>" required><br>

      <label for="lastName">Last Name:</label>
      <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($customer['lastName']); ?>" required><br>

      <label for="address">Address:</label>
      <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($customer['address']); ?>" required><br>

      <label for="city">City:</label>
      <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($customer['city']); ?>" required><br>

      <label for="state">State:</label>
      <input type="text" name="state" id="state" value="<?php echo htmlspecialchars($customer['state']); ?>" required><br>

      <label for="postalCode">Postal Code:</label>
      <input type="text" name="postalCode" id="postalCode" value="<?php echo htmlspecialchars($customer['postalCode']); ?>" required><br>

      <label for="countryCode">Country Code:</label>
      <input type="text" name="countryCode" id="countryCode" value="<?php echo htmlspecialchars($customer['countryCode']); ?>" required><br>

      <label for="phone">Phone:</label>
      <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required><br>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required><br>

      <input type="submit" value="Update Customer">
   </main>
   <?php include '../view/footer.php'; ?> 
</body>
</html>