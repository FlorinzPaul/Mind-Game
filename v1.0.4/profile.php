<?php
    include('update_profile_handler.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c451d80140.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
</head>
<body>
    <nav>
        <div class="nav_left"></div>
        <div class="nav_right">
        <div class="nav_right_menu">
                <a href="home.php">Home</a>
                <a href="profile.php">Manage Profile</a>
                <a href="developers.html">Developers</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="left_container">
            <div class="game_panel">
                <h2>Profile Settings</h2>
            </div>
            <br>
            <div class="sidebar_items">
                <a href="#" onclick="showUpdateForm()"><h3>Change Profile</h3></a>
                <a href="#" onclick="showDeleteForm()"><h3>Delete Account</h3></a>
                <form id="deleteAccountForm" method="post" action="delete_account.php" style="display:none;"></form>
            </div>
        </div>

        <div class="form_content">
            <div id="updateContainer" class="form_container">
                <!-- Form to change profile picture -->
                <form id="imageForm" method="post" action="" enctype="multipart/form-data">
                    <div class="upload">
                        <img src="<?php echo !empty($image) ? htmlspecialchars($image) : 'image/default-avatar.png'; ?>" width="125" height="125" alt="Profile Picture">
                        <div class="round">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($userId); ?>">
                            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                            <i class="fa fa-camera" style="color: #fff;"></i>
                        </div>
                    </div>
                    <input type="submit" class="submit-btn" value="Update Profile Photo" name="uploadImage">
                </form>
                <br>
                <!-- Form to change username -->
                <form id="usernameForm" method="post" action="">
                    <label for="username">New Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($name); ?>" required>
                    <label for="password">Confirm with Password:</label>
                    <input type="password" id="password" name="password" required><br>
                    <input type=    "submit" class="submit-btn" value="Change Username" name="changeUsername">
                </form>
            </div>

            <div id="deleteContainer" class="form_container hide" >
                <form id="deleteForm" method="post" action="delete_account_handler.php">
                    <label for="password">Confirm with Password:</label>
                    <input type="password" id="password" name="password" required><br>
                    <input type="submit" class="submit-btn" value="Delete Account" name="deleteAccount">
                </form>
            </div>
        </div>
    </div>

    <script src="js/profile.js"></script>

</body>
</html>
