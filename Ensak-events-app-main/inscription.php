<?php
include 'connexion.php';

if (isset($_SESSION['id_evenement'])) {
    $id_evenements = $_SESSION['id_evenement'];
} else {
    // Gérez le cas où l'ID de l'événement n'est pas défini dans la session
    echo "ID de l'événement non spécifié.";
    exit;
}

if (isset($_POST['inscription_submit'])) {
    // Le bouton "S'inscrire" a été cliqué
    
    // Insérez le code pour effectuer l'inscription dans la base de données ici

    $id_utilisateur = $_SESSION['id_utilisateur']; // Assurez-vous que $_SESSION['id_utilisateur'] est défini
    $query_inscription = "INSERT INTO inscriptions (id_evenement, id_utilisateur) VALUES ($id_evenements, $id_utilisateur)";
    $result_inscription = $link->query($query_inscription);

    // Vérifiez si l'insertion a réussi
    if ($result_inscription) {
        header("Location: index.php");
    } else {
        echo "Erreur lors de l'inscription : " . $link->error;
    }
}
?>


