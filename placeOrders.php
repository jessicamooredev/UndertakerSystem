<?php
//ref: for getting around reserved words http://php.net/manual/en/reserved.keywords.php
include 'db.inc.php';

date_default_timezone_set("UTC");  

//adding an entry to the Order Table
/*creating the unique id for OrderID*/
$maxQ = "Select MAX(OrderID) as maxID FROM `Order`";
$result = mysqli_query($con,$maxQ);

$row = mysqli_fetch_assoc($result);//using the answer from the query to be put in an array
$maxNoO = $row['maxID'];//the current biggest number
$maxNoO++;//new unique id number

	$sqlO = "Insert into `Order` (OrderID,OrderDate,SupplierID) 
	VALUES ($maxNoO,now(),'$_POST[ordersupplierid]')";
//ref: for now() function http://stackoverflow.com/questions/9541029/insert-current-date-in-datetime-format-mysql

	if(!mysqli_query($con,$sqlO))//if the connection doesn't work
	{
		die ("An error in the SQL Query:" . mysqli_error($con) );//prints out the connection error
	}
	
	else//if connection is successful
	{
			 $addOMessage = "<br>Order number " . $maxNoO ." made on " . date("Y/m/d") . "<br>";
//ref: for .date function http://www.w3schools.com/php/php_date.asp
	}		
//end of adding an entry to the Order Table

//adding an entry to Order/Item table
/*creating the unique id for OrderID*/
$maxQu = "Select MAX(`Order/ItemID`) as maxID FROM `Order/Item`";
$result = mysqli_query($con,$maxQu);

$row = mysqli_fetch_assoc($result);//using the answer from the query to be put in an array
$maxNoOI = $row['maxID'];//the current biggest number
$maxNoOI++;//new unique id number


$sqlOid = "SELECT OrderID as orderid FROM `Order`";
$resO = mysqli_query($con,$sqlOid);

$rowNo = mysqli_fetch_assoc($resO);
$inOrder = $rowNo['orderid'];

	$sqlOI = "Insert into `Order/Item` (`Order/ItemID`,OrderID,StockID,QuantityOrdered) 
	VALUES ($maxNoOI,$inOrder,'$_POST[orderstockid]','$_POST[orderreorderquantity]')";									  
	
if(!mysqli_query($con,$sqlOI))//if the connection doesn't work
	{
		die ("An error in the SQL Query:" . mysqli_error($con) );//prints out the connection error
	}
	
	else//if connection is successful
	{
			 $addOIMessage = "OrderItem number " . $maxNoOI ." made on " . date("Y/m/d") . "<br>";
//ref: for .date function http://www.w3schools.com/php/php_date.asp
	}	
//end of adding an entry to Order/Item table

//Outputting the Order type report thingy

$supid = "SELECT TradingName as SupplierName FROM Supplier WHERE SupplierID = '$_POST[ordersupplierid]"; 
$resS = mysqli_query($con, $supid);
$rowN = mysqli_fetch_assoc($resS);
$supName = $rowN['SupplierName'];

$orderReport = "Supplier Name ".$supName. " "; 
				
			/*	"<br>Stock Description ".$stockDesc. "<br>Stock ID ".$stockid.	
				"<br>Quantity of Stock ".$stockQuantity. " ";
			*/
mysqli_close($con);
?>
<HTML>
<HEAD>
<TITLE>Order and OrderItem updates</TITLE>
</HEAD>
<link rel="stylesheet" href="placeOrders.css" type="text/css">
</head>
<body bgcolor ="#000000" style="overflow: hidden">
<form action = "placeOrders.html.php" form class ="confirmChange" method="post" />
<?php echo $addOMessage;
	  echo $addOIMessage;
	  echo $orderReport;?>
<br>
<input type = "submit" value = "Return to Previous Screen">
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>