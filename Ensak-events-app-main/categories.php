<?php
include 'connexion.php';


$query = "SELECT * FROM evenements
WHERE date >= CURDATE()
ORDER BY date DESC
LIMIT 4";
$result = $mysqli->query($query);


if (!$result) {
    die("Erreur dans la requête : " . $mysqli->error);
}
$query_recent = "SELECT * FROM evenements
                WHERE date <= CURDATE()
                ORDER BY date DESC
                LIMIT 4";
$result_recent = $mysqli->query($query_recent);


if (!$result_recent) {
    die("Erreur dans la requête : " . $mysqli->error);
}


$categories_icons = array(
    "Forums ENSA-Entreprise" => "ri-store-line",
    "Conférences" => "ri-bar-chart-box-line",
    "Ateliers et Formations" => "ri-calendar-todo-line",
    "Compétitions" => "ri-base-station-line",
    "Événements Technologiques" => "ri-database-2-line",
    "Événements Sociaux" => "ri-gradienter-line",
    "Activités de Clubs Étudiants" => "ri-file-list-3-line",
    "Événements Caritatifs" => "ri-price-tag-2-line"
);


$categorie_colors = array(
  "Forums ENSA-Entreprise" => "#000000",
  "Conférences" => "#008000",
  "Ateliers et Formations" => "#e80368",
  "Compétitions" => "#e361ff",
  "Événements Technologiques" => "#47aeff",
  "Événements Sociaux" => "#ffa76e",
  "Activités de Clubs Étudiants" => "#11dbcf",
  "Événements Caritatifs" => "#4233ff"
);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Catégories</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">



  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .small-image {
      max-width: 50px; 
      height: auto; 
    }
  </style>

</head>

<body>

  <main> 
    <section id="Categories" class="Categories">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Catégories</h2>
          <p>Chercher Les Évènements Par Catégories</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line" style="color: #000000;"></i>
              <h3><a href="trie.php?categorie=Forums ENSA-Entreprise">Forums ENSA-Entreprise</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="trie.php?categorie=Conférences">Conférences</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="trie.php?categorie=Ateliers et Formations">Ateliers et Formations</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #e361ff;"></i>
              <h3><a href="trie.php?categorie=Compétitions">Compétitions</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="trie.php?categorie=Événements Technologiques">Événements Technologiques </a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="trie.php?categorie=Événements Sociaux">Événements Sociaux</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="trie.php?categorie=Activités de Clubs Étudiants">Activités de Clubs Étudiants</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="trie.php?categorie=Événements Caritatifs">Événements Caritatifs </a></h3>
            </div>
          </div>
        </div>

      </div>
    </section> 

    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Évènements à Venir</h2>
          <p>N'en Ratez Aucun !</p>
        </div>
        <div class="row">
        <?php
          
          while ($row = $result->fetch_assoc()) {
              echo '<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">';
              echo '<div class="icon-box" data-aos="fade-up" data-aos-delay="100">';
              echo '<div class="icon"><i class="' . $categories_icons[$row['categorie']] . '" style="color:' . $categorie_colors[$row['categorie']] . ';"></i></div>';
              echo '<h4 class="title"><a href="' . $row['url'] . '">' . $row['titre'] . '</a></h4>';
              echo '<p class="description">' . $row['description'] . '</p>';
              echo '</div>';
              echo '</div>';
          }
          ?>
        </div>
      </div>
    </section>

    </section>

    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Évènements Récents</h2>
          <p>Jetez Un Coup D'oeil Aux Dérniers Évenènements !  </p>
        </div>
    </section>


    <section id="more-services" class="more-services">
  <div class="container">
    <div class="row">
      <?php
      
      $query = "SELECT id_evenements, titre, description FROM evenements
                WHERE date <= CURDATE()
                ORDER BY date DESC
                LIMIT 4";
      $result = $mysqli->query($query);

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-md-6 d-flex align-items-stretch mb-3">';
          echo '<div class="card" style="background-image: url(\'assets/img/more-services-1.jpg\');" data-aos="fade-up" data-aos-delay="100">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title"><a href="detail.php?id=' . $row['id_evenements'] . '">' . $row['titre'] . '</a></h5>'; 
          echo '<p class="card-text">' . $row['description'] . '</p>';
          echo '<div class="read-more"><a href="detail.php?id=' . $row['id_evenements'] . '"><i class="bi bi-arrow-right"></i> En savoir plus</a></div>'; 
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        $result->free(); 
      } else {
        echo "Erreur dans la requête : " . $mysqli->error;
      }
      ?>
    </div>
  </div>
</section>



    <footer id="footer" class="footer">
  <div class="footer-content">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-4">
          <h3 class="footer-heading">About EVENTS</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
          <p><a href="about.html" class="footer-link-more">Learn More</a></p>
        </div>
        <div class="col-6 col-lg-2">
          <h3 class="footer-heading">Navigation</h3>
          <ul class="footer-links list-unstyled">
            <li><a href="index.html"><i class="bi bi-chevron-right"></i> Home</a></li>
            <li><a href="index.html"><i class="bi bi-chevron-right"></i> Blog</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Categories</a></li>
            <li><a href="single-post.html"><i class="bi bi-chevron-right"></i> Single Post</a></li>
            <li><a href="about.html"><i class="bi bi-chevron-right"></i> About us</a></li>
            <li><a href="contact.html"><i class="bi bi-chevron-right"></i> Contact</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-2">
          <h3 class="footer-heading">Categories</h3>
          <ul class="footer-links list-unstyled">
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h3 class="footer-heading">Recent Posts</h3>
          <ul class="footer-links footer-blog-entry list-unstyled">
            <?php
           
            $query = "SELECT categorie, date, titre FROM evenements
                      WHERE date <= CURDATE()
                      ORDER BY date DESC
                      LIMIT 4";
            $result = $mysqli->query($query);

            if ($result) {
              while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<a href="#" class="d-flex align-items-center mb-2">';
                echo '<img src="assets/img/post-sq-1.jpg" alt="" class="img-fluid me-3 small-image">';
                echo '<div>';
                echo '<div class="post-meta d-block"><span class="date">' . $row['categorie'] . '</span> <span class="mx-1">&bullet;</span> <span>' . $row['date'] . '</span></div>';
                echo '<span>' . $row['titre'] . '</span>';
                echo '</div>';
                echo '</a>';
                echo '</li>';
              }
              $result->free(); 
            } else {
              echo "Erreur dans la requête : " . $mysqli->error;
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


    


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    
    <script src="assets/js/main.js"></script>
  </main>
</body>

</html>