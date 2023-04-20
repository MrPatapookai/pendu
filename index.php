<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jeu du pendu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1>Jeu du pendu</h1>
    </header>
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
            // L'utilisateur est connecté
        ?>
            <div class="card">
                <h2>Mon profil</h2>
                <p>Bienvenue, <?php echo $_SESSION["username"]; ?> !</p>
                <a href="deconnexion.php" class="button">Se déconnecter</a>
            </div>
        <?php
        } else {
            // L'utilisateur n'est pas connecté
        ?>
            <div class="card">
                <h2>Connexion</h2>
                <form method="post" action="connexion.php">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="username" id="username" name="username" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" value="Se connecter" class="button">
                </form>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <h2>Jouer</h2>
            <p>Cliquez ici pour commencer une nouvelle partie.</p>
            <a href="jeu.html" class="button">Jouer</a>
        </div>
        <div class="card">
            <h2>Règles</h2>
            <p>Découvrez comment jouer au jeu du pendu.</p>
            <a href="regles.html" class="button">Règles</a>
        </div>
        <div class="card">
            <h2>Score</h2>
            <p>Voyez où vous en êtes dans le classement.</p>
            <a href="score.php" class="button">Score</a>
        </div>
    </div>
</body>

</html>