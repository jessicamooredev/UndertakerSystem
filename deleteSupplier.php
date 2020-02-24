<?php
include 'db.inc.php';
  
$updateMessage="";
//ref: http://www.tutorialspoint.com/mysql/mysql-update-query.htm
$sql = "UPDATE Supplier SET Deleted = '1'
		WHERE SupplierID = '$_POST[deleteid]' ";
		
if(!mysqli_query($con,$sql))
{
	echo "Error in connection ".mysql_error();
}  
else
{
	if(mysqli_affected_rows($con)!= 0)
	{
		//$updateMessage = mysqli_affected_rows($con)." record(s) updated <br>";
		$updateMessage = "SupplierID ". $_POST['deleteid'].", ".$_POST['deletetradingname']." "." has been marked for deletion";
	}
	else 
	{
		$updateMessage = "Supplier already marked for deletion";
	}
}
mysqli_close($con);
?>
<html>
<head>
<link rel="stylesheet" href="deleteSupplier.css" type="text/css">
</head>
<body bgcolor="#000000">
<form action = "deleteSupplier.html.php" form class="confirmation" method = "POST">
<br>
<?php echo $updateMessage;?>
<br>
<input type = "submit" value = "Return to previous screen">
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
</body>
</html>
