<?php
session_start();
require_once 'Database.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$conn = new mysqli('localhost', 'root', '', 'tech_solutions');


$posts = $conn->query("SELECT posts.*, users.emri as author FROM posts JOIN users ON posts.user_id = users.id")->fetch_all(MYSQLI_ASSOC);
$contacts = $conn->query("SELECT * FROM contacts")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/dashboard.css">

    
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

    <h1>Menaxhimi i Postimeve</h1>
    <table>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post['titulli'] ?></td>
            <td><?= substr($post['permbajtja'], 0, 50) ?>...</td>
            <td><?= $post['author'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Mesazhet e Kontaktit</h2>
    <table>
        <?php foreach($contacts as $contact): ?>
        <tr>
            <td><?= $contact['emri'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= substr($contact['mesazh'], 0, 50) ?>...</td>
        </tr>
        <?php endforeach; ?>
    </table>


    <?php
require_once 'Database.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$database = new Database();
$conn = $database->getConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulli = $_POST['titulli'];
    $permbajtja = $_POST['permbajtja'];
    $foto = $_POST['foto']; 

    try{ 
    $query = "INSERT INTO posts (titulli, permbajtja, foto, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$titulli, $permbajtja, $foto, $_SESSION['user_id']]);
    
    header("Location: dashboard.php");
    
} catch (PDOException $e)  {
    echo "Gabim gjatë ekzekutimit të query-t: " . $e->getMessage();
}
}
?>

<h2 style="text-align:center";>POSTIMET TEK BLOGS</h2>
<form method="POST">
    <input type="text" name="titulli" placeholder="Titulli">
    <textarea name="permbajtja" placeholder="Përmbajtja"></textarea>
    <label for="foto">Image URL:</label><br>
<input type="text" id="image_url" name="foto"><br><br>
    <button type="submit">Posto</button>
</form>

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