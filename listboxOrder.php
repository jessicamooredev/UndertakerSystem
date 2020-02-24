<?php
include "db.inc.php";

$sql = "SELECT StockID, SupplierID, Description, Quantity, ReorderLevel, ReorderQuantity FROM Stock";

if(!$result = mysqli_query($con, $sql))
{
	die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listboxOrder' id='listboxOrder' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
	$stockid= $row['StockID'];
	$supplierid = $row['SupplierID'];
	$description = $row['Description'];
	$quantity = $row['Quantity'];
	$reorderlevel = $row['ReorderLevel'];
	$reorderquantity = $row['ReorderQuantity'];
	
	$allText = "$stockid,$supplierid,$description,$quantity,$reorderlevel,$reorderquantity";
	echo "<option value = '$allText'>$description</option>";	
}
echo "</select>";
mysqli_close($con);
?>