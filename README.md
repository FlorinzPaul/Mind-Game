# Mind-Game Platform

## Overview
Mind Game is a mini-game platform designed to improve your memory and cognitive skills, all while immersing you in a fun and challenging experience. With engaging visuals and dynamic gameplay, it’s the perfect blend of entertainment and mental exercise to sharpen your mind and test your skills.

## Features
- User registration and login
- Profile management
- Memory game with Progressive and Time Trial modes
- Responsive design

## Setup

### Prerequisites
- A web server (e.g., XAMPP, WAMP, or a live server)
- PHP and MySQL for backend functionality

### Installation
1. Clone the repository or download the project files.
2. Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP).
3. Import the provided SQL file to set up the database.
4. Update the database connection details in `connect.php`.

### Database Setup
1. Create a database named `mind_game`.
2. Import the SQL file (`mind_game.sql`) to create the necessary tables:
   ```sql
   CREATE TABLE `users` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `username` varchar(50) NOT NULL,
     `email` varchar(100) NOT NULL,
     `password` varchar(255) NOT NULL,
     `profile_pic` varchar(255) DEFAULT NULL,
     PRIMARY KEY (`id`)
   );

   CREATE TABLE `timer_mode` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `user_id` int(11) NOT NULL,
     `difficulty` varchar(50) NOT NULL,
     `time_score` int(11) NOT NULL,
     PRIMARY KEY (`id`)
   );

   CREATE TABLE `progressive_mode` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `user_id` int(11) NOT NULL,
     `score` int(11) NOT NULL,
     `level` int(11) NOT NULL,
     PRIMARY KEY (`id`)
   );

How to Use
User Registration and Login
1. Open the index.php page in your web browser.
2. Click on the "Register" link to create a new account.
3. Fill in the registration form and submit.
4. After successful registration, log in using your email and password.

Profile Management
1. After logging in, navigate to the profile page.
2. Update your profile picture and username as needed.
3. Delete your account if desired.

Directory Structure:(note: Read Raw)

v1.0.4/
 ├── css/
 │   ├── developer.css
 │   ├── home.css
 │   ├── landing.scc
 │   ├── login.css
 │   └── profile.css
 ├── database/
 │   └── mind_game_db.sql
 ├── image/
 │   ├── default-avatar.png
 │   ├── design.gif
 │   ├── FUD.png
 │   ├── FUD2.png
 │   ├── game-controller.png
 │   ├── information.png
 │   ├── log-out.png
 │   ├── MemoryGame.png
 │   ├── podium.png
 │   └── PokémonFinder.png
 ├── img/
 │   ├── 67700b0ebcee.jpg.
 │   └── ...ect // this is the directory to store uploaded profile img.
 ├── js/
 │   ├── home.js
 │   ├── login.js
 │   └── profile.js
 ├── miniGames/
 │   └── MemoruGame/
 │       ├── assets/
 │       │   ├── Decorator/
 │       │   │   ├── decorator-hr-lg.png
 │       │   │   ├── decorator-hr.png
 │       │   │   ├── decorator-left.png
 │       │   │   └── decorator-right.png
 │       │   ├── card-back.png
 │       │   ├── League of Legends Icon.svg
 │       │   └── LOL.mp4
 │       ├── about.css
 │       ├── about.html
 │       ├── m-game.css
 │       ├── m-game.html
 │       ├── m-game.js
 │       └── riot-api.js
 ├── connect.php
 ├── delete_account_handler.php
 ├── developers.html
 ├── home.php
 ├── index.php
 ├── logout.php
 ├── profile.php
 ├── sign_in_out_handler.php
 └── update_profile_handler.php
