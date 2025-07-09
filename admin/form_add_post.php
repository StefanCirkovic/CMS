<?php

    require_once "../baza.php";


   session_start();

    $rezultat = $baza->query("SELECT * FROM categories ORDER BY created_at DESC");

    $kategorije = $rezultat->fetch_all(MYSQLI_ASSOC);


    $rez = $baza->query("SELECT * FROM tags ORDER BY name ASC");
    $tagovi = $rez->fetch_all(MYSQLI_ASSOC);



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
            echo "<a href='../Autentifikacija/logout.php'>Logout</a>";
        } 
        else 
        {
            echo "<p><a href='../Autentifikacija/form_login.php'>Login</a></p>";
        }
    ?>
    <a href="index.php">Admin Dashboard</a>


    <form method="POST" action="add_post.php">
        <div>
            <input type="text" name="title" placeholder="Unesite naslov" required>
        </div>
        <div>
            <input type="text" name="content" placeholder="Unesite sadrzaj" required>
        </div>

        <div>
            <select name="category_id" required>
                <option value=""disabled selected>Izaberite kategoriju</option>
                <?php foreach($kategorije as $kategorija): ?>
                    <option value="<?=   $kategorija['id']    ?>"><?=  $kategorija['name']   ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
                
            
            
            <?php foreach($tagovi as $tag):  ?>
                <label>
                    <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>">
                    <?=  $tag['name'];  ?>
                </label><br>


            <?php  endforeach;   ?>
        </div>

        <div>
            <button>Objavi</button>
        </div>
    </form>
    
</body>
</html>