<?php

// Inclure les dépendances
require_once '../../vendor/autoload.php';
require_once '../../bootstrap.php';
use Src\Classes\News;
use Src\Classes\User;

// Chemin vers le fichier JSON RSS
$jsonFilePath = '../../src/data/franceinfo.json';
$jsonFilePath = '../../src/data/lemonde.json';

// Lire le contenu du fichier JSON
$jsonData = file_get_contents($jsonFilePath);

// Décoder le contenu JSON en un tableau associatif
$dataArray = json_decode($jsonData, true);

// Récupérer les informations de tous les articles
$articles = $dataArray['rss']['channel']['item'];

// Instancier un objet User
$user = new User();
// Définir les propriétés de l'utilisateur
$user->setId(1); // Exemple d'ID
$user->setName('John Doe'); // Exemple de nom

// Parcourir chaque article
foreach ($articles as $articleData) {
    // Créer une instance de l'entité News
    $news = new News();

    // Définir les propriétés de l'entité avec les valeurs de l'article actuel
    $news->setTitle($articleData['title']);
    $news->setContent($articleData['description']);
    $news->setPublicationDate(new DateTime($articleData['pubDate']));
    // $news->setAuthor($articleData['author']);
    $news->setUrl($articleData['link']);
    $news->setImage($articleData['enclosure']);
    $news->setUser($user);

    // Persister l'entité dans la base de données
    // $entityManager->persist($user);
    $entityManager->persist($news);
}

// Appliquer les changements à la base de données
$entityManager->flush();

echo "Données insérées avec succès dans la base de données.";
