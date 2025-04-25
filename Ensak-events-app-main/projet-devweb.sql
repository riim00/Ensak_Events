-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 jan. 2024 à 22:48
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_administrateurs` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id_administrateurs`, `id_utilisateur`) VALUES
(1, 1),
(3, 1),
(2, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `id_evenement` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `id_evenement`, `id_utilisateur`, `commentaire`, `note`) VALUES
(1, 1, 1, 'C était une excellente conférence.', 5),
(2, 2, 2, 'L atelier était très instructif.', 4),
(3, 3, 3, 'La compétition était amusante.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id_evenements` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `notification_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id_evenements`, `titre`, `description`, `date`, `lieu`, `categorie`, `id_admin`, `image`, `notification_sent`) VALUES
(1, 'Conférence sur la technologie', 'Conférence sur les dernières avancées technologiques.', '2024-02-15', 'Salle de conférence A', 'Conférences', 1, NULL, 0),
(2, 'Atelier de développement web', 'Atelier pratique sur le développement web.', '2024-03-10', 'Salle de formation B', 'Ateliers et Formations', 2, NULL, 0),
(3, 'Compétition de programmation', 'Compétition de programmation pour les étudiants.', '2024-04-05', 'Auditorium C', 'Compétitions', 1, NULL, 0),
(47, 'Caravane Humanitaire AL AMAL 6', '🌟 Joignez-vous à la Caravane Humanitaire AL AMAL 6 ! Cette initiative, portée par l\'ENSA de Kenitra et Anaruz, vise à apporter soutien et réconfort aux habitants de Douar El Bacha, commune Aguelmous, province de Khenifra. Nous sommes appelés à tendre la main et à contribuer généreusement à cette cause noble.\r\n\r\nComment pouvez-vous aider ?\r\n\r\nArgent : Votre contribution financière peut faire une grande différence.\r\nCouvertures : Offrez de la chaleur durant les nuits froides.\r\nProduits alimentaires : Partagez votre abondance avec ceux qui en ont besoin.\r\nVêtements :\r\nDonnez une nouvelle vie à vos vêtements en les offrant à ceux qui en ont besoin.\r\n\r\nFournitures scolaires : Soutenez l\'éducation des enfants avec des fournitures essentielles.\r\n🤝 Faites partie du changement et apportez votre contribution à l\'un des points de collecte ou par virement bancaire au RIB indiqué. Chaque geste compte et ensemble, nous pouvons faire une différence significative.', '2029-01-15', 'Douar El Bacha, commune Aguelmous, province de Khenifra', 'Événements Caritatifs', 1, 'john.doe@example.com.jpeg', 0),
(48, 'Journée de Nettoyage avec Green Invest', '🌱 Rejoignez-nous pour la 3ème édition de notre action éco-responsable ! Ensemble, redonnons vie au lac de Sidi Boughaba et préservons la beauté naturelle de notre région.\r\n\r\n📆 Date : 15 octobre 2023\r\n🕗 Heure : 8h00\r\n📍 Lieu : Lac Sidi Boughaba\r\n\r\nParticipez à une journée pleine d\'action et de sens, où chaque geste compte pour l\'environnement. Apportez votre énergie et votre bonne volonté, nous fournissons le reste !\r\n\r\nAu programme :\r\n\r\nNettoyage collectif du lac et de ses alentours.\r\nSensibilisation à la protection de l\'environnement.\r\nActivités ludiques et éducatives.\r\nC\'est une opportunité parfaite pour faire une différence, rencontrer des personnes part\r\n\r\nageant les mêmes idées et profiter de la nature. Apportez vos amis, votre famille et joignez-vous à nous pour une journée où nous agissons ensemble pour la planète. 🌐👨‍👩‍👧‍👦\r\n\r\nPourquoi participer ?\r\n\r\nPour contribuer directement à l\'écologie de votre communauté.\r\nPour apprendre plus sur les enjeux environnementaux locaux.\r\nPour passer un moment convivial et constructif.\r\nSoyez les acteurs du changement !', '2029-02-02', 'Lac Sidi Boughaba', 'Activités de Clubs Étudiants', 1, 'john.doe@example.com.jpeg', 0),
(49, ' Lancement du Recrutement Enactus ENSA Kenitra', 'Vous cherchez à faire partie d\'une équipe dynamique et engagée dans l\'entrepreneuriat social ? Enactus ENSA Kenitra vous ouvre ses portes. Nous sommes à la recherche de membres motivés pour propulser nos projets vers de nouveaux sommets.\r\n\r\n\r\nPourquoi rejoindre Enactus ENSA Kenitra ?\r\n\r\nPour appliquer vos connaissances théoriques à des projets concrets\r\nPour développer vos compétences en leadership et en gestion de projet\r\nPour faire partie d\'une communauté mondiale d\'entrepreneurs sociaux\r\nPour avoir un impact positif et durable dans la société\r\nPrêts à relever le défi ?\r\n\r\n📢 Recrutement Enactus ENSA Kenitra : La plateforme pour les innovateurs sociaux !\r\n\r\n🌐 Vous êtes étudiant à l\'ENSA Kenitra et passionné par l\'entrepreneuriat social ? Rejoignez l\'équipe Enactus pour transformer vos idées en actions concrètes !\r\n\r\n🔍 Nous cherchons des esprits créatifs et engagés pour :\r\n\r\nDévelopper des projets innovants à impact social.\r\nCollaborer avec une équipe multidisciplinaire.\r\nBénéficier d\'un réseau professionnel étendu.\r\n🗓️ Date : Mercredi 20 septembre\r\n⏰ Heure : 8h30\r\n📍 Lieu : Bâtiment B\r\n\r\n💼 Ce que nous offrons :\r\n\r\nUne expérience enrichissante dans l\'entrepreneuriat.\r\nL\'opportunité de développer des compétences en gestion de projet.\r\nUn environnement stimulant pour votre développement personnel.\r\nSaisissez cette chance de faire partie d\'une aventure unique et de contribuer à un monde meilleur.', '2029-03-03', 'Bâtiment B, ENSA Kenitra', 'Activités de Clubs Étudiants', 1, 'john.doe@example.com.jpeg', 0),
(50, 'soirée cinéma', '\"🎬 Soirée inoubliable au cœur du cinéma d\'horreur avec le club Anaruz ! 🌆 Venez frissonner devant le grand écran lors de notre événement spécial \'Soirée Cinéma\', où suspense et frissons seront au rendez-vous. 🕶️\r\n\r\n🗓️ Date : 05 Octobre\r\n🕕 Heure : 18h00\r\n📍 Lieu : AMPHI ROUGE\r\n💰 Tarif : 15 Dh - Un ticket, une cause. Votre participation compte !', '2029-03-17', 'amphi rouge', 'Événements Sociaux', 1, 'cinema.jpeg', 0),
(51, 'Compétition SCM Globe', '🏆 Êtes-vous prêt à relever le défi ? Le Club CIELK, en partenariat avec le Club Industriel et le Club Logistica de l\'ENSA Kenitra, vous invite à participer à la compétition SCM Globe. C\'est une occasion unique de mettre en pratique vos compétences en logistique et en gestion de la chaîne d\'approvisionnement dans un environnement compétitif et dynamique.\r\n\r\nAu cœur de la Compétition :\r\n\r\nSimulation réaliste de gestion de la chaîne d\'approvisionnement.\r\nDéfis concrets pour optimiser les opérations et la logistique.\r\nCollaboration et compétition avec des étudiants passionnés et talentueux.\r\n🎓 Pour qui ? Cette compétition est ouverte à tous les étudiants de l\'ENSA Kenitra qui sont intéressés par la logistique, la gestion de la chaîne d\'approvisionnement, et qui souhaitent affûter leurs compétences stratégiques.\r\n\r\nPourquoi participer ?\r\n\r\nDévelopper des compétences pratiques en gestion de la chaîne d\'approvisionnement.\r\nTester et améliorer votre capacité à résoudre des problèmes complexes en temps réel.\r\nSe mesurer à d\r\n\'autres étudiants et apprendre dans un contexte ludique et compétitif.\r\n\r\nGagner des prix et obtenir une reconnaissance pour vos compétences en logistique.\r\n🎉 Relevez le Défi :\r\n\r\nFormez votre équipe ou rejoignez-en une pour commencer l\'aventure.\r\nUtilisez des stratégies innovantes pour gérer les ressources et optimiser les flux de produits.\r\nSoyez prêts à prendre des décisions critiques sous pression.\r\n🏅 Récupérez la Victoire :\r\n\r\nLa meilleure stratégie gagne! Mettez en œuvre vos connaissances théoriques dans des scénarios pratiques.\r\nLes équipes gagnantes seront récompensées et célébrées pour leur excellence opérationnelle.\r\n📅 Marquez vos calendriers !\r\n\r\nNe manquez pas cette occasion de briller dans le domaine de la logistique et de la gestion de la chaîne d\'approvisionnement.\r\n📢 Intéressé ? Contactez les organisateurs pour plus de détails et pour vous inscrire à la compétition.', '2029-04-05', 'ENSA kénitra', 'Compétitions', 1, 'scm.jpeg', 0),
(52, ' Atelier de Cybersécurité à l\'ENSA de Kenitra', '👨‍💻 Rejoignez-nous pour une session immersive de formation en cybersécurité ! Le club Google Developer Student Clubs de l\'ENSA Kenitra est ravi de vous présenter un atelier spécialisé conçu pour vous initier aux bases des compétitions de Capture The Flag (CTF), un pilier dans le monde de la sécurité informatique.\r\n\r\n📆 Quand ? Lundi à 13h00\r\n📍 Où ? Bâtiment D, ENSA Kenitra\r\n\r\nCe que vous apprendrez :\r\n\r\nLes fondamentaux des défis CTF et pourquoi ils sont essentiels pour les futurs experts en sécurité.\r\nTechniques de résolution de problèmes et de pensée critique appliquées à la cybersécurité.\r\nConseils pratiques pour aborder les différentes catégories de défis CTF, y compris le cryptage, le piratage web, et plus encore.\r\n🎓 Notre formateur : Jaber El Mahjoub, un expert passionné par la sécurité informatique et prêt à partager ses connaissances\r\n\r\net son expérience pour vous aider à développer vos compétences en cybersécurité.\r\n\r\n🔥 Pourquoi vous devriez participer :\r\n\r\nAcquérir une compréhension précieuse des défis réels en matière de cybersécurité.\r\nÉlargir vos compétences techniques et analytiques dans un environnement d\'apprentissage interactif.\r\nSe préparer à participer à des compétitions CTF nationales et internationales.\r\nRencontrer et réseauter avec d\'autres étudiants intéressés par la cybersécurité.\r\n📝 Inscrivez-vous dès maintenant :\r\nLes places sont limitées pour assurer une expérience d\'apprentissage de qualité. Assurez-vous de réserver votre place au plus vite !\r\n\r\nPour plus d\'informations et pour confirmer votre présence, veuillez contacter les organisateurs aux numéros indiqués sur l\'affiche.\r\n\r\n💼 Soutenu par : Google Developer Student Clubs - National School of Applied Sciences, Kenitra.\r\n\r\nNe manquez pas cette opportunité unique de monter en compétence dans le domaine captivant et en constante évolution de la cybersécurité. Venez apprendre, expérimenter et vous amuser tout en renforçant la sécurité de notre monde numérique.', '2022-09-15', 'Bâtiment D, ENSA Kenitra', 'Ateliers et Formations', 1, 'cyber.jpeg', 0),
(53, 'Conférence sur L\'Industrie 4.0 et l\'Internet des Objets', '🚀 Rejoignez-nous pour une exploration approfondie de la révolution technologique qui façonne notre avenir ! Le club CIELK a l\'honneur de vous inviter à une conférence captivante sous le thème \"L\'Industrie 4.0 et l\'Internet des Objets\". Cet événement est une occasion incontournable pour les passionnés de technologie, les étudiants, les professionnels et les académiciens de se plonger dans les tendances qui transforment les secteurs industriels à travers le monde.\r\n\r\n📅 Date : 7 Décembre\r\n📍 Lieu : Amphithéâtre Rouge\r\n\r\n🔍 Au Programme :\r\n\r\nDes présentations par des experts de premier plan dans le domaine de l\'industrie 4.0.\r\nDes discussions interactives sur l\'impact de l\'IoT dans nos vies\r\nquotidiennes et industrielles.\r\n\r\nUn aperçu des dernières innovations et des prévisions sur l\'évolution des technologies connectées.\r\nUne occasion unique de réseauter avec des professionnels et des penseurs avant-gardistes.\r\n👥 Pour qui ?\r\nQue vous soyez un innovateur, un entrepreneur, un chercheur, un étudiant ou simplement curieux des nouvelles technologies, cette conférence est pour vous ! Venez découvrir comment l\'industrie 4.0 et l\'IoT peuvent être les moteurs de changement et d\'opportunités dans votre domaine.\r\n\r\n🔗 Inscription et informations complémentaires :\r\nLes places sont limitées ! Assurez-vous de réserver votre siège dès maintenant en nous contactant via [inserer le lien d\'inscription ou l\'email de contact]. Pour plus d\'informations, suivez-nous sur nos plateformes de réseaux sociaux [inserer les liens] et restez à jour avec les dernières annonces.\r\n\r\n🎓 En collaboration avec l\'ENSA :\r\nNous sommes fiers de collaborer avec l\'École Nationale des Sciences Appliquées pour cet événement éducatif et inspirant.\r\n\r\nNous vous attendons avec impatience pour échanger, apprendre et inspirer l\'avenir de l\'industrie ensemble. Marquez vos calendriers et préparez-vous à être partie prenante de la révolution industrielle moderne !', '2022-08-27', 'amphi rouge', 'Conférences', 1, 'john.doe@example.com.jpeg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `inf`
--

CREATE TABLE `inf` (
  `n_id` int(11) NOT NULL,
  `notification_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inf`
--

INSERT INTO `inf` (`n_id`, `notification_name`, `message`, `active`, `type`) VALUES
(1, 'Nouveau message', 'Vous avez un nouveau message dans votre boîte de réception.', 0, 'Message'),
(2, 'Mise à jour de profil', 'Votre profil a été mis à jour avec succès.', 0, 'Profil'),
(3, 'Nouveau commentaire', 'Un nouveau commentaire a été ajouté à votre publication.', 0, 'Commentaire');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_inscriptions` int(11) NOT NULL,
  `id_evenement` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id_inscriptions`, `id_evenement`, `id_utilisateur`, `date_inscription`) VALUES
(1, 1, 1, '2024-01-11 16:01:31'),
(2, 2, 2, '2024-01-11 16:01:31'),
(3, 3, 3, '2024-01-11 16:01:31'),
(4, 1, 1, '2024-01-11 16:02:17'),
(5, 2, 2, '2024-01-11 16:02:17'),
(6, 3, 3, '2024-01-11 16:02:17'),
(7, 47, 9, '2024-01-14 21:46:46'),
(8, 1, 1, '2024-01-14 21:47:31');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_notification` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id_notification`, `id_utilisateur`, `message`, `date_notification`, `is_read`) VALUES
(1, 1, 'Nouveau message reçu.', '2024-01-13 23:44:33', 0),
(2, 1, 'Mise à jour de profil.', '2024-01-13 23:44:33', 0),
(3, 1, 'Invitation à un événement.', '2024-01-13 23:44:33', 0),
(4, 2, 'Vous avez un nouveau message non lu.', '2024-01-13 23:44:33', 0),
(5, 2, 'Offre spéciale en cours.', '2024-01-13 23:44:33', 0),
(6, 2, 'Rappel de rendez-vous.', '2024-01-13 23:44:33', 0),
(7, 3, 'Félicitations pour votre inscription.', '2024-01-13 23:44:33', 0),
(8, 3, 'Nouvel article publié.', '2024-01-13 23:44:33', 0),
(9, 3, 'Votre compte a été mis à jour.', '2024-01-13 23:44:33', 0),
(10, 4, 'Nouveau message reçu.', '2024-01-13 23:44:33', 0),
(11, 4, 'Mise à jour de profil.', '2024-01-13 23:44:33', 0),
(12, 4, 'Invitation à un événement.', '2024-01-13 23:44:33', 0),
(13, 5, 'Vous avez un nouveau message non lu.', '2024-01-13 23:44:33', 0),
(14, 5, 'Offre spéciale en cours.', '2024-01-13 23:44:33', 0),
(15, 5, 'Rappel de rendez-vous.', '2024-01-13 23:44:33', 0),
(16, 6, 'Félicitations pour votre inscription.', '2024-01-13 23:44:33', 0),
(17, 6, 'Nouvel article publié.', '2024-01-13 23:44:33', 0),
(18, 6, 'Votre compte a été mis à jour.', '2024-01-13 23:44:33', 0),
(19, 7, 'Nouveau message reçu.', '2024-01-13 23:44:33', 0),
(20, 7, 'Mise à jour de profil.', '2024-01-13 23:44:33', 0),
(21, 7, 'Invitation à un événement.', '2024-01-13 23:44:33', 0),
(22, 8, 'Vous avez un nouveau message non lu.', '2024-01-13 23:44:33', 0),
(23, 8, 'Offre spéciale en cours.', '2024-01-13 23:44:33', 0),
(24, 8, 'Rappel de rendez-vous.', '2024-01-13 23:44:33', 0),
(25, 9, 'Félicitations pour votre inscription.', '2024-01-13 23:44:33', 0),
(26, 9, 'Nouvel article publié.', '2024-01-13 23:44:33', 0),
(27, 9, 'Votre compte a été mis à jour.', '2024-01-13 23:44:33', 0),
(28, 10, 'Nouveau message reçu.', '2024-01-13 23:44:33', 0),
(29, 10, 'Mise à jour de profil.', '2024-01-13 23:44:33', 0),
(30, 10, 'Invitation à un événement.', '2024-01-13 23:44:33', 0),
(31, 11, 'Vous avez un nouveau message non lu.', '2024-01-13 23:44:33', 0),
(32, 11, 'Offre spéciale en cours.', '2024-01-13 23:44:33', 0),
(33, 11, 'Rappel de rendez-vous.', '2024-01-13 23:44:33', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateurs` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `image_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateurs`, `nom`, `prenom`, `email`, `mot_de_passe`, `image_profil`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', 'motdepasse123', NULL),
(2, 'Smith', 'Alice', 'alice.smith@example.com', 'mdp123', NULL),
(3, 'Brown', 'Emma', 'emma.brown@example.com', 'securepassword', NULL),
(4, 'Doe', 'John', 'john.doe@example.com', 'motdepasse123', NULL),
(5, 'Smith', 'Alice', 'alice.smith@example.com', 'mdp123', NULL),
(6, 'Brown', 'Emma', 'emma.brown@example.com', 'securepassword', NULL),
(7, 'souiles', 'aymane', 'nikogamesdu02@gmail.com', 'lolipop12!', NULL),
(8, 'souiles', 'aymane', 'nikogamesdu02@gmail.com', 'lolipop12!', NULL),
(9, 'taouab', 'rim', 'taouab.rim@uit.ac.ma', '123abc', NULL),
(10, 'alaoui', 'aymane', 'alaoui.aymane@uit.ac.ma', 'ana2inssanbassit', NULL),
(11, 'hamid', 'benani', 'hamid.hamid@uit.ac.ma', '124578', NULL),
(12, 'azert', 'qwerty', 'likomp@hujo.com', 'lolipop15448', NULL),
(13, 'hakim', 'bennani', 'hakim.bennani@gmail.com', 'hakim.bennani', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_administrateurs`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id_evenements`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `inf`
--
ALTER TABLE `inf`
  ADD PRIMARY KEY (`n_id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_inscriptions`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_administrateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id_evenements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `inf`
--
ALTER TABLE `inf`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id_inscriptions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD CONSTRAINT `administrateurs_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`id_evenements`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administrateurs` (`id_administrateurs`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_evenement`) REFERENCES `evenements` (`id_evenements`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_utilisateurs` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateurs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
