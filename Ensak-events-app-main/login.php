<?php
// Inclure la page de connexion
include 'connexion.php';

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];

    // Requête d'insertion
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";

    if (mysqli_query($link, $sql)) {
      header("Location: authentification.php");
    } else {
        echo "Erreur lors de l'inscription : " . mysqli_error($link);
    }
}

// Fermer la connexion à la base de données
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #3498db;
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 18px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .Button {
            font-family: "Segoe UI", sans-serif;
            font-weight: 600;
            line-height: 130%;
            letter-spacing: -0.02em;
            color: #ffffff;
            font-size: 20px;
            position: relative;
            border-radius: 80em;
            background-color: #0074cc;
            border: 0.125rem solid #0074cc;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.2s ease, border-color 0.2s ease,
                color 0.2s ease, fill 0.2s ease, transform 0.2s ease-in-out;
            cursor: pointer;
            overflow: hidden;
            will-change: transform;
            padding: 10px 20px;
            display: inline-block;
            margin-top: clamp(1px, 5.3333333333vw, 40.96px);
        }

        .Button:hover {
            background-color: #40E0D0;
            border-color: #40E0D0;
            transition: background-color 0.2s ease, border-color 0.2s ease,
                color 0.2s ease, fill 0.2s ease, transform 0.2s ease-in-out;
            transform: scale(1.07);
            will-change: transform;
            color: #11190c;
        }

        .Button:after {
            content: "";
            display: block;
            height: 100%;
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            transform: translate(-100%) rotate(10deg);
            transform-origin: top left;
            transition: background-color 0.2s ease, border-color 0.2s ease,
                color 0.2s ease, fill 0.2s ease, transform 0.2s ease-in-out;
            will-change: transform;
            z-index: -1;
            border-radius: 80em;
            background-color: #40E0D0;
        }

        .Button:hover:after {
            transform: translate(0);
            z-index: 0;
        }

        .Button>* {
            position: relative;
            z-index: 1;
        }

        .Button__inner {
            color: #ffffff;
        }

        .Button:hover .Button__inner {
            color: #11190c;
        }

        h1 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

  <form action="login.php" method="post" >
    <h1>Inscription</h1>

    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="email">Adresse Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="Button"><span class="Button__inner">S'inscrire</span></button>
  </form>

</body>
</html>

