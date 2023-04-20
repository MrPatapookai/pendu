<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Jeu du pendu - Score</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1>Jeu du pendu</h1>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Joueur</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('connexion.php');

                $query = "SELECT username, MAX(score) as score FROM joueurs INNER JOIN scores ON joueurs.id = scores.joueur_id GROUP BY username ORDER BY score DESC";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    if (isset($_SESSION['username'])) {
                        echo "<tr><td><strong>" . $row['username'] . "</strong></td><td><strong>" . $row['score'] . "</strong></td></tr>";
                    } else {
                        echo "<tr><td>" . $row['username'] . "</td><td>" . $row['score'] . "</td></tr>";
                    }
                }
                mysqli_close($conn);
                ?>

            </tbody>
        </table>
    </main>

    <footer>
        <div class="button-group">
            <a href="index.php" class="button">Retour</a>
            <a href="jeu.html" class="button">Jouer</a>
        </div>
    </footer>
</body>

</html>