<?php



    require_once "../baza.php";


    

    if (!isset($_POST['id']) || empty($_POST['id']))
    {
        die("Id nije prosledjen!");
    }

    if (!isset($_POST['title']) || empty($_POST['title']))
    {
        die("Naslov nije prosledjen!");
    }

    if (!isset($_POST['content']) || empty($_POST['content']))
    {
        die("Sadrzaj nije prosledjen!");
    }


    if (!isset($_POST['category_id']) || empty($_POST['category_id']))
    {
        die("Id kategorije nije prosledjen!");
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];


    $title = $baza->real_escape_string($title);

    $content = $baza->real_escape_string($content);

    $rezultat = $baza->query("UPDATE posts SET  title='$title', content='$content', category_id = '$category_id' WHERE id = $id");

  

    if ($rezultat)
    {
        echo "Uspesno azuriran post!";
    }
    else
    {
        echo "greska pri azuriranju!";
    }



    $post_id = $id;

    $baza->query("DELETE FROM post_tag WHERE post_id = $post_id");


    if (isset($_POST['tags']))
    {
        foreach ($_POST['tags'] as $tag_id)
        {
            $baza->query("INSERT INTO post_tag (post_id, tag_id) VALUES ($post_id, $tag_id)");
        }
    }