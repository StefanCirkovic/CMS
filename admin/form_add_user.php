<?php

    session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dodaj korisnika</title>
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


    <h2>Dodaj novog korisnika</h2>

    <form method="POST" action="add_user.php">
        <div>
            <label>Korisničko ime:</label><br>
            <input type="text" name="username" required>
        </div><br>

        <div>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </div><br>

        <div>
            <label>Lozinka:</label><br>
            <input type="password" name="password" required>
        </div><br>

        <div>
        <label>Uloga:</label><br>
        <select name="role" required>
            <option value="user">User</option>
            <option value="administrator">administrator</option>
            <option value="editor">Editor</option>
        </select>
        </div><br>


        <button type="submit">Dodaj korisnika</button>
    </form>

    <br>
    <a href="manage_users.php">Nazad na listu korisnika</a>
</body>
</html>