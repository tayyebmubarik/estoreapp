<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body {
background-image: url('images/estore_intro.gif'), url('images/admin.jpg'); 
background-position: left top, right bottom;
background-size: auto, 500px 250px;
background-repeat: repeat-x, no-repeat;
background-color: #FFB6C1;
}
</style>
<body>
</head>
<br><br><br><br><br><br><br><br><br><br><br>

<h2>Administrator</h2>

<form action="" method="POST">
<input type="submit" name="complaint" value="Manage Complaints">
<br><br>
<input type="submit" name="log" value="Log out" >
<br><br>
</form>

<?php	
if(isset($_POST['complaint'])) 
    complaint();
if(isset($_POST['log']))
{
	$_SESSION['admin'] = "";
	header('Location: login.php');
}

function complaint()
{
echo "<html> <h2>Customer Complaints </h2> </html>";
include ('db.php');
$q = "SELECT * FROM `estoreapp`.`complaint`;";
$res = mysqli_query($con,$q);

echo "<table border = '1'>";
echo "<tr><td> Complaint Number </td><td> Shop Name </td><td> Issue </td></tr>";
 
while ( $row = mysqli_fetch_array($res, MYSQLI_ASSOC) )
{
	$a = $row['ComplaintNumber'];
	$b = $row['ShopName'];
	$c = $row['Issue'];
	echo "<tr><td> ".$a." </td><td>  ".$b." </td><td>  ".$c." </td></tr>";
	echo "<br>";	
}	
}
?>
</body>
</html>