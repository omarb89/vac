<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Favoris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header class="container-fluid bg-dark text-white p-3">
        <div class="row">
            <div class="col-md-6">
                <h1>Articles Favoris</h1>
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
                                    <a class="nav-link" href="franceinfo.php">France Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="lemonde.php">Le Monde</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="symphony.php">Symfony</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="favoris.php">Articles Favoris</a>
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
    </main>

    <footer class="container-fluid bg-dark text-white p-3">
        <p>&copy; 2024 - Articles Favoris</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>