<?php


require_once "../baza.php";

session_start();




if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    die("Post nije pronađen!");
}

$slug = $baza->real_escape_string($_GET['slug']);

$rezultat = $baza->query("SELECT * FROM posts WHERE slug = '$slug' LIMIT 1");

if ($rezultat->num_rows === 1) {
    $post = $rezultat->fetch_assoc();
} else {
    die("Post nije pronađen!");
}

$post_id = $post['id'];


$rezultat_tagova = $baza->query("SELECT tags.name  FROM tags
 JOIN post_tag ON  tags.id = post_tag.tag_id
 WHERE post_tag.post_id = $post_id");


$tagovi = $rezultat_tagova->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= $post['title'] ?></title>
</head>
<body>
    <?php
        if (isset($_SESSION['user_id']))
        {
            echo "<a href='../Autentifikacija/logout.php'>Logout</a>";
        } 
        else 
        {
            echo "<p><a href='../Autentifikacija/form_login.php'>Login</a></p>";
        }
    ?>
    <h1><?= $post['title'] ?></h1>
    <p><?= $post['content'] ?></p>
    <ul>
        <?php  foreach($tagovi as $tag):    ?>
            <li><?=  $tag['name'] ?></li>
        <?php  endforeach;    ?>
    </ul>
    <a href="index.php">Nazad na listu postova</a>
</body>
</html>
