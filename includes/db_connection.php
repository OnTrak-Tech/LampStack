<?php
// Load environment variables from .env file
$env_path = dirname(__DIR__) . '/.env';
$env_vars = parse_ini_file($env_path);

// Database connection parameters
$host = $env_vars['DB_HOST'] ?? '';
$username = $env_vars['DB_USERNAME'] ?? '';
$password = $env_vars['DB_PASSWORD'] ?? ''; 
$database = $env_vars['DB_DATABASE'] ?? '';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>