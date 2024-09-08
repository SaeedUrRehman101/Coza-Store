<?php
session_start();

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=registeration_form_data', 'root', '');

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: register.php");
    exit();
}

// Handle account deletion
if (isset($_POST['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE name = :name");
    $stmt->bindParam(':name', $_SESSION['user_name']);
    $stmt->execute();
    session_destroy();
    header("Location: register.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <form method="POST" action="">
        <button type="submit" name="logout">Logout</button>
        <button type="submit" name="delete">Delete Account</button>
    </form>
</body>
</html>
