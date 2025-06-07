# Simple PHP CRUD Application

A basic CRUD (Create, Read, Update, Delete) application built with vanilla PHP.

## Features

- Create new user records
- Read and display all user records
- Update existing user records
- Delete user records
- Responsive design with CSS

## Setup Instructions

1. Make sure you have a web server with PHP and MySQL installed (like XAMPP, WAMP, or LAMP)
2. Place the `php_crud` folder in your web server's document root
3. Update the database connection parameters in `includes/db_connection.php` if needed
4. Access the application through your web browser (e.g., http://localhost/php_crud/)
5. The application will automatically create the database and table if they don't exist

## Database Structure

The application uses a MySQL database with the following structure:

- Database name: `crud_db`
- Table name: `users`
- Fields:
  - `id` (INT, Primary Key, Auto Increment)
  - `name` (VARCHAR)
  - `email` (VARCHAR)
  - `phone` (VARCHAR)
  - `created_at` (TIMESTAMP)

## File Structure

- `index.php` - Main application file with all CRUD operations
- `includes/db_connection.php` - Database connection configuration