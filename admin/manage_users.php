<?php

    require_once "../baza.php";

    session_start();


    $rezultat = $baza->query("SELECT * FROM users ORDER BY created DESC");
    $korisnici = $rezultat->fetch_all(MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage users</title>
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
    <h1>Upravljanje korisnicima</h1>

    <p><a href="form_add_user.php">Dodaj novog korisnika</a></p>

    <h2>Svi korisnici:</h2>

    <?php foreach($korisnici as $korisnik): ?>
        <div>
            - Email: <?= $korisnik['email']   ?>
            - Kreiran: <?= $korisnik['created']  ?>
            <a href="delete_user.php?id=<?= $korisnik['id']  ?>"
             onclick="return confirm('Da li si siguran da zelis da obrises korisnika?')">[Obrisi]</a>
        </div>
        <br>
    <?php   endforeach;   ?>


    <a href="index.php">Nazad na admin dashboard</a>
    
</body>
</html>