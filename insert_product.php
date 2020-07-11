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
<h2>What product will you add next? Fill the form below</h2>

<div class="form-popup" id="myForm">
  <form method= "post" action="" class="form-container">
  <fieldset> <legend>Product Information</legend> 
    <h2>New Item</h2>
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
	<input name="submit" type="submit" value="Insert Data" />
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
  <form method="post" action="shopowner.php"> 
  <button type="submit" >Back</button>    
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<?php
session_start();
			error_reporting(0);
			include('db.php');

			$id = $price = $name = $category = $description = $review = $quantity = $userid = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") 
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
					echo "<br>Product successfully inserted";
				else
					echo "<br>Product not inserted";
			}
			
?>
</body>		
</html>