<?php
// PHP code here

$emailSent = false; // Flag to track if the email was sent

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted
    
    // Check if the email address field is not empty
    if (!empty($_POST['firstname'])) {
        // Call the JavaScript function to send email
        echo '<script>sendEmail();</script>';
        $emailSent = true;
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style1.css">
        <script src="https://kit.fontawesome.com/b970073805.js" crossorigin="anonymous"></script>
        
        <title>Better Buys | Contact</title>
    </head>

    <body>
        <header>
            <nav>
                
                <ul>
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="about.php">About</a></li>
                    <li><a class="avctive-page" href="contactus.php">ContactUs</a></li>
                </ul>
                <div class="contact_logo">
                    <img class="logoimg" src="img/logo.jpg" alt="Website Logo">
                </div>
            </nav>
        </header>
        <div class="container_contact">
            <form id = "emailForm" method="post">

                <label for="email">Email</label>
                <input type="text" id="email" name="firstname" placeholder="Enter your Email">

                <label for="name">Name</label>
                <input type="text" id="name" name="lastname" placeholder="Enter Name">

                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="india">INDIA</option>
                    <option value="usa">USA</option>
                    <option value="japan">JAPAN</option>
                </select>

                <label for="body">Content</label>
                <textarea id="body" name="body" placeholder="Query" style="height:200px"></textarea>
                
                <button type="submit" class="contact-btn" onclick="sendEmail()">Submit</button>
                <div class="success-container" id="successContainer">
                    <p>Email sent successfully! <button id="success_btn" onclick="closeSuccessMessage()">Close</button></p>
                </div>

            </form>
        </div>
        
        <footer class="flex-all-center">
            <footer class="flex-all-center">
                <p>
                    <i class="ficon fa-brands fa-twitter"></i>
                    <i class="ficon fa-brands fa-github"></i>
                    <i class="fa-brands fa-square-twitter "></i>
                </p>

            </footer>
        </footer>
        <script>
        function sendEmail() {
            var recipient = 'bestbyu@sales.com';
            var bodyVal = document.getElementById('body');
            var body = bodyVal.value;
            var subject = 'Regarding customer support.';

            var gmailUrl = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + encodeURIComponent(recipient) +
                '&su=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

            window.open(gmailUrl);
            var emailWindow = window.open(gmailUrl);
            emailWindow.onfocus = function () {
                setTimeout(function () {
                    document.getElementById("successContainer").style.display = "block";
                }, 5000); // Delay of 5000 milliseconds (5 seconds)
            };
        }
    </script>
    </body>

    <?php

    ?>


    </html>