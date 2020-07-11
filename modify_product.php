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
<h2>You want to change someting in your product? Enter your product ID and make some changes</h2>

<div class="" id="myForm1">
<form method= "post" action="" class="form-container">
  <fieldset> <legend>Product Modifications</legend> 
  <p>
  <label for="id"><b>Enter Product ID</b></label><br>
  <input type="int" placeholder="product to modify" name="oldid" required><br>
  </p>
  <input name="submit_id" type="submit" value="Select" />
  </fieldset>
</form>
</div>
    
<?php
include('db.php');
session_start();
error_reporting(0);
$z = $_SESSION['visit'];
if ($_SESSION['visit'] ==1)
{
	echo "<html> <h2 Welcome </h2> </html>";
}
$oldid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST['submit_id'])
	{
		$oldid = $_POST["oldid"];
		$query = "DELETE FROM `Estoreapp`.`Product` WHERE ProductID='$oldid';";
		$result = mysqli_query($con,$query);
				if($result == true) 
					echo "<br>Product found<br><br>";
				else
					echo "<br>Product not found<br><br>";
	}
}

?>

<div class="form-popup" id="myForm2">
  <form method= "post" action="" class="form-container">
  <fieldset> <legend>New data for product</legend> 
	<p>
    <label for="id"><b>Product ID</b></label><br>
    <input type="int" placeholder="Enter product ID" name="id" required><br>
	</p>
	<p>
	 <label for="price"><b>Price</b></label><br>
    <input type="float" placeholder="How much?" name="price" required><br>
	</p>
	<p>
	 <label for="pname"><b>Name</b></label><br>
    <input type="text" placeholder="Enter product name" name="pname" required><br>
	</p>
    <label for="category"><b>Category</b></label><br>
    <input type="text" placeholder="Enter category" name="category" ><br>
	</p>
	<label for="description"><b>Description</b></label><br>
    <input type="text" placeholder="Describe your product" name="description" ><br>
	</p>
	<label for="rating"><b>Rating</b></label><br>
    <input type="float" placeholder="What's the rating like?" name="review" ><br>
	</p>
	<label for="quantity"><b>Quantity</b></label><br>
    <input type="int" placeholder="How many units?" name="quantity" ><br>
	</p>
	<label for="userid"><b>Your ID</b></label><br>
    <input type="int" placeholder="Enter your ID" name="userid" ><br>
	</p>
	</fieldset>
	<input name="submit_new" type="submit" value="Insert New Data" />
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
  <form method="post" action="shopowner.php"> 
  <button type="submit" >Back</button>    
  </form>
</div>

<?php
include('db.php');
//echo "DB connected"."<br>";
$z = $_SESSION['visit'];
if ($_SESSION['visit'] ==1)
{
	echo "<html> <h2 Welcome </h2> </html>";
}
$id = $price = $name = $category = $description = $review = $quantity = $userid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if ($_POST['submit_new'])
	{		
		$id = $_POST["id"]; 
		$price = $_POST["price"];
		$pname = $_POST["pname"]; 
		$category = $_POST["category"];
		$description = $_POST["description"];
		$review = $_POST["review"];
		$quantity = $_POST["quantity"];
		$userid = $_POST["userid"];

		$ins_q  = "INSERT INTO `Estoreapp`.`Product` (`ProductID`,`Price`,`ProductName`,`Category`,`Description`,`ReviewScale`,`Quantity`,`UserID`) VALUES ('$id','$price','$pname','$category','$description','$review','$quantity','$userid');";
		$res = mysqli_query($con,$ins_q);
		if($res == true) 
			echo "<br>Product successfully modified";
		else
			echo "<br>Product failed to modify";
	}
}

?>

<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}
function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
function openForm1() {
  document.getElementById("myForm2").style.display = "block";
}
function closeForm1() {
  document.getElementById("myForm2").style.display = "none";
}
 
</script>
</body>
</html>