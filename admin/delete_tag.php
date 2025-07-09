<?php



    require_once "../baza.php";


    if(!isset($_GET['id']) || empty($_GET['id']))
    {
        die("ID taga nije prosledjen!");
    }


    $id = $_GET['id'];



    $rezultat = $baza->query("DELETE * FROM tags WHERE id = $id");


    if ($rezultat)
    {
        echo "Rezultat uspesno obrisan! <a href='manage_tags.php'>Nazad</a>";
    }
    else
    {
        echo "Greska pri brisanju!";
    }
