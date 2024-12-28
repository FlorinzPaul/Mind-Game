<?php
    session_start();
    include("connect.php");

    $sessionId = $_SESSION["user_id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));
    $image = $user["profile_pic"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght
    @100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font
    -awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdY
    TDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHU
    SCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/c451d80140.js" crossorigin="
    anonymous"></script>
    <title>MING Game</title>
</head>
<body>
            
    <nav>
        <div class="nav_left">
            <h3>MIND <span>Games</span></h3>
        </div>
        <div class="nav_right">
            <div class="nav_user_icon" onclick="settingsMenuToggle()">
                <img src="<?php echo !empty($image) ? htmlspecialchars($image) : 'image/default-avatar.png'; ?>" alt="profile">
            </div>
        </div>
        <!-- todo: setting menu -->
        <div class="setting_menu">
            <div class="settings_menu_inner">
                <div class="user_profile">
                    <img src="<?php echo !empty($image) ? htmlspecialchars($image) : 'image/default-avatar.png'; ?>" alt="">
                    <div>
                        <p>
                            <?php 
                                if(isset($_SESSION['user_id'])){
                                    $email=$_SESSION['user_id'];
                                    $query=mysqli_query($conn, "SELECT * FROM `users` WHERE users.id='$email'");
                                    while($row=mysqli_fetch_array($query)){
                                        echo $row['username'];
                                    }
                                }
                            ?> 
                        </p>
                        <a href="profile.php">Edit Profile</a>
                    </div>
                </div>
                <hr />
                <div class="setting_link">
                    <img src="image/information.png" class="setting_icon" alt="">
                    <a href="developers.html">Developers</a>
                </div>
                <div class="setting_link">
                    <img src="image/log-out.png" class="setting_icon" alt="">
                    <a href="logout_handler.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <!-- todo: Left SIdeBar Start -->
        <div class="left_sidebar">
            <div class="game_panel">
                <img src="image/game-controller.png" alt="">
                <h4>Games</h4>
            </div>

            <div class="important_link">
                <div class="game_card">
                    <a href="miniGames/MemoryGame/m-game.html">
                        <img src="image/MemoryGame.png" alt="">
                        <h3>Memory Game</h3>
                    </a>
                </div>
                <div class="game_card">
                    <a href="miniGames/PokémonFinder/pf-game.html">
                        <img src="image/PokémonFinder.png" alt="">
                        <h3>Pokémon Finder</h3>
                    </a>
                </div>
                
            </div>
        </div>
        <!-- todo: Left SIdeBar End -->

        <!-- todo: Main Content Start -->
        <div class="main_content">
            <div class="post_container_header">
                    <img src="image/podium.png" alt="">
                    <h1>Leaderboard</h1>
            </div>   
            
            <div class="post_container">
                <div class="post_row">
                    <h4>Progressive Mode</h4>
                    <div>
                        <img src="image/FUD.png" alt="">
                    </div>
                </div>
            </div>   

            <div class="post_container">
                <div class="post_row">
                    <h4>Tim-trial Mode</h4>
                    <div>
                        <img src="image/FUD.png" alt="">
                    </div>
                </div>
            </div>   
        </div>
        <!-- todo: Main Content End -->

        <!-- todo:  Right SidebarStart -->
        <div class="right_sidebar">
            <div class="sider_bar_title">
                <h4>Your Game Score</h4>
            </div>
            <div>
                <img src="image/FUD2.png" alt="">
            </div>
        </div>        
        <!-- todo: Right  SIdeBar End -->
<script src="js/home.js"></script>
</body>
</html>