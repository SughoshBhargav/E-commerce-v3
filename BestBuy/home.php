<!DOCTYPE html>
<html lang="en">

<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "bestbuy";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
    
session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php"); 
    exit();
}

if (isset($_SESSION['adminloggedIN']) && $_SESSION['adminloggedIN'] === true && $_SESSION['admin'] === false) {
    echo '<script>
        var expectedKey = "admin";
        var userInput = prompt("Enter Secrect Key :");
        if (userInput === expectedKey) {
            window.location.href = "home.php";
            exit();
        } else {
            window.location.href = "../index.php";
        }
    </script>';
    $_SESSION['admin'] = true;
}


?>

<head>
    <meta charset="UTF-8">
    <title>Better Buys</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b970073805.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>

<?php

?>
<body>
    <header>
        <nav>
            <ul>
                <li><a class="active-page" href="home.php">Home</a></li>
                <?php
                    if ((isset($_SESSION['adminloggedIN']) && $_SESSION['adminloggedIN'] === true)) {
                        echo '<li><a  href="dashboard.php">Dashboard</a></li>';
                      }
                        else{
                            echo '<li><a  href="about.php">About</a></li>
                                <li><a href="contactus.php">ContactUs</a></li>';
                          }
                ?>

            </ul>
            <div class="search">
                <input type="" name="search" id="" placeholder="Search for products,brand and more">
                <i class="fas fa-search"></i>
            </div>
                <ul class="logout"><li><a href="../logout.php">Logout</a></li></ul>

            <div class="logo">
                <img class="logoimg" src="img/logo.jpg" alt="Website Logo">
            </div>
        </nav>
    </header>

    <main>

        <div class="container">
            <div class="slider">
                <img class="img1" src="https://source.unsplash.com/1200x300/?mobile,laptop" alt="">
            </div>
            <div class="card">
                <h2>Join The Cricket Fun </h2>
                <div class="cards">
                    
                    <?php
                    $sql = "SELECT * FROM images";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="card-item">
                                <img src="<?php echo $row['image_url']; ?>" alt="">
                                <div class="lines">
                                    <p><?php echo $row['text_1']; ?></p>
                                    <p><?php echo $row['text_2']; ?></p>
                                    <p><?php echo $row['text_3']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
                </div>
                
                
            
                <!-- <div class="cards">

                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,cricket bat" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,cricket ball" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,gloves" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,stumps" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,pads" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,glass" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,guard" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?cricket,cricket caps" alt="">
                        <div class="lines">
                            <p>cricket items </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                </div> -->
                <hr>
                <h2>Buy some jewelleries </h2>
                <div class="cards">

                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?gold,necklace" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?diamond,ring" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?diamond ring,jewelleries" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?gold ring" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?bracelet" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?gold band" alt="">
                        <div class="lines">
                            <p>Jewelleries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?watch gold " alt="">
                        <div class="lines">
                            <p>Jewelleries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?gold earrings" alt="">
                        <div class="lines">
                            <p>Jewelleries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Buy Some mobile accesorries </h2>
                <div class="cards">

                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?mobile charger" alt="">
                        <div class="lines">
                            <p>Accesorries </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?mobile holder" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?mobile cover" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?mobile glass" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?tempered glass" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?otg cabel" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?charging wire" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?mobile tape" alt="">
                        <div class="lines">
                            <p>Accesorries</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Buy some cool Clothes </h2>
                <div class="cards">

                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?T-shirts" alt="">
                        <div class="lines">
                            <p>Clothes </p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?pants" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?trousers" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?pants" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?shirts" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?baby clothes" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/? clothing" alt="">
                        <div class="lines">
                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>grab now</p>
                        </div>
                    </div>
                    <div class="card-item">
                        <img src="https://source.unsplash.com/160x160/?kurtis" alt="">
                        <div class="lines">

                            <p>Clothes</p>
                            <p>min 20% off</p>
                            <p>gab now</p>

                        </div>
                    </div>
                </div>


            </div>

        </div>


    </main>

    <footer>
    <p>
        <a href="https://linkedin.com"><i class="ficon fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/SughoshBhargav"><i class="ficon fa-brands fa-github"></i></a>
        <a href="https://twitter.com/"><i class="fa-brands fa-square-twitter"></i></a>
    </p>
    </footer>
</body>

</html>