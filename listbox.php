<?php
include 'db.inc.php';
//selecting all fields from the table to populate the empty text boxes assigned to each
$sql = "SELECT SupplierID, TradingName, Street, Town, County, TelephoneNumber, FaxNumber, WebAddress, EmailAddress FROM Supplier";

if(!$result = mysqli_query($con, $sql))//if the connection is not successful, this if statement is entered 
{
	die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id='listbox' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{	//gives fields of the table temporary variable names to add to a like of string of variables
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