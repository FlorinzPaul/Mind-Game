<?php 
    include 'connect.php';

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_POST['signUp'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);

        if($result->num_rows > 0){
            echo "Email Address Already Used in Existing Account!";
        } else {
            $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if($conn->query($insertQuery) === TRUE){
                echo " 
                    <script>
                        alert('Sign Up Successful! Please Log In.');
                        window.location.href = 'index.php?showLoginModal=true';
                    </script>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }

    if(isset($_POST['signIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id']; 
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Not Found, Incorrect Email or Password');window.location.href = 'index.php';</script>";
        }
    }
?>