<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Articles-admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/body.css">
        <link rel="stylesheet" href="css/admin.css">
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
        
        <form method="post" class="blockAdmin">
            <p><strong>Titre</strong></p>
            <input type="text" name="titre" class="input">
            <p><strong>Photo</strong></p>
            <input type="text" name="photo" class="input">
            <p><strong>Description</strong></p>
            <input type="text" name="description" class="input">
            <p><strong>Categorie</strong></p>
            <input type="text" name="categorie" class="input">
            <p><strong>Auteur</strong></p>
            <input type="text" name="auteur" class="input">
            <p><strong>Date</strong></p>
            <input type="date" name="date" class="input">
            <br><br><br>
            <input type="submit" name="Enregistrer" class="input">
        </form>
        
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=articlesblog', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        if (!empty($_POST['titre'])) {
            $result = $pdo->prepare('INSERT INTO articles (titre, photo, description, categorie, auteur, date) VALUES (:titre, :photo, :description, :categorie, :auteur,  :date)');
            $result->execute(array(
                'titre' => $_POST['titre'],
                'photo' => $_POST['photo'],
                'description' => $_POST['description'],
                'categorie' => $_POST['categorie'],
                'auteur' => $_POST['auteur'],
                'date' => $_POST['date']
            ));
            echo "<p class='center'><strong>L'article $_POST[titre] a été Enregister !!! </strong></p>";
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