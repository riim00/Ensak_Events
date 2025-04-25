<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnsakEvents - Accueil</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #3498db;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .buttons-container {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
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

        .footer {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h1>Bienvenue sur EnsakEvents</h1>

    <p>Votre plateforme dédiée à la découverte et à la gestion des événements à l'ENSAK (École Nationale des Sciences Appliquées de Kenitra). Que vous soyez un étudiant passionné, un professionnel curieux ou simplement à la recherche de moments enrichissants, EnsakEvents est l'endroit où les expériences mémorables prennent vie.</p>
    <p>Explorez un univers diversifié d'événements, allant de conférences stimulantes à des ateliers innovants, en passant par des compétitions palpitantes. Notre plateforme offre une fenêtre sur le dynamisme et la créativité qui animent notre communauté.</p>

    <div class="buttons-container">
        <a href="authentification.php" class="Button"><span class="Button__inner">Se Connecter</span></a>
        <a href="login.php" class="Button"><span class="Button__inner">S'Inscrire</span></a>
    </div>

    <p class="footer">EnsakEvents - Où chaque événement devient une opportunité unique !</p>

</body>

</html>
