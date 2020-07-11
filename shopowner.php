<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body {
background-image: url('images/estore_intro.gif'); 
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>

<body>
</head>
<br><br><br><br><br><br><br><br><br>

<div class="form">
<h2>Welcome to your Shop</h2>

<form method="post" action="insert_product.php"> 
<input type="submit" name="ins" value="Insert product">   
</form>
<form method="post" action="modify_product.php"> 
<input type="submit" name="mod" value="Modify product" >
<br>
</form>
<form method="post" action="delete_product.php"> 
<input type="submit" name="del" value="Delete product" >
<br>
</div>
<form method="post" action="">
<input type="submit" name="log" value="Log out" >
<br><br>    
</form>

<?php
if(isset($_POST['log']))
{
	$_SESSION['emp'] = "";
	header('Location: login.php');
}
?>

</body>
</html>