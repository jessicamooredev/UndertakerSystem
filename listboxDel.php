<?php
include 'db.inc.php';

$sql = "SELECT SupplierID, TradingName, Street, Town, County, TelephoneNumber, FaxNumber, WebAddress, EmailAddress FROM Supplier";

if(!$result = mysqli_query($con, $sql))
{
	die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listboxDel' id='listboxDel' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
	$supplierID = $row['SupplierID'];
	$tradingName = $row['TradingName'];
	$street = $row['Street'];
	$town = $row['Town'];
	$county = $row['County'];
	$telephoneNumber = $row['TelephoneNumber'];
	$faxNumber = $row['FaxNumber'];
	$webAddress = $row['WebAddress'];
	$emailAddress = $row['EmailAddress'];
	
	$allText = "$supplierID,$tradingName,$street,$town,$county,$telephoneNumber,$faxNumber,$webAddress,$emailAddress";
	echo "<option value = '$allText'>$tradingName</option>";	
}
echo "</select>";
mysqli_close($con);
?>