<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = sanitize($_POST["id"]);
    $imageURL = sanitize($_POST["imageURL"]);
    $text1 = sanitize($_POST["text1"]);
    $text2 = sanitize($_POST["text2"]);
    $text3 = sanitize($_POST["text3"]);

    if (!empty($id)) {
        $sql = "UPDATE images SET image_url='$imageURL', text_1='$text1', text_2='$text2', text_3='$text3' WHERE id=$id";
    } else {
        $sql = "INSERT INTO images (image_url, text_1, text_2, text_3) VALUES ('$imageURL', '$text1', '$text2', '$text3')";
    }

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record saved");</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET["delete"])) {
    $id = sanitize($_GET["delete"]);

    $sql = "DELETE FROM images WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record saved");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET["edit"])) {
  $id = sanitize($_GET["edit"]);

  $sql = "SELECT * FROM images WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();

      $imageURL = $row['image_url'];
      $text1 = $row['text_1'];
      $text2 = $row['text_2'];
      $text3 = $row['text_3'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Better Buys | Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b970073805.js" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    #editButton {
        color: black;
        font-weight: bold;
    }

    #deleteButton {
        color: black;
        font-weight: bold;
    }


    .update-btn{
        margine-left:0;
    }
    </script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="active-page" href="dashboard.php">Dashboard</a></li>
               
            </ul>
            <div class="contact_logo">
                <img class="logoimg" src="img/logo.jpg" alt="Website Logo">
            </div>
        </nav>
    </header>

    <main>
        <!-- Add your form to insert/update details -->
        <form method="post" action="dashboard.php" >
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
    <label for="imageURL">Image URL:</label>
    <input type="text" name="imageURL" id="imageURL" required value="<?php echo isset($_GET['edit']) ? $row['image_url'] : ''; ?>"><br>

    <label for="text1">Text 1:</label>
    <input type="text" name="text1" id="text1" required value="<?php echo isset($_GET['edit']) ? $row['text_1'] : ''; ?>"><br>

    <label for="text2">Text 2:</label>
    <input type="text" name="text2" id="text2" required value="<?php echo isset($_GET['edit']) ? $row['text_2'] : ''; ?>"><br>

    <label for="text3">Text 3:</label>
    <input type="text" name="text3" id="text3" required value="<?php echo isset($_GET['edit']) ? $row['text_3'] : ''; ?>"><br>

    <button class="update-btn btn btn-success"  type="submit" name="submit">Insert / Update</button>
</form>


        
<?php
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <div class="cards-container-dash">
        <div class="cards-dashboard-dash">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card-item-dash">
                    <img class="img-dash" src="<?php echo $row['image_url']; ?>" alt="">
                    <div class="lines">
                        <p><?php echo $row['text_1']; ?></p>
                        <p><?php echo $row['text_2']; ?></p>
                        <p><?php echo $row['text_3']; ?></p>
                        <div class="edit-delete-btn">
                            <button id="editButton" class="btn btn-admin btn-primary" onclick="editRecord(<?php echo $row['id']; ?>)">Edit</button>
                            <button id="deleteButton" class="btn btn-admin btn-danger" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo "No records found";
}
?>


  
    </main>

    <footer>
        <p>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-github"></i>
            <i class="fab fa-twitter-square"></i>
        </p>
    </footer>

    <script>
    function editRecord(id) {
        window.location.href = "dashboard.php?edit=" + id;
    }

    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "dashboard.php?delete=" + id;
        }
    }
    </script>
</body>

</html>
