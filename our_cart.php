<html>
<body>
<style>
body {
background-image: url('images/estore_intro.gif'); 
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>
<br><br><br><br><br><br><br><br><br>

<<div class="" id="myForm4">
<form method= "post" action="" class="form-container">
  <fieldset> <legend>Cart items</legend> 
  <p>
  <label for="proid"><b>Enter Product ID</b></label><br>
  <input type="int" placeholder="product to add to cart" name="prod_cart" required><br>
  </p>
  <input name="add_prod_cart" type="submit" value="Add" />
  </fieldset>
</form>
<form method="post" action="customer.php"> 
<button type="submit" >Back</button> 
</div>  

<?php
session_start();
include('db.php');

$q_a=$q_b=$res_a=$res_b=$row_a=$res_b=$a=$b="";

$userid = $_SESSION['customer'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($_POST['add_prod_cart'])
	{	
		$productid = $_POST["prod_cart"];
		$q_a = "SELECT ProductName FROM `Estoreapp`.`Product` WHERE ProductID='$productid';";
		$q_b = "SELECT Price FROM `Estoreapp`.`Product` WHERE ProductID='$productid';";
		
		$res_a = mysqli_query($con,$q_a);
		$res_b = mysqli_query($con,$q_b);
		
		$row_a = mysqli_fetch_array($res_a, MYSQLI_ASSOC);
		$row_b = mysqli_fetch_array($res_b, MYSQLI_ASSOC);
		
		$a = $row_a['ProductName'];
		$b = $row_b['Price'];
		
		echo $userid;
		
		/*$add_prod_query = "INSERT INTO `Estoreapp`.`Cart` (`CartID`,`ShippingFee`,`ProductName`,`ProductPrice`,`Discount`,`Total Price`,`UserID`) VALUES ();";
		$add_prod_result = mysqli_query($con,$add_prod_query);
		if($add_prod_result == true) 
			echo "<br>Product successfully added to cart";*/
		
	}
}
?>

</html>
</body>