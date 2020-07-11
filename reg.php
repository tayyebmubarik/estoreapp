<!DOCTYPE html>
<html>
<head>
<style>
body {
background-image: url('images/estore_intro.gif'); 
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>

<title>Registration</title>

</head>
<body>
<div class="form">
<br><br><br><br><br><br><br><br><br>
<h2>New User Registration</h2>
<h5>Please fill the following:</h5>
<form method="post" action="">  
Enter ID: <input type="text" name="userid" value="" placeholder="Enter User id" required /><br><br>
First Name: <input type="text" name="Fname" value="" placeholder="Enter First Name" required /><br><br>
Last Name: <input type="text" name="Lname" value="" placeholder="Enter Last Name" /><br><br>
Date of Birth: <input type="date" name="dob" value="<?php echo date('YYYY-mm-dd'); ?>" placeholder="YYYY-MM-DD" required /><br><br>
Contact Number: <input type="text" name="contactnum" value="" placeholder="Ex:03112345678" required /><br><br>
City: <input type="text" name="city" value="" placeholder="City Name" required /><br><br>
Province: <input type="text" name="province" value="" placeholder="Province Name" required /><br><br>
Area: <input type="text" name="area" value="" placeholder="Area Name" required /><br><br>
Email: <input type="text" name="email" value="" placeholder="Enter Email" required /><br><br>
Username: <input type="text" name="username" value="" placeholder="Enter any username" required /><br><br>
Password: <input type="password" name="password" value="" placeholder="Enter a password" required /><br><br>
<input type="submit" name="submit" value="Register" />
</form>
</div>

<?php
include ('db.php');
session_start();
$_SESSION['visit'] = "1";

$id = $Fname = $Lname = $dob = $contactnum = $city = $province = $area = $username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$id = $_POST["userid"];
$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$dob = $_POST["dob"];
$contactnum = $_POST["contactnum"];
$city = $_POST["city"];
$province = $_POST["province"];
$area = $_POST["area"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$_SESSION['customer'] = $id;

if ($_POST["submit"])
{
$s = "INSERT INTO `Estoreapp`.`UserLogin` (`UserID`,`Email`,`Username`,`Password`) VALUES ('$id', '$email', '$username', '$password');";
$res2 = mysqli_query($con,$s);
$r = "INSERT INTO `Estoreapp`.`Customer` (`FirstName`,`LastName`,`DateOfBirth`,`ContactNumber`,`City`,`Province`,`Area`,`UserID`) VALUES ('$Fname', '$Lname', '$dob', '$contactnum', '$city', '$province', '$area', '$id');";
if (mysqli_query($con, $r))
	echo "<br>New record created successfully";
/*header('Location: shoes_bags.php');*/
}

}

?>


</body>
</html>