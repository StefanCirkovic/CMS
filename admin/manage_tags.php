<?php


    require_once "../baza.php";

    session_start();

   

    $rezultat = $baza->query("SELECT * FROM tags ORDER BY created_at DESC");

    $tagovi = $rezultat->fetch_all(MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage tags</title>
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

    <h1>Upravljanje tagovima</h1>

    <p><a href="form_add_tag.php">Dodaj novi tag</a></p>

    <h2>Svi tagovi:</h2>


    <?php    foreach($tagovi as $tag):  ?>
        <div>
            <strong><?=  $tag['name']   ?></strong>
            - Kreiran: <?= $tag['created_at'] ?>
            <a href="delete_tag.php?id=<?= $tag['id'] ?>" onclick="return confirm('Da li si siguran da zelis da obrises?')">Obrisi</a>
        </div>
        <br>
    <?php   endforeach;   ?>
    
</body>
</html>