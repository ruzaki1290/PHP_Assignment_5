<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Technicians</title>
        <link rel="stylesheet" type="text/css" href="/PHP_Assignment_4.2/tech_support copy/main.css">
    </head>
    <body>
        <?php include '../view/header.php'; ?>
        <main>
            <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                require_once('../technician_manager/technician_db_oo.php');

                // retrieves all technicians using the TechnicianDB class
                $technicians = TechnicianDB::getTechnicians();  
            ?>
            <table>
                <tr>
                    <th>Tech ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th></th>
                </tr>
                <?php
                    foreach($technicians as $technician) {

                        echo '<tr>';
                        echo '<td>'.$technician->getTechID().'</td>';
                        echo '<td>'.$technician->getFullName().'</td>';
                        echo '<td>'.$technician->getEmail().'</td>';
                        echo '<td>'.$technician->getPhone().'</td>';
                        echo '<td>'.$technician->getPassword().'</td>';
                        echo '
                        <td>
                            <form method="post" action="delete_technician.php">
                                <input type="hidden" name="techID" value="'.$technician->getTechID().'">
                                <button>Delete</button>
                            </form>
                        </td>';

                    echo '</tr>';
                        
                    }
                ?>
            </table>
            <a href="add_technician.php">Add Technician</a>
        </main>   
    </body>
    <?php include '../view/footer.php'; ?> 
</html>