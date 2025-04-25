<?php
include 'connexion.php';

// Récupérer les notifications de l'utilisateur connecté
$id_utilisateur = $_SESSION['user_id'];
$sql = "SELECT * FROM notifications WHERE id_utilisateur = $id_utilisateur";
$result = mysqli_query($link, $sql);

// Vérifier s'il y a des notifications
if (mysqli_num_rows($result) > 0) {
    // Début du code HTML
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notifications</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }
            .btn-custom {
    background-color: #000; /* Couleur de fond du bouton (noir) */
    color: #fff; /* Couleur du texte (blanc) */
    font-family: 'VotrePolice', sans-serif; /* Remplacez 'VotrePolice' par le nom de votre police */
    font-size: 16px; /* Taille de la police */
    padding: 10px 20px; /* Espacement interne du bouton (haut bas | gauche droite) */
    border: none; /* Supprime les bordures du bouton */
    border-radius: 5px; /* Ajoutez des coins arrondis au bouton */
    cursor: pointer; /* Change le curseur au survol du bouton */
    text-decoration: none; /* Supprime le soulignement par défaut sur le lien */
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out; /* Ajoute une transition douce pour une expérience utilisateur améliorée */
    }

    .btn-custom:hover {
    background-color: #333; /* Couleur de fond du bouton au survol */
    color: #fff; /* Couleur du texte au survol */
    }
        </style>
    </head>
    <body>
    <div class="container">
        <a href="index.php" class="btn btn-custom">Retour</a>
        <h1>Notifications</h1>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Notification</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les notifications dans le tableau
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['date_notification']}</td>";
                    echo "<td>{$row['message']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
    <?php
} else {
    // Si l'utilisateur n'a pas de notifications
    echo "Vous n'avez aucune notification.";
}
?>
