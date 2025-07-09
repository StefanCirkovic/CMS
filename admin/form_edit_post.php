
<?php

    require_once "../baza.php";

    session_start();

    
    if (!isset($_GET['id']) || empty($_GET['id']))
    {
        die("ID post-a nije prosledjen!");
    }


    $post_id = $_GET['id'];
    $rezultat = $baza->query("SELECT * FROM posts WHERE id='$post_id'");

    if ($rezultat->num_rows == 0)
    {
        die("Post nije pronadjen!");
    }

    $post = $rezultat->fetch_assoc();

    $rezultat = $baza->query("SELECT * FROM categories ORDER BY created_at DESC");
    $kategorije = $rezultat->fetch_all(MYSQLI_ASSOC);



    $rezultat_tagova = $baza->query("SELECT * FROM tags ORDER BY name ASC");
    $svi_tagovi = $rezultat_tagova->fetch_all(MYSQLI_ASSOC);

    $post_id = $post['id'];
    $rezultat_mojih = $baza->query("SELECT tag_id FROM post_tag  WHERE post_id = $post_id");
    $moji_tagovi = $rezultat_mojih->fetch_all(MYSQLI_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit post</title>
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

    <h2>Edit post</h2>

    <form method="POST" action="edit_post.php">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">


        <label>Naslov</label><br>
        <input type="text" name="title" value="<?= $post['title'] ?>"><br><br>


        <label>Sadrzaj</label><br>
        <textarea type="text" name="content"></textarea><br><br>


        <label>Kategorija</label><br>
        <select name="category_id" required>
            <option value=""disabled selected>Izaberite kategoriju</option>
            <?php foreach($kategorije as $kategorija): ?>
                <option value="<?= $kategorija['id'] ?>" <?= $kategorija['id'] == $post['category_id'] ? 'selected' : '' ?>>
                    <?= $kategorija['name'] ?></option>
                        

            <?php endforeach; ?>
        </select><br><br>
        
        <?php   foreach($svi_tagovi as $tag):     ?>
            <?php
                $checked = "";
                foreach ($moji_tagovi as $moj)
                {
                    if ($moj['tag_id'] == $tag['id'])
                    {
                        $checked = 'checked';
                        break;
                    }
                }
            ?>
             <label>
                <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>" <?= $checked ?>>
                <?= $tag['name'] ?>
            </label><br>

        <?php   endforeach;    ?>



        <button type="submit">Sačuvaj izmene</button>


    </form>
    
</body>
</html>