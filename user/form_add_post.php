<?php

    require_once "../baza.php";

    $rezultat = $baza->query("SELECT * FROM categories ORDER BY created_at DESC");

    $kategorije = $rezultat->fetch_all(MYSQLI_ASSOC);

    session_start();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodavanje post-a</title>
</head>
<body>

    
    <?php
        if (isset($_SESSION['user_id']))
        {
            echo "<a href='../Autentifikacija/logout.php'>Logout</a></p>";
        } 
        else 
        {
            echo "<p><a href='../Autentifikacija/form_login.php'>Login</a></p>";
        }
    ?>
    

    <form method="POST" action="add_post.php">
        <input type="text" name="title" placeholder="Unesite naslov" required>
        <input type="text" name="content" placeholder="Unesite sadrzaj" required>
        <select name="category_id" required>
            <option value=""disabled selected>Izaberite kategoriju</option>
            <?php foreach($kategorije as $kategorija): ?>
                <option value="<?=   $kategorija['id']    ?>"><?=  $kategorija['name']   ?></option>

            <?php endforeach; ?>
        </select>
        <button>Objavi</button>
    </form><br>

    <a href="index.php">Nazad na listu postova</a>
    
</body>
</html>