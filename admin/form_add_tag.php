<?php

    session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add tag</title>
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
    <a href="index.php">Admin Dashboard</a>


    <h2>Add Tag</h2>

    <form method="POST" action="add_tag.php">
        <label for="name">Ime taga:</label><br>
        <input type="text" name="name" id="name" placeholder="Unesite tag"required><br><br>

        <button>add</button>

    </form>

    <br>
    <a href="index.php">Nazad na admin dashboard</a>
    
</body>
</html>