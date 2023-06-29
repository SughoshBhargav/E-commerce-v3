<?php
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Better Buys | About</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b970073805.js" crossorigin="anonymous"></script>

</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                
                <?php
                    if ((isset($_SESSION['loggedIN']) && $_SESSION['loggedIN'] === true)) {
                        echo '<li><a class="active-page" href="dashboard.php">Dashboard</a></li>';

                      } 
                      else{

                        echo '<li><a class="active-page" href="about.php">About</a></li>
                        <li><a href="contactus.php">ContactUs</a></li>
                        <li><a  href="../logout.php">Logout</a></li>
                        ';
                      }
                      
                    
                ?>
            </ul>
            <div class="contact_logo">
                <img class = "logoimg"src="img/logo.jpg" alt="Website Logo" >
            </div>
        </nav>
    </header>

    <div class="about-section">
        <div class="inner-container">
            <h1>About Us</h1>

            <p class="text">
            BetterBuys is your trusted online retailer for all your shopping needs. We offer high-quality products, exceptional service, and a seamless shopping experience. Shop with confidence and discover a world of convenience at BetterBuys.
            </p>

            <div class="details">
                <span>Cricket</span>
                <span>Jewelleries</span>
                <span>Clothes</span>
            </div>
        </div>
    </div>
    <footer>
    <p>
        <a href="https://linkedin.com"><i class="ficon fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/SughoshBhargav"><i class="ficon fa-brands fa-github"></i></a>
        <a href="https://twitter.com/"><i class="fa-brands fa-square-twitter"></i></a>
    </p>
      </footer>
</body>
</html>