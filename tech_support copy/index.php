<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/PHP_Assignment_5/tech_support copy/main.css">
        <title>Tech Support - Home</title>
    </head> 
    <body>
        <?php include 'view/header.php'; ?>
        <main>
            <nav>
                
            <h2>Administrators</h2>
            <ul>
                <li><a href="product_manager">Manage Products</a></li>
                <li><a href="technician_manager">Manage Technicians</a></li>
                <li><a href="customer_manager">Manage Customers</a></li>
                <li><a href="under_construction.php">Create Incident</a></li>
                <li><a href="under_construction.php">Assign Incident</a></li>
                <li><a href="under_construction.php">Display Incidents</a></li>
            </ul>

            <h2>Technicians</h2>    
            <ul>
                <li><a href="under_construction.php">Update Incident</a></li>
            </ul>

            <h2>Customers</h2>
            <ul>
                <li><a href="under_construction.php">Register Product</a></li>
            </ul>
            
            </nav>
        </section>
        <?php include 'view/footer.php'; ?>
    </body>
</html>

