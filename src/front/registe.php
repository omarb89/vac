<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Inscription</h1>
        <form action="../form/traitement_inscription.php" method="post" enctype="multipart/form-data">
            <div class="champ">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" pattern="[a-zA-Z]+(?!_)(\s|-)?[a-zA-Z]+" required>
            </div>
            <div class="champ">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" pattern="[a-zA-Z]+(?!_)(\s|-)?[a-zA-Z]+" required>
            </div>
            <div class="champ">
                <label for="date_naissance">Date de naissance:</label>
                <input type="date" id="date_naissance" name="date_naissance" required>
            </div>
            <div class="champ">
                <label for="email">Adresse email:</label>
                <input type="email" id="email" name="email"
                    pattern="^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$"
                    required>
            </div>
            <div class="champ">
                <label for="motdepasse">Mot de passe:</label>
                <input type="password" id="motdepasse" name="motdepasse"
                    pattern="^(?!abcdef|qwerty|azerty|123456)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[&\$+\-*\/#~€%^!-_]).{15,36}$"
                    required>
            </div>
            <div class="champ">
                <label for="photo_profil">Photo de profil:</label>
                <input type="file" id="photo_profil" name="photo_profil" accept="image/*">
            </div>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>

</html>