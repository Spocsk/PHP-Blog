<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_blog.css">
    <title>Blog - Spocsk - V1</title>
</head>
    <body>

        <h1>Blog test Spocsk</h1>

        <?php
            ini_set('display_errors', TRUE);

            $db = new PDO('mysql:host=localhost;dbname=database_name','username','password');

            $answer = $db->query('SELECT id, titre, contenu ,DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM blog_post ORDER BY id  DESC LIMIT 0,10');
            while ($data = $answer->fetch())
            {
                
            ?>

            <div class='news'>
                <h3><?php echo $data['titre'] . ' - ' . $data['date_creation'] ?></h3> 
                <p><?php echo $data['contenu'] ?></p>
                <a href="commantaires.php?id_commentaire=<?php echo $data['id']; ?>">Commentaires</a>
            </div>
            
            <?php
            }
            ?>


    </body>
</html>