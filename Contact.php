<?php
require_once 'Database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $conn = $database->getConnection();

    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $mesazh = $_POST['mesazh'];

    $query = "INSERT INTO contacts (emri, mbiemri, email, telefon, mesazh) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$emri, $mbiemri, $email, $telefon, $mesazh]);

    echo "<p>Mesazhi u dërgua!</p>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions</title>
    <link rel="stylesheet" href="styles/Contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <div class="left-section">
            <h2>Rreth Nesh</h2>
        <div class="contact-info">
            <p><i class="fas fa-map-marker-alt"></i><strong> Lokacioni:</strong> Prishtinë</p><br>
            <p><i class="fas fa-phone-alt"></i><strong> Numri:</strong> 049 123 456</p>      <br>  
        <p><i class="fas fa-envelope"></i><strong> Emaili:</strong> Tech@gmail.com</p>
            </div>
 </div>

     <div class="right-section">
              <h2>Na Kontaktoni</h2>
                <form action="contact.php" method="POST">
                   <input type="text" id="emri" name="emri" placeholder="Emri" >
                      <input type="text" id="mbiemri" name="mbiemri" placeholder="Mbiemri" >
                   <input type="email" id="email" name="email" placeholder="Emaili" >
                    <input type="text" id="telefon" name="telefon" placeholder="Nr Telefonit" >
                    <textarea id="mesazh" name="mesazh" rows="4" placeholder="Mesazhi" ></textarea>
                   <button type="submit">Dërgo</button>
               </form>
        </div>
    </div>

    
<br><br><br><br>


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
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
    
       
    
        form.addEventListener("submit", function (event) {
            let isValid = true;
            let errorMessages = [];
    
            
            const emri = document.getElementById("emri");
            const mbiemri = document.getElementById("mbiemri");
            const email = document.getElementById("email");
            const telefon = document.getElementById("telefon");
            const mesazh = document.getElementById("mesazh");
    
            
            if (!emri || emri.value.trim() === "") {
                isValid = false;
                errorMessages.push("Ju lutem plotësoni emrin.");
            }
            if (!mbiemri || mbiemri.value.trim() === "") {
                isValid = false;
                errorMessages.push("Ju lutem plotësoni mbiemrin.");
            }
            if (!email || !validateEmail(email.value.trim())) {
                isValid = false;
                errorMessages.push("Ju lutem plotësoni një email të vlefshëm.");
            }
            if (!telefon || !validatePhone(telefon.value.trim())) {
                isValid = false;
                errorMessages.push("Ju lutem plotësoni një numër telefoni të vlefshëm.");
            }
            if (!mesazh || mesazh.value.trim() === "") {
                isValid = false;
                errorMessages.push("Ju lutem shkruani mesazhin tuaj.");
            }
    
        
            if (!isValid) {
                event.preventDefault();
                alert(errorMessages.join("\n"));
            } else {
                console.log("Forma u plotesua me sukses!");
            }
        });
    });
    
   
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
    
    
    function validatePhone(phone) {
        const re = /^[0-9]{7,15}$/;
        return re.test(phone);
    }
    </script>
    
</html>