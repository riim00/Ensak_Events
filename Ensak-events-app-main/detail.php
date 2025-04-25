<?php
include 'connexion.php';


if (isset($_GET['id'])) {
    $id_evenements = $_GET['id'];
} else {
    
    echo "ID de l'événement non spécifié.";
    exit;
}


$query = "SELECT * FROM evenements WHERE id_evenements = $id_evenements";
$result = $link->query($query);


if (!$result) {
    die("Erreur dans la requête : " . $link->error);
}


if ($row = $result->fetch_assoc()) {
    $titre = $row['titre'];
    $description = $row['description'];
    $categorie = $row['categorie'];
    $date = $row['date'];
    $image = $row['image']; 
    $lieu = $row['lieu']; 
} else {
    
    echo "Événement non trouvé.";
    exit;
}
if (isset($_POST['inscription_submit'])) {
    
    
    
    if (isset($_SESSION['id_utilisateur'])) {
        $id_utilisateur = $_SESSION['id_utilisateur'];

        
        $query_inscription = "INSERT INTO inscriptions (id_evenement, id_utilisateur) VALUES (?, ?)";
        $stmt_inscription = $link->prepare($query_inscription);
        $stmt_inscription->bind_param('ii', $id_evenements, $id_utilisateur);

        if ($stmt_inscription->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erreur lors de l'inscription : " . $stmt_inscription->error;
        }
    } else {
        echo "Erreur : ID utilisateur non défini dans la session.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Détails de l'événement</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f9fa;
            padding-top: 80px; 
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px 0;
        }
        .logo {
            color: white;
            text-decoration: none;
        }
        .logo h1 {
            font-size: 24px;
            margin: 0;
        }
        .social-icons {
            margin-left: 10px;
        }
        .social-icons a {
            color: white;
            margin-right: 10px;
        }
        .search-form {
            display: none;
        }
        .search-form input[type="text"] {
            width: 200px;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }
        .post-meta {
            color: #6c757d;
            font-size: 14px;
        }
        .post-meta span {
            margin-right: 5px;
        }
        .post-title {
            font-size: 28px;
            margin: 10px 0;
        }
        .post-content {
            font-size: 16px;
            line-height: 1.6;
        }
        .post-image {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }
        .comments {
            margin-top: 30px;
        }
        .comment-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .comment {
            margin-bottom: 30px;
            display: flex;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }
        .avatar img {
            max-width: 100%;
            height: auto;
        }
        .comment-meta {
            font-size: 14px;
        }
        .comment-meta span {
            margin-right: 5px;
        }
        .comment-body {
            font-size: 16px;
        }
        .comment-replies {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .comment-replies-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .reply {
            margin-bottom: 20px;
            display: flex;
        }
        .reply-meta {
            font-size: 14px;
        }
        .reply-meta span {
            margin-right: 5px;
        }
        .reply-body {
            font-size: 16px;
        }
        .comments-form {
            margin-top: 30px;
        }
        .comments-form label {
            font-size: 16px;
        }
        .comments-form input[type="text"],
        .comments-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .comments-form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }
        .scroll-top:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    
    <header class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="btn btn-primary">Retour</a>
            <form action="detail.php?id=<?php echo $id_evenements; ?>" method="post">
            <input type="submit" name="inscription_submit" value="S'inscrire">
            </form>

            
            <div class="position-relative">
                <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>
                
            
              
                </div>
            </div>
        </div>
    </header>

    <main id="main">
        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto" data-aos="fade-up">
                        
                        <div class="single-post">
                            <div class="post-meta">
                                <span class="date"><?php echo $categorie; ?></span>
                                <span class="mx-1">&bullet;</span>
                                <span><?php echo $date; ?></span>
                                <span class="mx-1">&bullet;</span>
                                <span><?php echo $lieu; ?></span>
                            </div>
                            <h1 class="mb-5"><?php echo $titre; ?></h1>
                            <p><?php echo $description; ?></p>

                           
                            <img src="photo1/<?php echo $image; ?>" alt="Description de l'image">

                            
                            
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>
    </main>

 
    <footer id="footer">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 text-lg-start text-center">
                    <h3>Post</h3>
                    <p>
                        
"Plongez dans une expérience inoubliable! Rejoignez-nous à notre prochain événement où l'inspiration et la connexion se rencontrent. Ne manquez pas cette opportunité unique!"
                    </p>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <h3>Contact</h3>
                    <p>
                    BP 241 Av. de L'Université,Kénitra 14000<br>
                        Email: ensak@uit.ac.ma<br>
                        Phone: 05373-76765
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="scroll-top"><i class="bi bi-arrow-up"></i></a>

   
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    
    <script src="assets/js/main.js"></script>

</body>
</html>
