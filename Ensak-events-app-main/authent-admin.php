<?php
include 'connexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];

    
    $sql = "SELECT id_utilisateurs, mot_de_passe FROM utilisateurs WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row && $mot_de_passe === $row['mot_de_passe']) {
            
            $adminSql = "SELECT id_administrateurs FROM administrateurs WHERE id_utilisateur = " . $row['id_utilisateurs'];
            $adminResult = mysqli_query($link, $adminSql);

            if ($adminResult && mysqli_num_rows($adminResult) > 0) {
                
                session_start();

                
                $_SESSION['id_admin'] = $row['id_utilisateurs'];

                
                $_SESSION['login'] = $email;

                
                header("Location: create-event.php");
                exit();
            } else {
                
                echo "Vous n'êtes pas un administrateur.";
            }
        } else {
            
            echo "Adresse Email ou Mot de passe incorrect.";
        }
    } else {
        
        echo "Erreur lors de l'authentification : " . mysqli_error($link);
    }

    
    mysqli_free_result($result);
}


mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'Authentification</title>
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

    button {
      background-color: #0074cc;
      color: #fff;
      padding: 15px 30px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 18px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #005a9e;
    }

    h1 {
      color: #3498db;
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <form action="" method="post">
    <h1>Authentification</h1>

    <label for="email">Adresse Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
  </form>

</body>
</html>
