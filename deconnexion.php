<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["username"])) {
    // Détruire la session
    session_unset();
    session_destroy();
}

// Rediriger l'utilisateur vers la page d'accueil
header("Location: index.php");
exit();
