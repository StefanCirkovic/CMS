<?php

    require_once "../baza.php";

    session_start();


    $rezultat = $baza->query("SELECT id, title, slug, content, created_at FROM posts ORDER BY  created_at DESC");

    $posts = $rezultat->fetch_all(MYSQLI_ASSOC);




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
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
    <a href="index.php">Admin Dashboard</a>


    <h1>Upravljanje postovima</h1>

    <p><a href="form_add_post.php">Dodaj novi post</a></p>



    <?php   if(count($posts) > 0):       ?>
        <?php  foreach($posts as $post):   ?>
            <h1><a href="post.php?slug=<?= $post['slug']  ?>"><?= $post['title']       ?> </a></h1>
            <p><?=    $post['content']     ?></p>
            <a href="form_edit_post.php?id=<?= $post['id']  ?>">Edit</a>

            <form style="display:inline;" method="POST" action="delete_post.php">
            <input  type="hidden" name="id" value="<?= $post['id'] ?>">
            <button type="submit">Delete</button>
            </form>




        <?php  endforeach;    ?>

        
    <?php   else:     ?>
        <p>Nema postova za prikaz!</p>
    <?php   endif;     ?>
    
</body>
</html>