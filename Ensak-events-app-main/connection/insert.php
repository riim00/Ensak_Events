<?php
// Inclusion du fichier de connexion à la base de données
include("DB.php");

// Traitement du formulaire d'ajout d'événement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous d'obtenir les données du formulaire de manière sécurisée
    $titre = mysqli_real_escape_string($connection, $_POST['titre']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    // ... (ajoutez d'autres champs du formulaire ici)

    // Ajouter un nouvel événement dans la table 'evenements'
    $insert_evenement_query = "INSERT INTO evenements (titre, description, date, lieu, categorie, id_admin, photo) 
                               VALUES ('$titre', '$description', NOW(), 'Lieu de l\'événement', 'Categorie de l\'événement', 1, 'photo.jpg')";
    mysqli_query($connection, $insert_evenement_query);

    // Récupérer l'ID du nouvel événement
    $evenement_id = mysqli_insert_id($connection);

    // Ajouter une notification pour le nouvel événement
    $notification_name = "Nouvel événement ajouté";
    $notification_message = "Un nouvel événement a été ajouté. Consultez les détails.";
    $insert_notification_query = "INSERT INTO inf (notifications_name, message, active, type)
                                  VALUES ('$notification_name', '$notification_message', 1, 'Evenement')";
    mysqli_query($connection, $insert_notification_query);

    // Redirection ou autre traitement après l'ajout de l'événement
    header("Location: insert.php"); // Redirigez vers la page d'accueil ou une autre page selon vos besoins
    exit();
}

// ... (autres inclusions et configurations, si nécessaire)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (autres balises head) -->
</head>
<body>
    <!-- Votre formulaire d'ajout d'événement -->
    <form method="post" action="">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <!-- Ajoutez d'autres champs du formulaire ici -->

        <button type="submit">Ajouter Événement</button>
    </form>

    <!-- ... (votre contenu existant) -->
</body>
</html>
