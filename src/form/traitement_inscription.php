<?php
use Src\Classes\User;

require_once (__DIR__ . "/../../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nom'] ?? '';
    $lastName = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['motdepasse'] ?? '';
    $dateOfBirthString = $_POST['date_naissance'] ?? '';
    $photo = $_FILES['photo_profil'] ?? '';

    $name = htmlspecialchars($name);
    $lastName = htmlspecialchars($lastName);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $dateOfBirthString = htmlspecialchars($dateOfBirthString);

    $validName = preg_match("/^[a-zA-Z]+(?!_)(\s|-)?[a-zA-Z]+$/", $name);
    $validLastName = preg_match("/^[a-zA-Z]+(?!_)(\s|-)?[a-zA-Z]+$/", $lastName);
    $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $validPassword = preg_match("/^(?!abcdef|qwerty|azerty|123456)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[&\$+\-*\/#~€%^!-_]).{15,36}$/", $password);



    if ($validName && $validLastName && $validEmail && $validPassword) {
        // Vérifier si la date de naissance est valide
        if (!empty($dateOfBirthString)) {
            $dateOfBirth = new DateTime($dateOfBirthString);
            $now = new DateTime();
            $age = $now->diff($dateOfBirth)->y;
            if ($age >= 18 && $age < 130) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $user = new User();
                $user->setName($name)
                    ->setLastName($lastName)
                    ->setDateOfBirth($dateOfBirth)
                    ->setEmail($email)
                    ->setPassword($hashedPassword);
                $entityManager->persist($user);
                $entityManager->flush();
                echo "Inscription réussie";
            } else {
                echo "L'âge doit être compris entre 18 et 130 ans.";
            }
        } else {
            echo "La date de naissance est invalide.";
        }
    } else {
        echo "Veuillez saisir des informations valides.";
    }
}
