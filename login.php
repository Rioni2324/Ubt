<?php
require_once 'Database.php';
require_once 'User.php';

$database = new Database();
$user = new User($database);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($user->login($_POST['email'], $_POST['password'])) {
        if($_SESSION['user_id']) {
            header("Location: index-login.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Email ose password i gabuar";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="styles/Login.css">
</head>
<body>

<?php if(isset($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

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


    <div class="container">
        <h2>Kyçu tani!</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="name">Emri dhe Mbiemri</label>
                <input type="text" id="name" name="name">
            </div>


            <div class="input-group">
                <label for="password">Passwordi</label>
                <input type="password" id="password" name="password">
            </div>

            

            <div class="submit-group">
                <button type="submit">Kyqu</button>
            </div>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">
        <p>&copy; 2024 Tech Solutions. All Rights Reserved.</p>
        <ul class="footer-links">
            <li><a href="Home.html">Ballina</a></li>
            <li><a href="About.html">Rreth nesh</a></li>
         <li><a href="Contact.html">Kontaktoni</a></li>
        </ul>
    </footer>

    <script src="index.js"></script>
</body>
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        let isValid = true;
    
    
        const name = document.getElementById("name");
        const password = document.getElementById("password");
    
    
      
        const errorMessages = [];
    
       
        if (name.value.trim() === "") {
            isValid = false;
            errorMessages.push("Ju lutem plotësoni emrin dhe mbiemrin.");
        } else if (name.value.trim().length < 3) {
            isValid = false;
            errorMessages.push("Emri dhe mbiemri duhet të ketë të paktën 3 shkronja.");
        }
        if (password.value.trim() === "") {
            isValid = false;
            errorMessages.push("Ju lutem plotësoni  passwordin.");
        }    
        if (!isValid) {
            event.preventDefault();
            alert(errorMessages.join("\n"));
        }
    });
    </script>
</html>
