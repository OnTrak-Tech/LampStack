<?php
// Include database connection
require_once 'includes/db_connection.php';

// Initialize variables
$id = $name = $email = $phone = "";
$update = false;

// Create database and table if not exists
$sql = "CREATE DATABASE IF NOT EXISTS lampstackdb";
if (mysqli_query($conn, $sql)) {
    // Select the database
    mysqli_select_db($conn, "lampstackdb");
    
    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    mysqli_query($conn, $sql);
}

// Create operation
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=Record created successfully");
    } else {
        header("Location: index.php?error=Error creating record: " . mysqli_error($conn));
    }
}

// Read operation - fetch all records
$result = mysqli_query($conn, "SELECT * FROM users");

// Update operation - get record for update
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    
    if (mysqli_num_rows($record) == 1) {
        $row = mysqli_fetch_array($record);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
    }
}

// Update operation - update record
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=Record updated successfully");
    } else {
        header("Location: index.php?error=Error updating record: " . mysqli_error($conn));
    }
}

// Delete operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $sql = "DELETE FROM users WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?success=Record deleted successfully");
    } else {
        header("Location: index.php?error=Error deleting record: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
        .btn-update {
            background-color: #2196F3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
        }
        .edit {
            color: #2196F3;
        }
        .delete {
            color: #f44336;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP CRUD Application</h1>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="message success">
                <?php echo $_GET['success']; ?>
            </div>
        <?php endif ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="message error">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif ?>
        
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required>
            </div>
            
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            
            <div>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            
            <div>
                <?php if ($update): ?>
                    <button class="btn btn-update" type="submit" name="update">Update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save">Save</button>
                <?php endif ?>
            </div>
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td class="action-links">
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit">Edit</a>
                            <a href="index.php?delete=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>