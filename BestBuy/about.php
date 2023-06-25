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
                <li><a href="index.php">Home</a></li>
                
                <?php
                session_start();
                    if ((isset($_SESSION['loggedIN']) && $_SESSION['loggedIN'] === true)) {
                        echo '<li><a class="active-page" href="dashboard.php">Dashboard</a></li>';

                      } 
                      else{

                        echo '<li><a class="avctive-page" href="about.php">About</a></li>
                        <li><a href="contactus.php">ContactUs</a></li>';
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
                Lorem ipsum        
                dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
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
          <i class="ficon fa-brands fa-twitter"></i>
          <i class="ficon fa-brands fa-github"></i>
          <i class="fa-brands fa-square-twitter "></i>
        </p>
      </footer>
</body>
</html>