<?php
require_once 'Database.php';
$database = new Database();
$conn = $database->getConnection();


$about = $conn->query("SELECT * FROM about_section LIMIT 1")->fetch();
$stats = $conn->query("SELECT * FROM stats")->fetchAll();
$partners = $conn->query("SELECT * FROM partners")->fetchAll();
$tech_services = $conn->query("SELECT * FROM tech_services")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions</title>
    <link rel="stylesheet" href="styles/About.css">
    
   
</head>
<body>
    <header class="header-home">
        <div class="container-header">
            <div class="logo-header">
                <img src="Images/logo-removebg-preview.png" alt="Tech Solutions Logo">
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="index.php">BALLINA</a></li>
                    <li><a href="about.php">RRETH NESH</a></li>
                    <li><a href="services.php">SHERBIMET</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contact.php">NA KONTAKTONI</a></li>
                    <li><a href="register.php" class="btn">REGJISTROHU</a></li>
                    <li><a href="login.php" class="btn">KYQU</a></li>
                </ul>
                <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>
    
    <section class="design-solution">
        <div class="content-wrapper">     
            <div class="left-section">
                <div class="main-image">
                    <img src="<?= $about['foto'] ?>" alt="Main person">
                </div>
                <div class="years-experience">
                    <?php foreach($stats as $stat): ?>
                    <div class="experience-card">
                        <div class="icon"><?= $stat['ikona'] ?></div>
                        <div>
                            <h2><?= $stat['numeri'] ?></h2>
                            <p><?= $stat['teksti'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="right-section">
                <h4>KUSH JEMI NE</h4>
                <h1><?= $about['titulli'] ?></h1>
                <p><?= $about['pershkrimi'] ?></p>
                
            </div>
        </div>
    </section>

    <section class="tech-offerings">
        <div class="tech-container">
            <h2>Zgjidhje Moderne Teknologjike për Rritjen e Biznesit Tuaj</h2>
            <div class="tech-services">
                <?php foreach($tech_services as $service): ?>
                <div class="tech-item">
                    <div class="tech-icon"><?= $service['ikona'] ?></div>
                    <h3><?= $service['titulli'] ?></h3>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="our-partners">
        <h2>Partnerët tanë</h2>
        <div class="slider-container">
            <div class="slider-track">
                <?php foreach($partners as $partner): ?>
                <img src="<?= $partner['logo'] ?>" alt="<?= $partner['emri'] ?>">
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2024 Tech Solutions. All Rights Reserved.</p>
        <ul class="footer-links">
            <li><a href="index.php">Ballina</a></li>
            <li><a href="about.php">Rreth nesh</a></li>
         <li><a href="contact.php">Kontaktoni</a></li>
        </ul>
    </footer>

    
    <script src="index.js"></script>
</body>
</html>
