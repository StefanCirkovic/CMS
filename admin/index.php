<?php
    session_start();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
        if (isset($_SESSION['user_id']))
        {
            echo "<a href='../Autentifikacija/logout.php'>Logout</a>";
        } 
        else 
        {
            echo "<p><a href='../Autentifikacija/form_login.php'>Login</a></p>";
        }
    ?>
    <a href="posts.php">Manage posts</a>
    <a href="form_categories.php">Manage categories</a>
    <a href="manage_tags.php">Manage tags</a>
    <a href="manage_users.php">Manage users</a>
    
    
</body>
</html>