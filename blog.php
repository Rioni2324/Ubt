<?php
$conn = new mysqli('localhost', 'root', '', 'tech_solutions');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT posts.*, users.emri as author 
        FROM posts 
        JOIN users ON posts.user_id = users.id 
        ORDER BY data_krijimit DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/blog.css">
   
   
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


    <div class="container my-5">
        <h1 class="text-center mb-4">Eksploroni Botën e Teknologjisë</h1>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="post-card">
                            <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="Blog Image" class="post-image">
                            <h2 class="post-title"><?php echo htmlspecialchars($row['titulli']); ?></h2>
                            <p class="post-content"><?php echo nl2br(htmlspecialchars($row['permbajtja'])); ?></p>
                            <small class="post-date">Posted on: <?php echo $row['data_krijimit']; ?></small>
                            <small class="post-author">Postuar nga: <?php echo htmlspecialchars($row['author']); ?></small>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">No posts found.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Tech Solutions. All Rights Reserved.</p>
        <ul class="footer-links">
      <li><a href="index.php">Ballina</a></li>
        <li><a href="about.php">Rreth nesh</a></li>
     <li><a href="contact.php">Kontaktoni</a></li>
        </ul>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script
 </body>
</html>



