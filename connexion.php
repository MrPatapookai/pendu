<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "pendu");

// Vérifier si la connexion est réussie
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données de connexion soumises
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Rechercher l'utilisateur dans la base de données
    $sql = "SELECT id FROM joueurs WHERE username = '$username' AND mot_de_passe = '$password'";
    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($result->num_rows == 1) {
        // L'utilisateur est connecté avec succès
        session_start();
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
    } else {
        // Afficher un message d'erreur si les informations de connexion sont incorrectes
        header("Location: index.php");
    }
}
?>