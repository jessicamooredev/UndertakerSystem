<?php
include 'db.inc.php';
  
/*creating the unique id*/
$maxQ = "Select MAX(SupplierID) as maxID FROM Supplier";
$result = mysqli_query($con,$maxQ);

$row = mysqli_fetch_assoc($result);//using the answer from the query to be put in an array
$maxNo = $row['maxID'];//the current biggest number
$maxNo++;//new unique id number

/*to find out if there is already an entry made for a supplier by checking their name*/
/*									    table variable    html variable from form*/
$nameCheck = "SELECT * FROM Supplier WHERE TradingName = '$_POST[TradingName]'";

if(!$result = mysqli_query($con,$nameCheck))//if the connection isn't made
{
	die('Error in querying the database' . mysqli_error());//kills the connection if it doesn't work
}
$rowCount = mysqli_affected_rows($con);//counts the number, if any, of rows with the Supplier name being searched 
$_SESSION['TradingName']= $_POST['TradingName'];

if($rowCount > 0)//if there's a supplier already with the name being checked, this if statement is entered
{
	$alrMessage = "There is already a Supplier with that name <br> No entry added <br>";
}
else//if there is no supplier already with this name, this if statement is entered and all the details are stored to the Supplier table
{
	/*Table variables*/
	$sql = "Insert into Supplier (SupplierID,TradingName,Street,Town,County,TelephoneNumber,FaxNumber,WebAddress,EmailAddress) 
	VALUES ($maxNo,'$_POST[TradingName]','$_POST[Street]','$_POST[Town]','$_POST[County]','$_POST[TelephoneNumber]','$_POST[FaxNumber]','$_POST[WebAddress]','$_POST[EmailAddress]')";

	if(!mysqli_query($con,$sql))//if the connection doesn't work
	{
		die ("An error in the SQL Query:" . mysqli_error($con) );//prints out the connection error
	}
	 $alrMessage = "<br> A record has been added for " . $_POST['TradingName'] . " ";//validates that a supplier has been added with that name
}
mysqli_close($con);//stops the connection to the table
?>
<html>
<link rel="stylesheet" href="addSupplier.css" type="text/css">
<body bgcolor="#000000">
<form action = "addSupplier.html" form class="confirmation" method = "POST"><!--calls the css to display the associated message.-->
	<?php echo $alrMessage;?><!--will depend if the queries were successful or not.-->
	<input type="submit" value="Return to Insert Page"/>
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>