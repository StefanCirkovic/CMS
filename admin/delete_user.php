<?php



    require_once "../baza.php";


    if(!isset($_GET['id']) || empty($_GET['id']))
    {
        die("ID korisnika nije prosledjen!");
    }


    $id = $_GET['id'];


    $rezultat = $baza->query("DELETE  FROM users WHERE id='$id'");


    if ($rezultat)
    {
        echo "Korisnik uspesno obrisan! <a href='manage_users.php'>Nazad na listu</a>";
    }
    else
    {
        echo "Korisnik nije obrisan doslo je do greske!";
    }

