<?php


    require_once "../baza.php";


    if (!isset($_POST['id']) || empty($_POST['id']))
    {
        die("Nije prosledjen id!");
    }


    $id = $_POST['id'];

    $rezultat = $baza->query("DELETE FROM posts WHERE id = $id");

    if ($rezultat)
    {
        
        header("Location: posts.php");
    }
    else
    {
        echo "Doslo je do greske post nije izbrisan!";
    }