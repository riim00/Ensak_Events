<?php
include 'connexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_SESSION['id_utilisateur'])) {
        
        $id_utilisateur = $_SESSION['id_utilisateur'];

        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message_content = $_POST['message'];

        
        $sql = "INSERT INTO messages (nom, email, sujet, message, id_utilisateur) VALUES ('$name', '$email', '$subject', '$message_content', $id_utilisateur)";

        
        if ($link->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Erreur lors de l'envoi du message: " . $link->error;
        }
    } else {
        echo "Utilisateur non connecté.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}


$link->close();
?>
