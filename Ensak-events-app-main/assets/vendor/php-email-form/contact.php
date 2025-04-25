<?php
include 'connexion.php';

// Vérifier si l'utilisateur est connecté en vérifiant la présence de l'id_utilisateur dans la session
if(isset($_SESSION['id_utilisateur'])) {
    // Récupérer l'id_utilisateur de la session
    $id_utilisateur = $_SESSION['id_utilisateur'];

    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO messages (nom, email, sujet, message, id_utilisateur) VALUES ('$name', '$email', '$subject', '$message', $id_utilisateur)";

    // Exécuter la requête SQL
    if ($link->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erreur lors de l'envoi du message: " . $link->error;
    }
} else {
    echo "Utilisateur non connecté.";
}

// Fermer la connexion à la base de données
$link->close();
?>
