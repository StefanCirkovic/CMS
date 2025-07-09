<?php

    require_once "../baza.php";


    if(!isset($_POST['email']) || empty($_POST['email']))
    {
        die("Email nije prosljedjen!");
    }


    if(!isset($_POST['password']) || empty($_POST['password']))
    {
        die("Sifra nije prosljedjena!");
    }

      if(!isset($_POST['username']) || empty($_POST['username']))
    {
        die("username nije prosljedjen!");
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);

    $username = $baza->real_escape_string($username);
    $email = $baza->real_escape_string($email);
    $password = $baza->real_escape_string($password);

    $provera = $baza->query("SELECT * FROM users WHERE email = '$email'");


    if ($provera->num_rows > 0)
    {
        die("Ovaj email je zauzet, izaberite drugi!");
    }
    else
    {
        $baza->query("INSERT INTO users (username, email, password) VALUES ('$username','$email', '$password')");
        header("Location: ../index.php");
    
    }


    

  
    














?>

