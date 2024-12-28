<?php
    session_start();
    include("connect.php");

    // Fetch user details from session or database
    $userId = $_SESSION['user_id'] ?? null;
    if (!$userId) {
        die("User not logged in.");
    }

    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found.");
    }

    $name = $user['username'];
    $image = $user['profile_pic'];

    // Handle image upload
    if (isset($_POST['uploadImage'])) {
        $id = $_POST['id'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $tmpName = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension');</script>";
        } elseif ($imageSize > 1200000) {
            echo "<script>alert('Image Size Is Too Large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $imagePath = "img/$newImageName";
            $query = "UPDATE users SET profile_pic = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $imagePath, $id);

            if ($stmt->execute()) {
                move_uploaded_file($tmpName, $imagePath);
                echo "<script>alert('Profile Picture Updated');</script>";
            } else {
                echo "<script>alert('Error Updating Profile Picture');</script>";
            }
        }
        header("Location: home.php");
    }

    // Handle username change
    if (isset($_POST['changeUsername'])) {
        $newUsername = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = md5($password);

        // Fetch the current user's hashed password from the database
        $query = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($storedHashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Compare the provided hashed password with the stored hashed password
        if ($hashedPassword === $storedHashedPassword) {
            $query = "UPDATE users SET username = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $newUsername, $userId);

            if ($stmt->execute()) {
                echo "<script>alert('Username Updated');</script>";
            } else {
                echo "<script>alert('Error Updating Username');</script>";
            }
        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }

        header("Location: home.php");
    }
?>