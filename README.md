# PHP_Assignment_5

## Updates to the project Assignment 4

New directory and files had been added to the project. The new directory is called `customer_manager` and it contains the following files: `index.php` and `view_update_customer.php`.

## Overview

This project involves creating a customer management system that allows users to view, search, and update customer data. The system is built using PHP and MySQL and consists of two main pages: `index.php` and `view_update_customer.php`.

## Direcotry Structure

``` php
- customer_manager/
  - index.php
  - view_update_customer.php
```

## Functionality

### `index.php`

* **Customer Data Display**: Fetches customer data from a MySQL database and displays it in a table format.
* **Search Bar**: Includes a search bar that allows users to look up customers by their last name.
* **Select Button**: Each customer row has a "Select" button that redirects the user to the `view_update_customer.php` page for the selected customer.

### `view_update_customer.php`

* **Detailed Customer Form**: Displays a detailed form with the selected customer's data.
* **Update Functionality**: Allows users to add and modify customer data.

## How It Works

1. **Customer Data Fetching**: The `index.php` page fetches customer data from the MySQL database and displays it in a table.
2. **Search Functionality**: Users can search for customers by their last name using the search bar.
3. **Select Customer**: Users can select a customer by clicking the "Select" button, which redirects them to the `view_update_customer.php` page.
4. **View and Update Customer Data**: The `view_update_customer.php` page displays a detailed form with the selected customer's data, allowing users to update the information.

## Technologies Used

* PHP
* MySQL
* HTML/CSS

## Completed Challenges

### 6-3: Manage Customers

For this project, you’ll create an application that allows an admin user to manage customer data efficiently. The application provides functionality for selecting an existing customer, viewing detailed information, and updating the customer's data as needed.

## Setup Instructions

1. **Database Setup**: Ensure you have a MySQL database set up with a `customers` table.
2. **Directory Structure**: Place the `customer_manager` directory in your project root.
3. **Database Configuration**: Update the database connection details in the `database_oo.php` file.
4. **Run the Project**: Access the `index.php` page through your web server to start managing customer data.