<?php
include 'connexion.php';

// Fonction pour obtenir le nombre total d'inscriptions par événement
function getNombreInscriptionsParEvenement($link) {
    $query = "SELECT e.id_evenements, e.titre AS titre_evenement, COUNT(i.id_inscriptions) AS nombre_inscriptions
              FROM evenements e
              LEFT JOIN inscriptions i ON e.id_evenements = i.id_evenement
              GROUP BY e.id_evenements, e.titre";

    $result = mysqli_query($link, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fonction pour obtenir le nombre total d'avis par événement
function getNombreAvisParEvenement($link) {
    $query = "SELECT e.id_evenements, e.titre AS titre_evenement, COUNT(a.id_avis) AS nombre_avis
              FROM evenements e
              LEFT JOIN avis a ON e.id_evenements = a.id_evenement
              GROUP BY e.id_evenements, e.titre";

    $result = mysqli_query($link, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fonction pour obtenir le nombre total d'inscriptions par utilisateur
function getNombreInscriptionsParUtilisateur($link) {
    $query = "SELECT u.id_utilisateurs, u.nom, u.prenom, COUNT(i.id_inscriptions) AS nombre_inscriptions
              FROM utilisateurs u
              LEFT JOIN inscriptions i ON u.id_utilisateurs = i.id_utilisateur
              GROUP BY u.id_utilisateurs, u.nom, u.prenom";

    $result = mysqli_query($link, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Obtenez les statistiques
$statistiquesInscriptionsParEvenement = getNombreInscriptionsParEvenement($link);
$statistiquesAvisParEvenement = getNombreAvisParEvenement($link);
$statistiquesInscriptionsParUtilisateur = getNombreInscriptionsParUtilisateur($link);

// Fermer la connexion à la base de données
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports et Statistiques</title>

    <!-- Inclure la bibliothèque Chart.js depuis le CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        canvas {
            margin-top: 20px;
        }

        /* Ajoutez ces styles à votre feuille de style CSS */

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
    <a href="index.php" class="btn btn-custom">Retour</a>

    <h1>Rapports et Statistiques</h1>

    <h2>Inscriptions par Événement</h2>
    <table border="1">
        <tr>
            <th>Événement</th>
            <th>Nombre d'Inscriptions</th>
        </tr>
        <?php foreach ($statistiquesInscriptionsParEvenement as $statistique) : ?>
            <tr>
                <td><?= $statistique['titre_evenement']; ?></td>
                <td><?= $statistique['nombre_inscriptions']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Ajouter un graphique pour les inscriptions par événement -->
    <canvas id="graphInscriptionsParEvenement" width="400" height="200"></canvas>

    <script>
        // Utiliser les données pour initialiser le graphique
        var ctx1 = document.getElementById('graphInscriptionsParEvenement').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_column($statistiquesInscriptionsParEvenement, 'titre_evenement')); ?>,
                datasets: [{
                    label: 'Nombre d\'Inscriptions',
                    data: <?php echo json_encode(array_column($statistiquesInscriptionsParEvenement, 'nombre_inscriptions')); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
