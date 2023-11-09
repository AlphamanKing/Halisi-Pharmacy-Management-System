<?php
// index.php

// Include the database connection (you'll need to adjust this based on your setup)
require_once 'db/database.php';

// Check if the user is logged in (implement proper authentication)
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch user details from the database (adjust this query based on your schema)
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Welcome,
            <?php echo $user['username']; ?>!
        </h1>
        <a href="logout.php">Logout</a> <!-- Implement logout functionality -->
    </header>

    <nav>
        <!-- Add navigation links (e.g., Inventory, Prescriptions, Sales) -->
        <ul>
            <li><a href="inventory.php">Inventory</a></li>
            <li><a href="prescription.php">Prescriptions</a></li>
            <li><a href="sales.php">Sales</a></li>
            <!-- Add more links as needed -->
        </ul>
    </nav>

    <main>
        <!-- Display relevant content based on user role -->
        <?php if ($user['role'] === 'pharmacist'): ?>
            <!-- Pharmacist-specific content -->
            <h2>Pharmacist Dashboard</h2>
            <!-- Display prescription processing status, stock levels, etc. -->
        <?php elseif ($user['role'] === 'administrator'): ?>
            <!-- Administrator-specific content -->
            <h2>Administrator Dashboard</h2>
            <!-- Manage users, view reports, etc. -->
        <?php elseif ($user['role'] === 'customer'): ?>
            <!-- Customer-specific content -->
            <h2>Customer Dashboard</h2>
            <!-- View prescriptions, make purchases, etc. -->
        <?php endif; ?>
    </main>

    <footer>
        © 2023 Pharmacy Management System
    </footer>

    <!-- Include JavaScript files as needed -->
    <script src="js/user.js"></script>
    <!-- Add more scripts as required -->

</body>

</html>