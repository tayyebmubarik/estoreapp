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

<h2> You can buy our quality products here. </h2>
<h3> Your favourite product is just one click away. </h3>
<form method="post" action="check_product.php"> 
<input type="submit" name="check" value="Check products">   
</form>
<form method="post" action="our_cart.php"> 
<input type="submit" name="cart" value="Your Cart" >
<br>
</form>
<form method="post" action="order_status.php"> 
<input type="submit" name="order" value="Order Status" >
<br>
</form>
<form method="post" action="complaints.php"> 
<input type="submit" name="sc" value="Suggestions/ Complaints" >
<br>
</form>
</div>
<form method="post" action="">
<input type="submit" name="log" value="Log out" >
<br><br>    

<?php
if(isset($_POST['log']))
{
	$_SESSION['emp'] = "";
	header('Location: login.php');
}
?>

</html>
</body>