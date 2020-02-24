<?php
include 'db.inc.php';
//if any changes submitted from the html, they will be updated to the table here
$sql = "UPDATE Supplier SET TradingName = '$_POST[amendtradingname]',
		Street = '$_POST[amendstreet]',
		Town = '$_POST[amendtown]',
		County = '$_POST[amendcounty]',
		TelephoneNumber = '$_POST[amendtelephonenumber]',
		FaxNumber = '$_POST[amendfaxnumber]',
		WebAddress = '$_POST[amendwebaddress]',
		EmailAddress = '$_POST[amendemailaddress]'
		WHERE SupplierID = '$_POST[amendid]' ";//links the changes to the associated ID
		
if(!mysqli_query($con,$sql))//if the connection doesn't happen
{
	echo "Error in connection ".mysql_error();
}
else
{
	if(mysqli_affected_rows($con)!=0)//if any rows come back changed, this if statement will be entered
	{
		$updateMessage = mysqli_affected_rows($con)." record(s) updated <br>";
		$updateMessage = "SupplierID ". $_POST['amendid'].", ".$_POST['amendtradingname']." "." has been updated";
	}
	else 
	{
		$updateMessage = "No records were changed";
	}
}
mysqli_close($con);
?>
<html>
<head>
<link rel="stylesheet" href="amendViewSupplier.css" type="text/css"><!--links to appropriate css file.--> 
</head>
<body bgcolor="#000000">
<form action = "amendNew.html.php" form class="confirmation" method = "POST">
<br>
<?php echo $updateMessage;?><!--message depends on the action taken on the table and the changes carried out,if any.-->
<br>
<input type = "submit" value = "Return to Amend/View Screen">
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
</body>
</html>
