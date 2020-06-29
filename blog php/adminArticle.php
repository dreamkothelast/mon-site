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
                <a href="adminArticle.php">Gestion d'article</a>
                <a href="admin.php">Admin</a>
            </div>
        </div>
        <div>
            <h1 class="center titrePage">Gestion Articles</h1>
            <div class="container">
                <form method="post">
                    <input type="text" name="recherche" class="inputRecherche">
                    <br>
                    <input type="submit" value="Rechercher" class="inputRecherche">
                </form>
            </div>
        </div>
        
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=articlesblog', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $result2 = $pdo->query("SELECT * FROM articles");
        
        /*echo "<div class='container'>";
        echo "<div class='row'>";
        while ($listeArticles = $result2->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='col-sm-4 fondBlanc'>";
            echo "<h2 class='titre center'>" . $listeArticles["titre"] . "</h2>";
            echo "<img class='image' src='".$listeArticles["photo"]."'>";
            echo "<div class='auteurBlock'>";
            echo "<a class='center auteur'>" . $listeArticles["auteur"] . "</a><br>";
            echo "</div>";
            echo "<div class='dateBlock'>";
            echo "<a class='date'>Publier le <strong>" . $listeArticles["date"] . " </strong></a>";
            echo "</div>";
            echo "<p class='description'>" . $listeArticles["description"] . " </p>";
            echo "<p class='categorie'># " . $listeArticles["categorie"] . " </p>";
            echo "<a href='?delete=$listeArticles[id]'>Supprimer</a>";
            
            if(!empty($_GET['delete'])) {
                $delete = $_GET['delete'];
                $pdo->exec("DELETE FROM articles WHERE id = $delete ");
                header("location:" . "adminArticle.php");
            }
            
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";*/
        
        if (!empty($_POST['recherche'])) {
        echo "<div class='container'>";
        echo "<div class='row'>";
        while ($listeArticles = $result2->fetch(PDO::FETCH_ASSOC)) {
            if (strstr($listeArticles['description'], $_POST['recherche'])) {
            echo "<div class='col-sm-4 fondBlanc'>";
            echo "<h2 class='titre center'>" . $listeArticles["titre"] . "</h2>";
            echo "<img class='image' src='".$listeArticles["photo"]."'>";
            echo "<div class='auteurBlock'>";
            echo "<a class='center auteur'>" . $listeArticles["auteur"] . "</a><br>";
            echo "</div>";
            echo "<div class='dateBlock'>";
            echo "<a class='date'>Publier le <strong>" . $listeArticles["date"] . " </strong></a>";
            echo "</div>";
            echo "<p class='description'>" . $listeArticles["description"] . " </p>";
            echo "<p class='categorie'># " . $listeArticles["categorie"] . " </p>";
            echo "<a href='?delete=$listeArticles[id]'>Supprimer</a>";
            
            if(!empty($_GET['delete'])) {
                $delete = $_GET['delete'];
                $pdo->exec("DELETE FROM articles WHERE id = $delete ");
                header("location:" . "adminArticle.php");
            }
            
            echo "</div>";
            }
        }
        echo "</div>";
        echo "</div>";
        }
        else {
        echo "<div class='container'>";
        echo "<div class='row'>";
        while ($listeArticles = $result2->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='col-sm-4 fondBlanc'>";
            echo "<h2 class='titre center'>" . $listeArticles["titre"] . "</h2>";
            echo "<img class='image' src='".$listeArticles["photo"]."'>";
            echo "<div class='auteurBlock'>";
            echo "<a class='center auteur'>" . $listeArticles["auteur"] . "</a><br>";
            echo "</div>";
            echo "<div class='dateBlock'>";
            echo "<a class='date'>Publier le <strong>" . $listeArticles["date"] . " </strong></a>";
            echo "</div>";
            echo "<p class='description'>" . $listeArticles["description"] . " </p>";
            echo "<p class='categorie'># " . $listeArticles["categorie"] . " </p>";
            echo "<a href='?delete=$listeArticles[id]'>Supprimer</a>";
            
            if(!empty($_GET['delete'])) {
                $delete = $_GET['delete'];
                $pdo->exec("DELETE FROM articles WHERE id = $delete ");
                header("location:" . "adminArticle.php");
            }
            
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        }
        
        ?>
    </body>
</html>