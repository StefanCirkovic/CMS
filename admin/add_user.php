<?php

    require_once "../baza.php";


    if(!isset($_POST['username']) || empty($_POST['username']))
    {
        die("Niste prosledili username!");
    }

    if(!isset($_POST['email']) || empty($_POST['email']))
    {
        die("Niste prosledili email!");
    }

    if(!isset($_POST['password']) || empty($_POST['password']))
    {
        die("Niste prosledili password!");
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    $password = password_hash($password, PASSWORD_BCRYPT);

    $username = $baza->real_escape_string($username);
    $email = $baza->real_escape_string($email);
    $password = $baza->real_escape_string($password);

    $provera = $baza->query("SELECT * FROM users WHERE email='$email' OR  username='$username'");

    if ($provera->num_rows > 0)
    {
        echo "Ovaj email ili username je vec zauzet <a href='form_add_user.php'>Pokusaj ponovo</a>";
    }
    else
    {
        $rezultat = $baza->query("INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
    }


    if ($rezultat)
    {
        echo "Korisnik uspešno dodat! <a href='manage_users.php'>Nazad na listu</a>";
    }
    else
    {
        echo "greska pri dodavanju!";
    }