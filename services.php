<?php
require_once 'Database.php';
$database = new Database();
$conn = $database->getConnection();


$sherbimet = $conn->query("SELECT * FROM sherbimet")->fetchAll();
$statistikat = $conn->query("SELECT * FROM statistikat")->fetchAll();
$testimonials = $conn->query("SELECT * FROM testimonials")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Solutions</title>
    <link rel="icon" href="logo-head.png" type="image/png"> 
    <link rel="stylesheet" href="styles/services.css">
    
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
                    <li><a href="Register.php" class="btn">REGJISTROHU</a></li>
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

    <div class="container">
        <div class="section-header">
            <h1>SHËRBIMET TONA</h1>
            <p>Zgjidhje profesionale për biznesin tuaj</p>
        </div>

        <div class="features-grid">
            <?php foreach($sherbimet as $sherbim): ?>
            <div class="feature-card">
                <img src="Images/<?= $sherbim['foto'] ?>" alt="<?= $sherbim['titulli'] ?>">
                <h3><?= $sherbim['titulli'] ?></h3>
                <p><?= $sherbim['pershkrimi'] ?></p>
                <div class="more-content">
                    <?= $sherbim['permbajtje_shtese'] ?>
                </div>
                <a class="more-button" onclick="toggleContent(this)">MORE</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

     
    <div class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <?php foreach($statistikat as $statistika): ?>
                <div class="stat-item">
                    <div class="stat-number"><?= $statistika['numeri'] ?></div>
                    <div class="stat-text"><?= $statistika['teksti'] ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container testimonials">
        <h2 style="text-align: center; margin-bottom: 40px;">Çfarë Thonë Klientët Tanë</h2>
        <div class="features-grid">
            <?php foreach($testimonials as $testimonial): ?>
            <div class="testimonial-card">
                <p><?= $testimonial['komenti'] ?></p>
                <div class="client-name">- <?= $testimonial['emri'] ?>, <?= $testimonial['pozita'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

     
    <div class="container">
        <div class="download-banner">
            <h2>Shkarko Broshurën Tonë</h2>
            <p>Njihuni me të gjitha shërbimet tona në detaje</p>
            <a href="#" class="download-button">SHKARKO TANI</a>
        </div>
    </div>
    
   <footer class="footer">
    <p>&copy; 2024 Tech Solutions. Të gjitha të drejtat e rezervuara.</p>
    <ul class="footer-links">
        <li><a href="index.php">Ballina</a></li>
    <li><a href="about.php">Rreth nesh</a></li>
 <li><a href="contact.php">Kontaktoni</a></li>
    </ul>
</footer>
    <script src="index.js"></script>
    </body>