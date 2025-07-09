<?php


    require_once "../baza.php";


    if (!isset($_POST['name']) || empty($_POST['name']))
    {
        die("Nije prosledjeno ime taga!");
    }


    $tag_name = $_POST['name'];

    $tag_name = trim($baza->real_escape_string($tag_name));


    $add_tag = $baza->query("INSERT INTO tags (name) VALUES ('$tag_name')");

    if($add_tag)
    {
        echo "Tag uspesno dodat! <a href='form_add_tag.php'>Dodaj jos jedan</a> <a href='index.php'>Vrati se na admin dashboard</a>";
    }
    else
    {
        echo "Greska prilikom dodavanja taga!";
    }




    