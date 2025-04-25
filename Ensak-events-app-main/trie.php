<?php
include 'connexion.php';

// Vérifiez si la catégorie est définie dans l'URL
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];

    // Évitez les attaques par injection SQL en utilisant une requête préparée
    $query = "SELECT evenements.*, utilisateurs.nom AS auteur_nom, utilisateurs.prenom AS auteur_prenom
              FROM evenements
              INNER JOIN administrateurs ON evenements.id_admin = administrateurs.id_administrateurs
              INNER JOIN utilisateurs ON administrateurs.id_utilisateur = utilisateurs.id_utilisateurs
              WHERE evenements.categorie = ? 
              ORDER BY evenements.date DESC";

    $stmt = $link->prepare($query);
    $stmt->bind_param("s", $categorie);
    $stmt->execute();

    // Récupérez les résultats de la requête
    $result = $stmt->get_result();
    
    $stmt->close(); // Fermez la requête préparée
} else {
    echo "Catégorie non spécifiée.";
}

// Fermez la connexion à la base de données lorsque vous avez fini de l'utiliser
$link->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <style>
    body {
      font-family: 'sans-serif', sans-serif;
      background-color: #ffffff; /* Fond blanc */
    }

    /* Modification des couleurs */
    .category-title {
      color: #007bff; /* Bleu vif */
    }

    /* Modification des liens */
    a {
      color: #007bff; /* Bleu vif pour les liens */
    }

    a:hover {
      color: #0056b3; /* Bleu plus foncé au survol */
    }

    /* Boutons de pagination */
    .custom-pagination a {
      background-color: #007bff;
      color: #ffffff;
    }

    .custom-pagination a:hover {
      background-color: #0056b3;
    }
  </style>

  <title>Categories</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>
  <main id="main">
    <section>
      <div class="container">
        <div class="row">

          <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: <?php echo $categorie; ?></h3>

            <?php 
            $perPage = 6;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($currentPage - 1) * $perPage;
            
            // Définissez une variable pour le compteur d'événements
            $eventCount = 0;
            
            while ($row = $result->fetch_assoc()) :
                if ($eventCount >= $start && $eventCount < ($start + $perPage)) :
            ?>
              <div class="d-md-flex post-entry-2 half">
                <a href="detail.php?id=<?php echo $row['id_evenements']; ?>" class="me-4 thumbnail">
                <img src="photo1/<?php echo $row['image']; ?>" alt="" class="img-fluid">

                </a>
                <div>
                  <div class="post-meta"><span class="date"><?php echo $row['categorie']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $row['date']; ?></span></div>
                  <h3><a href="detail.php?id=<?php echo $row['id_evenements']; ?>"><?php echo $row['titre']; ?></a></h3>
                  <p><?php echo $row['description']; ?></p>
                  <div class="d-flex align-items-center author">
                    <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                    <div class="name">
                    <h3 class="m-0 p-0"><?php echo $row['auteur_nom'] . ' ' . $row['auteur_prenom']; ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            <?php
                endif;
                $eventCount++;
            endwhile;
            
            // Calcul du nombre total de pages
            $totalPages = ceil($eventCount / $perPage);
            ?>

            <div class="text-start py-4">
              <div class="custom-pagination">
                <?php if ($currentPage > 1) : ?>
                  <a href="?categorie=<?php echo $categorie; ?>&page=<?php echo $currentPage - 1; ?>" class="prev">Précédent</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                  <a href="?categorie=<?php echo $categorie; ?>&page=<?php echo $i; ?>" <?php if ($i === $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages) : ?>
                  <a href="?categorie=<?php echo $categorie; ?>&page=<?php echo $currentPage + 1; ?>" class="next">Suivant</a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            
          </div>

        </div>
      </div>
    </section>
  </main>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
