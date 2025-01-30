<?php
require_once 'Database.php';
$database = new Database();
$conn = $database->getConnection();


header('Content-Type: text/html; charset=UTF-8');


$hero = $conn->query("SELECT * FROM hero_section LIMIT 1")->fetch();
$sherbimet = $conn->query("SELECT * FROM sherbimet_ballina")->fetchAll();
$vizioni = $conn->query("SELECT * FROM vizion_mision WHERE lloji = 'vizioni'")->fetch();
$misioni = $conn->query("SELECT * FROM vizion_mision WHERE lloji = 'misioni'")->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Solutions</title>
    <link rel="icon" href="logo-head.png" type="image/png"> 
    <link rel="stylesheet" href="styles/home.css">
    
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
                    

                    
                <?php if (isset($_SESSION['user_id'])): ?>
                    
                     <a href="index-login.php"></a>
                <?php else: ?>
                   
                    <li><a href="Register.php" class="btn">REGJISTROHU</a></li>
                    <li><a href="login.php" class="btn">KYQU</a></li>
                <?php endif; ?>
                </ul>
                <div class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>

   


    <section class="hero-section">
    <div class="hero-content">
        <h1><?= $hero['titulli'] ?></h1>
        <p><?= $hero['pershkrimi'] ?></p>
        <a href="contact.php" class="cta-button"><?= $hero['butoni'] ?></a>
    </div>
    <div class="hero-image">
        <img src="Images/<?= $hero['foto'] ?>" alt="Tech Solutions Hero Image">
    </div>
</section> <br> <br>

<section class="services">
    <h2>Sherbimet Tona</h2>
    <div class="service-list">
        <?php foreach ($sherbimet as $sherbim): ?>
            <div class="service-item">
                
                <div class="icon">
    <?php echo htmlspecialchars($sherbim['ikona'], ENT_QUOTES, 'UTF-8'); ?>
</div>
                <h3><?php echo $sherbim['titulli']; ?></h3>
                <p><?php echo $sherbim['pershkrimi']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section><br> <br>

<section class="vision-section">
    <h2><?= $vizioni['titulli'] ?></h2>
    <div class="vision-content">
        <div class="text-content">
            <?= $vizioni['permbajtja'] ?>
        </div>
        <div class="vision-image">
            <img src="Images/<?= $vizioni['foto'] ?>" alt="Vision Image">
        </div>
    </div>
</section> <br> <br> <br> <br>


<section class="mission-section">
    <div class="image-content">
        <img src="Images/<?= $misioni['foto'] ?>" alt="Mission Image">
    </div>
    <div class="text-content">
        <h2><?= $misioni['titulli'] ?></h2>
        <?= $misioni['permbajtja'] ?>
    </div>
</section> <br><br><br> <br>


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