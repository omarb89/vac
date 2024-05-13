<?php

require_once "../../vendor/autoload.php";
require_once "../../bootstrap.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Src\Classes\User;

// Démarrer la session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Recherche de l'utilisateur dans la base de données
    $userRepository = $entityManager->getRepository(User::class);
    $user = $userRepository->findOneBy(['email' => $email]);

    if ($user) {
        // Utilisateur trouvé, vérifier le mot de passe
        if (password_verify($motdepasse, $user->getPassword())) {
            // Authentification réussie
            // Stocker les informations de l'utilisateur en session
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_firstname'] = $user->getName();
            $_SESSION['user_name'] = $user->getLastname();

            // Redirection vers la page souhaitée
            header("Location: ../form/franceinfo.php"); // Correction : changer la redirection vers franceinfo.php
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect";
        }
    } else {
        // Utilisateur non trouvé
        echo "Utilisateur non trouvé";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container connexion">
        <h1>Connexion</h1>
        <form action="" method="post">
            <div class="champ">
                <label for="email">Adresse email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="champ">
                <label for="motdepasse">Mot de passe:</label>
                <input type="password" id="motdepasse" name="motdepasse" required>
            </div>
            <button type="submit">Se connecter</button>
            <a href="registe.php">Inscription</a>
        </form>
    </div>
</body>

</html>