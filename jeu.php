<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Jeu du pendu - Jeu</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body class="jeu">
    <div class="container">
        <header class="jeu">
            <h1>Jeu du Pendu</h1>
        </header>
        <main>
            <div class="game-container">
                <div class="word-container">
                    <p class="word"></p>
                </div>
                <div class="input-container">
                    <label for="letter-input">Entrez une lettre : </label>
                    <input type="text" id="letter-input">
                    <button id="submit-button">Valider</button>
                </div>
                <div class="hangman-container">
                    <svg height="250" width="200" id="hangman">
                        <line x1="10" y1="220" x2="80" y2="220" stroke="black" stroke-width="4" />
                        <line x1="45" y1="220" x2="45" y2="20" stroke="black" stroke-width="4" />
                        <line x1="45" y1="20" x2="130" y2="20" stroke="black" stroke-width="4" />
                        <line x1="130" y1="20" x2="130" y2="50" stroke="black" stroke-width="4" />
                        <circle cx="130" cy="70" r="20" stroke="black" stroke-width="4" fill="white" />
                        <line x1="130" y1="90" x2="130" y2="150" stroke="black" stroke-width="4" />
                        <line x1="130" y1="100" x2="110" y2="120" stroke="black" stroke-width="4" />
                        <line x1="130" y1="100" x2="150" y2="120" stroke="black" stroke-width="4" />
                        <line x1="130" y1="150" x2="110" y2="180" stroke="black" stroke-width="4" />
                        <line x1="130" y1="150" x2="150" y2="180" stroke="black" stroke-width="4" />
                    </svg>
                </div>
                <div class="attempts-container">
                    <p>Nombre de tentatives restantes : <span id="attempts"></span></p>
                </div>
                <?php

                // Connexion à la base de données
                $conn = new mysqli("localhost", "root", "", "pendu");

                // Vérifier si la connexion est réussie
                if ($conn->connect_error) {
                    die("Erreur de connexion à la base de données : " . $conn->connect_error);
                }

                // Vérifier si le formulaire de connexion a été soumis
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Rechercher l'utilisateur dans la base de données
                    $sql = "SELECT * FROM mots WHERE username = '$username' AND mot_de_passe = '$password'";
                    $result = $conn->query($sql);
                }
                ?>
            </div>
        </main>
        <footer>
            <button class="button-back" onclick="window.location.href='index.php'">Retour</button>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.0.11/svg.min.js"></script>
    <script src="jeu.js"></script>
</body>

</html>