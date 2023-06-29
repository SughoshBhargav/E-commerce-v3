<?php
session_start();
include "db_conn.php";

if (
    isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['re_password'])
) {

    $uname = ($_POST['uname']);
    $pass = ($_POST['password']);
    $re_pass = ($_POST['re_password']);

    $user_data = 'uname=' . $uname ;

    if (empty($uname)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    }  else if ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $pass)) {
        header("Location: signup.php?error=Password should contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long&$user_data");
        exit();
    } else {

        
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE user_name='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is taken, try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(user_name, password) VALUES('$uname', '$pass')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }

} else {
    header("Location: signup.php");
    exit();
}
?>
