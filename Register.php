<?php 
require_once 'Database.php';
require_once 'User.php';

$database = new Database();
$user = new User($database);

$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validimi
    if(empty($_POST['emri'])) $errors[] = "Emri është i detyrueshëm";
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Email jo valid";
    if(strlen($_POST['password']) < 6) $errors[] = "Passwordi duhet të ketë të paktën 6 karaktere";
    if($_POST['password'] !== $_POST['confirm-password']) $errors[] = "Passwordet nuk përputhen";

    if(empty($errors)) {
        if($user->register($_POST['emri'], $_POST['email'], $_POST['password'])) {
            header("Location: login.php");
            exit;
        } else {
            $errors[] = "Regjistrimi dështoi";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="styles/Register.css">
</head>

<body>

    <?php if(!empty($errors)): ?>
    <div class="errors">
        <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
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
        <h2>Regjistrohu tani!</h2>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="name">Emri dhe Mbiemri</label>
                <input type="text" id="name" name="emri" >
            </div>

            <div class="input-group">
                <label for="email">Email Adressa</label>
                <input type="email" id="email" name="email" >
            </div>

            <div class="input-group">
                <label for="password">Passwordi</label>
                <input type="password" id="password" name="password" >
            </div>

            <div class="input-group">
                <label for="confirm-password">Konfirmo Passwordin</label>
                <input type="password" id="confirm-password" name="confirm-password" >
            </div>

            <div class="submit-group">
                <button type="submit">Regjistrohu</button>
            </div>
        </form>
    </div>
    <br><br><br>
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
<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        let isValid = true;
    
        
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirm-password");
    
      
        const errorMessages = [];
    
       
        if (name.value.trim() === "") {
            isValid = false;
            errorMessages.push("Ju lutem plotësoni emrin dhe mbiemrin.");
        } else if (name.value.trim().length < 3) {
            isValid = false;
            errorMessages.push("Emri dhe mbiemri duhet të ketë të paktën 3 shkronja.");
        }
    
      
        if (!validateEmail(email.value)) {
            isValid = false;
            errorMessages.push("Ju lutem plotësoni  email adresën  e vlefshme.");
        }
    
        if (password.value.trim() === "") {
            isValid = false;
            errorMessages.push("Ju lutem plotësoni  passwordin.");
        } else if (password.value.length < 7) {
            isValid = false;
            errorMessages.push("Passwordi duhet të ketë të paktën 7 karaktere.");
        }
    
        
        if (password.value !== confirmPassword.value) {
            isValid = false;
            errorMessages.push("Passwordi dhe konfirmimi i password-it nuk janë të njëjta .");
        }
    
      
        if (!isValid) {
            event.preventDefault();
            alert(errorMessages.join("\n"));
        }
    });
    
    
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
    </script>
    
</html>