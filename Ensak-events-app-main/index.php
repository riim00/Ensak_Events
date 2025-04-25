<?php
include 'connexion.php';


$query = "SELECT * FROM evenements
WHERE date >= CURDATE()
ORDER BY date DESC
LIMIT 4";
$result = $link->query($query);


if (!$result) {
    die("Erreur dans la requête : " . $link->error);
}

$query_recent = "SELECT * FROM evenements
                WHERE date <= CURDATE()
                ORDER BY date DESC
                LIMIT 4";
$result_recent = $link->query($query_recent);


if (!$result_recent) {
    die("Erreur dans la requête : " . $link->error);
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
  "Conférences" => "#e6ff00",
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

  <title>Ensak Events - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  
  <link href="assets/css/style.css" rel="stylesheet">

 
  </head>

<body>
  <div class="background-image"></div>
    <img src="backgroundpic.jpg">
  
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Ensak Events.</a></h1>
      
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#hero"> Accueil</a></li>
            <li><a class="nav-link scrollto" href="#about"> À Propos</a></li>
            <li><a class="nav-link scrollto" href="#services">Événements</a></li>
            <li><a class="nav-link scrollto" href="notification.php">Notifications</a></li>
            
            </li>
            <li><a class="nav-link scrollto" href="stats.php">Statistiques</a></li>
            <li><a class="nav-link scrollto" href="deconnexion.php">Se déconnecter</a></li>
            <li><a class="getstarted scrollto" href="authent-admin.php"> Créer Un Evénement</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
   

    </div>
  </header>

  
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up" style="font-family:'Arial Narrow Bold', sans-serif; font-weight: bold;">
            Éveillez les esprits, célébrez les moments - Les événements d'ENSA </h2>
          <h2 data-aos="fade-up" data-aos-delay="400">Joignez-vous à l'aventure ENSA : ensemble, créons l'avenir!</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Allons-y</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">

   
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>À propos</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Bienvenue sur la page des événements de notre université !<br> Nous sommes ravis de vous présenter un monde dynamique d'opportunités et d'activités qui enrichiront votre expérience universitaire. Notre engagement est de créer un environnement stimulant, offrant une variété d'événements tels que des conférences inspirantes, des compétitions palpitantes, des ateliers éducatifs, des célébrations culturelles et bien plus encore.
            </p>
           
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <ul>
              <li><i class="ri-check-double-line"></i>Explorez notre calendrier </li>
              <li><i class="ri-check-double-line"></i>Joignez-vous à nous pour créer des souvenirs inoubliables </li>
              <li><i class="ri-check-double-line"></i>Restez connectés, participez et faites partie intégrante de la vibrante vie étudiante à l'ENSAK!</li>
            </ul>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section>

    
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-file-person"></i>
                    <span data-purecounter-start="0" data-purecounter-end="60" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Professeurs</strong> dévoués, guides passionnés de votre parcours académique, prêts à inspirer, enseigner et soutenir chaque étudiant dans sa quête de connaissance et d'épanouissement.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-duffle"></i>
                    <span data-purecounter-start="0" data-purecounter-end="28" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Administratifs</strong> engagés, pilier essentiel de notre communauté universitaire, travaillant avec dévouement pour assurer le bon fonctionnement de l'institution et rendre chaque étape de votre parcours aussi fluide que possible.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-book-half"></i>
                    <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Formations</strong> innovantes, portes ouvertes vers l'excellence académique, où l'apprentissage devient une aventure enrichissante, façonnant les esprits et préparant les étudiants pour un avenir prometteur.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-mortarboard"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1697" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Étudiants</strong> dynamiques, cœur vibrant de notre communauté universitaire, où la curiosité devient la clé de l'apprentissage, l'amitié s'épanouit, et le potentiel individuel s'éveille pour créer ensemble un avenir prometteur.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    

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
              echo '<h4 class="title"><a href="detail.php?id=' . $row['id_evenements'] . '">' . $row['titre'] . '</a></h4>';
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
      $result = $link->query($query);

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-md-6 d-flex align-items-stretch mb-3">';
          echo '<div class="card" style="background-image: url(\'assets/img/more-services-1.jpg\');" data-aos="fade-up" data-aos-delay="100">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title"><a href="detail.php?id=' . $row['id_evenements'] . '">' . $row['titre'] . '</a></h5>'; // Ajout du lien vers la page de détail avec l'ID de l'événement
          echo '<p class="card-text">' . $row['description'] . '</p>';
          echo '<div class="read-more"><a href="detail.php?id=' . $row['id_evenements'] . '"><i class="bi bi-arrow-right"></i> En savoir plus</a></div>'; // Ajout du lien vers la page de détail avec l'ID de l'événement
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        $result->free(); 
      } else {
        echo "Erreur dans la requête : " . $link->error;
      }
      ?>
    </div>
  </div>
</section>


   

    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Questions souvent posées</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Quels types d'événements proposez-vous?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Nous proposons une variété d'événements, tels que des conférences, des ateliers, des compétitions de programmation, des hackathons et bien plus encore. Explorez notre calendrier pour découvrir la diversité de nos programmes.
            </p>
          </div>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Comment puis-je m'inscrire à un événement?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              L'inscription se fait généralement en ligne via notre site web. Consultez la page de l'événement spécifique et suivez les instructions d'inscription fournies.
            </p>
          </div>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4> Y a-t-il des frais d'inscription pour les événements?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Les frais d'inscription varient en fonction de l'événement. Certains sont gratuits, tandis que d'autres peuvent avoir des coûts associés. Les détails sont indiqués sur la page de chaque événement.
            </p>
          </div>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4> Comment puis-je soumettre une proposition pour un événement?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Si vous souhaitez proposer un événement, veuillez nous contacter via notre formulaire de contact. Nous sommes toujours ouverts à de nouvelles idées passionnantes.
            </p>
          </div>
        </div>

        

      </div>
    </section>

    
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Ensak Events.</h3>
              <p>Contactez-nous pour toute question ou demande d'information. Remplissez le formulaire ci-contre, et notre équipe vous répondra rapidement. Merci de faire partie de notre communauté d'événements.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>BP 241 Av. de L'Université,<br>Kénitra 14000</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>ensak@uit.ac.ma</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>05373-76765</p>
              </div>

            </div>
          </div>

          
          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            </div>

        </div>

      </div>
    </section>

  </main>

  
 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

 
  <script src="assets/js/main.js"></script>

</body>

</html>