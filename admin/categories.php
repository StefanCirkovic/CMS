<?php
    require_once "../baza.php";

    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $kategorija = $_POST['category'];

        $slug = strtolower($kategorija);
        $slug = str_replace(' ', '-', $slug);

        $kategorija = $baza->real_escape_string($kategorija);
        $slug = $baza->real_escape_string($slug);

        $baza->query("INSERT INTO categories (name, slug) VALUES ('$kategorija', '$slug')");
    }

 
    header("Location: form_categories.php");
    exit();

