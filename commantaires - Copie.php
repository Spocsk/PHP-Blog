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

            $answer = $db->prepare('SELECT commentaire, auteur, id_commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM commentaires_post WHERE id_commentaire = ? ');
            $answer->execute(array($_GET['id_commentaire']));

            while ($data = $answer->fetch())
            {
                
            ?>

            <div class='news'>
                <h3><?php echo $data['auteur'] . ' - ' . $data['date_creation'] ?></h3> 
                <p><?php echo $data['commentaire'] ?></p>
                
            </div>
            
            <?php
            }
            ?>

            <a href="blog.php">Retour blog !</a>

    </body>
</html>