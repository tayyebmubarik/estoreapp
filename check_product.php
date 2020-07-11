<html>
<body>
<link rel="stylesheet" href="style2.css">
<style>
body {
background-image: url('images/estore_intro.gif'); 
background-repeat: repeat-x;
background-color: #FFB6C1;
}
</style>
<br><br><br><br><br><br><br><br><br><br>

<h2> Product List </h2>

<table class="tbl-cart" cellpadding="10" cellspacing="1" border='2'>
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Description</th>
<th style="text-align:left;" width="5%">Category</th>
<th style="text-align:left;" width="10%">Quantity</th>
<th style="text-align:left;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Rating</th>
</tr>

<form method="post" action="customer.php"> 
<button type="submit" >Back</button> 
<?php	
    include('db.php');
	$q_prod = "SELECT * FROM `estoreapp`.`product`;";
	$res_prod = mysqli_query($con,$q_prod);
    while ( $row = mysqli_fetch_array($res_prod, MYSQLI_ASSOC)){
	$a = $row['ProductName'];
	$b = $row['Description'];
	$c = $row['Category'];
	$d = $row['Quantity'];
	$e = $row['Price'];
	$f = $row['ReviewScale'];
	
	echo "<tr><td> ".$a." </td><td>  ".$b." </td><td>  ".$c." </td><td> ".$d." </td><td> ".$e." </td><td> ".$f." </td></tr>";
	echo "<br>";
}	
?>
</html>
</body>