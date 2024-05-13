<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header class="container-fluid bg-dark text-white p-3">
        <div class="row">
            <div class="col-md-6">
                <h1>Actualités</h1>
            </div>
            <div class="col-md-6 text-end">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="../form/franceinfo.php">France Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../form/lemonde.php">Le Monde</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../form/symfony.php">Symfony</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../form/favoris.php">Articles Favoris</a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    // Démarrer la session
                                    session_start();

                                    if (isset($_SESSION['user_firstname'])) {
                                        $messageBienvenue = "Bonjour " . $_SESSION['user_firstname'] . " " . $_SESSION['user_name'];
                                        echo '<span class="navbar-text">' . $messageBienvenue . '</span>';
                                    } else {
                                        header("Location: ../front/authentication.php");
                                        exit();
                                    }
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mt-3">
        <div class="row">
            <?php

            use Src\Classes\News;

            // Inclure la classe News
            require_once '../classes/News.php';
            require_once '../../bootstrap.php';


            // Chemin vers le fichier JSON
            $jsonFilePath = '../data/franceinfo.json';

            // Lire le contenu du fichier JSON
            $jsonData = file_get_contents($jsonFilePath);

            // Décoder le contenu JSON en un tableau associatif
            $dataArray = json_decode($jsonData, true);

            // Récupérer les informations de tous les articles
            $articles = $dataArray['rss']['channel']['item'];

            // Parcourir chaque article
            foreach ($articles as $articleData) {
                // Créer une instance de la classe News pour chaque article
                $news = new News();

                // Définir les propriétés de l'objet News avec les valeurs de l'article actuel
                $news->setTitle($articleData['title']);
                $news->setContent($articleData['description']);
                $news->setPublicationDate(new DateTime($articleData['pubDate']));
                // $news->setAuthor($articleData['author']);
                $news->setUrl($articleData['link']);
                $news->setImage($articleData['enclosure']);
                $news->setIsFavorite(false);

                // Persister l'entité dans la base de données
                $entityManager->persist($news);
                // Appliquer les changements à la base de données
                $entityManager->flush();

                // Afficher l'article avec Bootstrap
                echo '<div class="col-md-6 mb-3">
          <div class="card">
            <img src="' . $news->getImage() . '" class="card-img-top" alt="' . $news->getTitle() . '">
            <div class="card-body">
              <h5 class="card-title">' . $news->getTitle() . '</h5>
              <p class="card-text">' . $news->getContent() . '</p>
              <a href="' . $news->getUrl() . '" class="btn btn-primary">Lire l\'article</a>
              <button class="btn btn-outline-secondary btn-favorite" data-article="' . $news->getId() . '">Ajouter aux favoris</button>
            </div>
          </div>
        </div>';
            }
            ?>
        </div>
    </main>

    <footer class="container-fluid bg-dark text-white p-3">
        <p>&copy; 2024 - Flux RSS - France Info</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnik
    </script>
</body>

</html>