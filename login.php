<?php 

session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php"); 
}
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	
	$_SESSION['adminloggedIN'] = false;
	$uname = ($_POST['uname']);
	$pass = ($_POST['password']);

	if($uname === 'admin' && $pass === 'admin')
		$_SESSION['adminloggedIN'] = true;
		$_SESSION['admin'] = false;

		
	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
        $pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['id'];
				
            	header("Location: BestBuy/home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}