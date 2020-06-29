<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Articles-admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/body.css">
    </head>
    
    <body>
        <div class="topnav">
            <a href="accueil.php">Accueil</a>
            <a href="blog.php">Blog</a>

            <div class="topnav-right">
                <a href="admin.php">Admin</a>
            </div>
        </div>
     
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=articlesblog', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        if(!empty($_GET['id'])) {
            $result = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
            $result->execute(array(
                'id' => $_GET['id']
            ));
            
            echo "<div class='container'>";
            echo "<div class='row'>";
            while ($listeArticles = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<h2 class='titre'>" . $listeArticles["titre"] . "</h2>";
                //echo "<div class='scotch'><img src='img/bout-de-scotch.png'></div>";
                echo "<img class='image' src='".$listeArticles["photo"]."'>";
                echo "<div class='auteurBlock'>";
                echo "<a class='center auteur'>" . $listeArticles["auteur"] . "</a><br>";
                echo "</div>";
                echo "<div class='dateBlock'>";
                echo "<a class='date'>Publier le <strong>" . $listeArticles["date"] . " </strong></a>";
                echo "</div>";
                echo "<p class='description'>" . $listeArticles["description"] . " </p>";
                echo "<p class='categorie'># " . $listeArticles["categorie"] . " </p><br/><br/>";
                //echo "<div><a href='blog.php'>Retour</a></div>";
            }
            echo "</div>";
            echo "</div>";
        }
        else {
            echo "<style>body {background-color:#FEFEFE;}</style>";
            echo "<img class='center' style='width:100%;' src='img/page404.png'>";
        }
        ?>
        <footer class="page-footer font-small special-color-dark pt-4">
            <div class="container">
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="https://mdbootstrap.com/education/bootstrap/"> Davdavetmimine corporation</a>
                </div>
            </div>
        </footer>
    </body>
</html>