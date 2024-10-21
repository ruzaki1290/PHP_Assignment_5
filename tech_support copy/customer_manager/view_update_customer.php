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

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // gets the customer data from the form
         $customerId = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
         $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
         $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
         $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
         $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
         $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
         $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_STRING);
         $countryCode = filter_input(INPUT_POST, 'countryCode', FILTER_SANITIZE_STRING);
         $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
         $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

         // update customer data
         if ($customerId && $firstName && $lastName && $address && $city && $state && $postalCode && $countryCode && $phone && $email) {
            $query = 'UPDATE customers SET firstName = :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone, email = :email WHERE customerID = :customerID';
            $statement = $db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':postalCode', $postalCode);
            $statement->bindValue(':countryCode', $countryCode);
            $statement->bindValue(':phone', $phone);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':customerID', $customerId);
            $statement->execute();
            $statement->closeCursor();
            echo '<p>Customer updated successfully.</p>';
         } else {
            echo '<p>Invalid customer data. Check all fields and try again.</p>';
         }
      } else {
         // gets customer ID from the query string
         $customerId = filter_input(INPUT_GET, 'customerID', FILTER_VALIDATE_INT);

         // debugging: check the value of customer ID
         if ($customerId === false) {
            echo '<p>Invalid customer ID format.</p>';
            exit();
         } elseif ($customerId === null) {
            echo '<p>Customer ID is missing.</p>';
            exit();
         }

         // fetch customer data
         if ($customerId) {
            $query = 'SELECT firstName, lastName, address, city, state, postalCode, countryCode, phone, email FROM customers WHERE customerID = :customerID'; 
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customerId);
            $statement->execute();
            $customer = $statement->fetch();
            $statement->closeCursor();
            // debugging: check if customer data is fetched
            if (!$customer) {
               echo '<p>No customer found with the provided ID.</p>';
               exit();
            }
         } else {
            echo '<p>Invalid customer ID.</p>';
            exit();
         }
         ?>
         <h1>View/Update Customer</h1>
            <form action="view_update_customer.php" method="post">
            <input type="hidden" name="customerID" value="<?php echo htmlspecialchars($customerId); ?>">
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
            </form>
         <?php } ?>

   </main>
   <?php include '../view/footer.php'; ?> 
</body>
</html>