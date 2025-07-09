<?php

    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }



    require_once "../baza.php";

    if(!isset($_POST['username']) || empty($_POST['username']))
    {
        die("Username nije prosljedjen!");
    }


    if(!isset($_POST['email']) || empty($_POST['email']))
    {
        die("Email nije prosljedjen!");
    }


    if(!isset($_POST['password']) || empty($_POST['password']))
    {
        die("Sifra nije prosljedjena!");
    }

    $username = $_POST['username'];
    $username = $baza->real_escape_string($username);


    $email = $_POST['email'];
    $email = $baza->real_escape_string($email);

    $password = $_POST['password'];
    $password = $baza->real_escape_string($password);



    $email_provera = $baza->query("SELECT * FROM users WHERE email ='$email'");

    if($email_provera->num_rows > 0)
    {

        $korisnik = $email_provera->fetch_assoc();

        
        if (password_verify($password, $korisnik['password']))
        {
            $_SESSION['user'] = $korisnik;
            $_SESSION['user_id'] = $korisnik['id'];
            
            if ($korisnik['role'] == 'administrator')
            {
                header("Location: ../admin/index.php");
            }
            else {
                header("Location: ../user/index.php");
            }
        }
        else
        {
            die("Sifra je pogresna!");
        }
    }
    else
    {
        die("Email je pogresan!");
    }


    