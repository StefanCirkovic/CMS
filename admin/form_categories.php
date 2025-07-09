<?php
    require_once "../baza.php";

    session_start();
   
    
    $rezultat = $baza->query("SELECT * FROM categories ORDER BY created_at DESC");
    $kategorije = $rezultat->fetch_all(MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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


    <form method="POST" action="categories.php">
        <input type="text" name="category" placeholder="Unesite  naziv kategorije" required>
        <button>Unesi kategoriju</button>


    <h2>Postojeće kategorije:</h2>
    <ul>
        <?php foreach ($kategorije as $kategorija): ?>
            <li><?= $kategorija['name'] ?> (<?= $kategorija['slug'] ?>)</li>
        <?php endforeach; ?>
    </ul>

    </form>
    
</body>
</html>