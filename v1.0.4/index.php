<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght
    @100;200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c451d80140.js" crossorigin="
    anonymous"></script>
    <title>MIND Game - Landing Page</title>
</head>
<body>       
    <nav>
        <div class="nav_left">
        </div>
        <div class="nav_right">
            <button id="loginBtn">Login</button>
            <button id="SignupBtn">Sign up</button>
        </div>
    </nav>

    <div class="body_container">
        <div class="body_text">
            <h1>MIND <span>Game</span></h1>
            <p>Mind Game is a mini-game platform designed to improve your memory and cognitive skills, all while immersing you in a fun and challenging experience. With engaging visuals and dynamic gameplay, it’s the perfect blend of entertainment and mental exercise to sharpen your mind and test your skills.</p>
        </div>
        <div class="body_img">
            <img src="image/design.gif" alt="">
        </div>
    </div>
    
    <!-- Login Form Modal -->
    <div id="loginModal" class="modal-overlay">
        <div class="modal-content">
            <span id="closeLogin" class="close-btn">&times;</span>
            <h2>Login</h2>
            <form id="loginForm" method="post" action="sign_in_out_handler.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" class="submit-btn" value="Login" name="signIn">
            </form>
        </div>
    </div>

    <!-- Register Form Modal -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-content">
            <span id="closeRegister" class="close-btn">&times;</span>
            <h2>Register</h2>
            <form id="registerForm" method="post" action="sign_in_out_handler.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" class="submit-btn" value="Sign Up" name="signUp" id="signUp">
            </form>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('showLoginModal')) {
                showForm('loginModal');
            }
        };
    </script>
</body>
</html>