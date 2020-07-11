<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<style>
body {
background-image: url('images/estore_intro.gif'); 
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>

<body>
<br><br><br><br><br><br><br><br><br>
<h2>What product do you want to delete?</h2>

<div class="" id="myForm3">
<form method= "post" action="" class="form-container">
  <fieldset> <legend>Product Modifications</legend> 
  <p>
  <label for="proid"><b>Enter Product ID</b></label><br>
  <input type="int" placeholder="product to delete" name="prodid" required><br>
  </p>
  <input name="submit_del" type="submit" value="Delete" />
  </fieldset>
</form>
<form method="post" action="shopowner.php"> 
<button type="submit" >Back</button> 
</div>


<?php
session_start();
include('db.php');
$productid = "";
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST['submit_del'])
	{	
		$productid = $_POST["prodid"];
		$del_query = "DELETE FROM `Estoreapp`.`Product` WHERE ProductID='$productid';";
		$del_result = mysqli_query($con,$del_query);
		if($del_result == true) 
			echo "<br>Product successfully deleted";
	}
}

?>

<script>
function openForm() {
  document.getElementById("myForm3").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm3").style.display = "none";
}
</script>
</body>
</html>