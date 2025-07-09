<?php

    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }


    require_once "../baza.php";

    if(!isset($_POST['title']) || empty($_POST['title']))
    {
        die("Nije prosledjen naslov!");
    }


    if(!isset($_POST['content']) || empty($_POST['content']))
    {
        die("Nije prosledjen sadrzaj!");
    }

    if(!isset($_POST['category_id']) || empty($_POST['category_id']))
    {
        die("Nije prosledjen id kategorije!");
    }

    $category_id = $_POST['category_id'];
    $category_id = $baza->real_escape_string($category_id);

    $title = $_POST['title'];

    $title = $baza->real_escape_string($title);

    $content = $_POST['content'];

    $content = $baza->real_escape_string($content);


    $slug = strtolower($title);
    $slug = str_replace(' ', '-', $slug);

    $slug = $baza->real_escape_string($slug);



    if ($_SESSION['user'])
    {
        $user_id = $_SESSION['user']['id'];
    }
    else
    {
        header("location: ../Autentifikacija/form_login.php");
        exit();
    }


    $baza->query("INSERT INTO posts (title, slug, content, user_id, category_id) VALUES ('$title', '$slug', '$content', '$user_id', '$category_id' )");



    $post_id = $baza->insert_id; // ID novog posta za tabelu post_tag nam treba


    if(isset($_POST['tags']) &&  is_array($_POST['tags']))
    {
        $tags_id = $_POST['tags'];
        foreach($tags_id as $tag_id)
        {
            $tag_id = $baza->real_escape_string($tag_id);
            $baza->query("INSERT INTO post_tag (post_id, tag_id) VALUES ($post_id, $tag_id)");
        }
    }
