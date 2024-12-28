<?php
session_start();
include("connect.php");

// Check if the user is logged in
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die("User not logged in.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAccount'])) {
    $password = $_POST['password'];
    $hashedPassword = md5($password); // Replace this with your hashing algorithm

    // Check if the entered password matches the stored password
    $query = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($storedHashedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($hashedPassword === $storedHashedPassword) {
        // Delete the account
        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $userId);

        if ($deleteStmt->execute()) {
            session_destroy(); 
            header("Location: index.php"); 
            exit;
        } else {
            echo "<script>alert('Error deleting account.');</script>";
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Incorrect password.');</script>";
        echo "<script>window.history.back();</script>";
    }
}
?>
