<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body {
background-image: url('images/estore_intro.gif'), url('images/cart.jpg'); 
background-position: left top, bottom;
background-size: auto, 1600px 600px;
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>

<title>Home Page</title>

</head>
<body>
<div class="form">
<br><br><br><br><br><br><br><br><br>
<center><h1>E-store</h1></center>
<center><h3>Your Perfect Online Shopping Experience</h3></center>
<h2>Log In</h2>
<form method="post" action=""> 
<input type="text" name="userid" placeholder="Enter User id" required />
<input type="password" name="password" placeholder="Enter Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='reg.php'>Register Here</a></p>
<h6>2020-All rights reserved</h6>
<h6> 
</div>



<?php
session_start();
$_SESSION['visit'] = "2";
include('db.php');
$type = "";
$id = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$id = $_POST["userid"];
$pass = $_POST["password"];
$admin_id = "SELECT * FROM `estoreapp`.`userlogin` AS U, `estoreapp`.`admin` AS A WHERE U.UserID=A.UserID and U.Username='$id' and U.Password='$pass';";
$customer_id = "SELECT * FROM `userlogin` AS U, `estoreapp`.`customer` AS C WHERE U.UserID=C.UserID and U.Username='$id' and U.Password='$pass';";
$shopowner_id = "SELECT * FROM `userlogin` AS U,`estoreapp`.`shopowner` AS S WHERE U.UserID=S.UserID and U.Username='$id' and U.Password='$pass';";

$admin_res = mysqli_query($con,$admin_id);
$customer_res = mysqli_query($con,$customer_id);
$shopowner_res = mysqli_query($con,$shopowner_id);

error_reporting(0);

if ($admin_res->num_rows > 0)
	
	{
		$type = "admin";
		$_SESSION['admin'] = $id;
	}
else if ($customer_res->num_rows > 0)
	
	{
		$type = "customer";
		$_SESSION['customer'] = $id;
	}
else if ($shopowner_res->num_rows > 0)
	
	{
		$type = "shopowner";
		$_SESSION['shopowner'] = $id;
	}

if($type == "customer")
	header('Location: customer.php');
else if($type == "shopowner")
	header('Location: shopowner.php');
else if($type == "admin")
	header('Location: admin.php');
else
	echo "Please enter valid information <br>";

}

?>
</body>
</html>