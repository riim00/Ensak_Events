<?php
include 'connexion.php';


if (!isset($_SESSION['id_admin'])) {
    
    header("Location: authent-admin.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $titre = mysqli_real_escape_string($link, $_POST["titre"]);
    $description = mysqli_real_escape_string($link, $_POST["description"]);
    $date = $_POST["date"];
    $lieu = mysqli_real_escape_string($link, $_POST["lieu"]);
    $categorie = mysqli_real_escape_string($link, $_POST["categorie"]);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
      $dossier = 'photo1/';
      $temp_name = $_FILES['photo']['tmp_name'];

      if (!is_uploaded_file($temp_name)) {
          exit("Le fichier est introuvable");
      }

      if ($_FILES['photo']['size'] >= 1000000) {
          exit("Erreur, le fichier est volumineux");
      }

      $infosfichier = pathinfo($_FILES['photo']['name']);
      $extension_upload = $infosfichier['extension'];

      $extension_upload = strtolower($extension_upload);
      $extensions_autorisees = array('png', 'jpeg', 'jpg');
      if (!in_array($extension_upload, $extensions_autorisees)) {
          exit("Erreur, veuillez insérer une image (extensions autorisées: png, jpeg, jpg)");
      }

      $nom_photo = $_SESSION['login'] . "." . $extension_upload;
      if (!move_uploaded_file($temp_name, $dossier . $nom_photo)) {
          exit("Problème dans le téléchargement de l'image, veuillez réessayer");
      }
      $photo_name = $nom_photo;
  } else {
      $photo_name = "inconnu.jpg";
  }

  $sql = "INSERT INTO evenements (titre, description, date, lieu, image, id_admin, categorie) 
          VALUES ('$titre', '$description', '$date', '$lieu', '$photo_name', '{$_SESSION['id_admin']}', '$categorie')";

  
  if (mysqli_query($link, $sql)) {
      echo "Événement créé avec succès.";
      header("Location: index.php");
  } else {
      echo "Erreur lors de la création de l'événement : " . mysqli_error($link);
  }
}


mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'Événement</title>
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

    input, textarea, select {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }
    input{
        border-color: #3498db;
    }

    input[type="date"] {
      padding: 10px;
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
  </style>
</head>
<body>

  <form action="create-event.php" method="post" enctype="multipart/form-data"></br></br></br>
    <label for="titre">Titre de l'événement:</label>
    <input type="text" id="titre" name="titre" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <label for="lieu">Lieu:</label>
    <input type="text" id="lieu" name="lieu" required>

    <label for="categorie">Catégorie:</label>
    <select id="categorie" name="categorie" required>
      <option value="Forums ENSA-Entreprise">Forums ENSA-Entreprise</option>
      <option value="Conférences">Conférences</option>
      <option value="Ateliers et Formations">Ateliers et Formations</option>
      <option value="Compétitions">Compétitions</option>
      <option value="Événements Technologiques">Événements Technologiques</option>
      <option value="Événements Sociaux">Événements Sociaux</option>
      <option value="Activités de Clubs Étudiants">Activités de Clubs Étudiants</option>
      <option value="Événements Caritatifs">Événements Caritatifs</option>
    </select>

    <label for="photo">Photo:</label>
    <input type="file" id="photo" name="photo" accept="image/*" required>

    <button type="submit">Créer l'événement</button>
  </form>

</body>
</html>

