<HTML>
<HEAD>
<TITLE>Place Orders</TITLE>
</HEAD>
<link rel="stylesheet" href="placeOrders.css" type="text/css">

</head>

<body bgcolor="#000000" style="overflow: hidden">

		<nav id="main_nav">
			<ul>
				<li class="main">
					<a href="">Counter Sales</a>
				</li>
				<li class="main">
					<a href="">Take Funeral Details</a>
				</li>
				<li class="main">
					<a href="">Payments from Customers</a>
				</li>
				<li class="main">
					<a href="placeOrders.html.php">Place Orders</a>
				</li>
				<li class="main">
					<a href="">Receive Goods</a>	
				</li>
				<li class="main">
					<a href="">New Invoices from Suppliers</a>	
				</li>
				<li class="main">
					<a href="">Payments to Suppliers</a>	
				</li>
				<li class="main">
					<a href="">File Maintenance</a>
					<ul>
						<li><a href="">Supplier Maintenance</a>
							<ul>
								<li><a href="addSupplier.html">Add a New Supplier</a></li>
								<li><a href="deleteSupplier.html.php">Delete a Supplier</a></li>
								<li><a href="amendNew.html.php">Amend/View a Supplier</a></li>
							</ul>
						</li>
						<li><a href="">Stock Maintenance</a>
							<ul>
								<li><a href="">Add a New Stock Item</a></li>
								<li><a href="">Delete a Stock Item</a></li>
								<li><a href="">Amend/View a Stock Item</a></li>
							</ul>
						</li>
						<li><a href="">Customer Maintenance</a>
							<ul>
								<li><a href="">Add a New Customer</a></li>
								<li><a href="">Delete a Customer</a></li>
								<li><a href="">Amend/View a Customer</a></li>
							</ul>
						</li>
						<li><a href="">Employee Maintenance</a>
							<ul>
								<li><a href="">Add a New Employee</a></li>
								<li><a href="">Delete a Employee</a></li>
								<li><a href="">Amend/View a Employee</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="main">
					<a>Reports Menu</a>	
					<ul>
						<li><a href="">Funeral Costs Report</a></li>
						<li><a href="">Stock Report</a></li>
						<li><a href="">Payments to suppliers Report</a></li>
						<li><a href="">Supplier Report</a></li>
						<li><a href="">Payment from Customers Report</a></li>
					</ul>
				</li>
				<li class="main">
					<a>Quit</a>	
				</li>
			</ul>
		</nav>
<script>
function populate()
{
	var sel = document.getElementById("listboxOrder");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var orderDetails = result.split(',');
	document.getElementById("orderstockid").value = orderDetails[0];
	document.getElementById("ordersupplierid").value = orderDetails[1];
	document.getElementById("orderdescription").value = orderDetails[2];
	document.getElementById("orderquantity").value = orderDetails[3];
	document.getElementById("orderreorderlevel").value = orderDetails[4];
	document.getElementById("orderreorderquantity").value = orderDetails[5];
}
function change()
{
		document.getElementById("orderstockid").disabled = true;
		document.getElementById("ordersupplierid").disabled = true;
		document.getElementById("orderdescription").disabled = true;
		document.getElementById("orderquantity").disabled = true;
		document.getElementById("orderreorderlevel").disabled = true;
		document.getElementById("orderreorderquantity").disabled = false;
}
function confirmCheck()
{
	var response;
	response= confirm('Are you sure you want to make this order?');
	if(response)
	{
		document.getElementById("orderstockid").disabled = false;
		document.getElementById("ordersupplierid").disabled = false;
		document.getElementById("orderdescription").disabled = false;
		document.getElementById("orderquantity").disabled = false;
		document.getElementById("orderreorderlevel").disabled = false;
		document.getElementById("orderreorderquantity").disabled = false;
		return true;
	}
	else
	{
		populate();
		
		return false;
	}
}
</script>
<form name="PlaceOrders" action="placeOrders.php" class="placeOrder" onsubmit="return confirmCheck()" method="post" autocomplete="on" >

<h1 class="heading">Place Order</h1>	

<div class="nameDiv">
<label>Stock Item: </label><?php include 'listboxOrder.php'; ?>
</div>

	<table class="table" cellspacing="10">
	<tr><td><label>StockID</td> <td> <input type ="text" name="orderstockid" id ="orderstockid" READONLY> </label></td><tr>
	<td><label>SupplierID</td> <td> <input type="text" name="ordersupplierid" id="ordersupplierid" disabled> </label></td></tr>
	<td><label>Description</td> <td> <input type="text" name="orderdescription" id="orderdescription" disabled> </label></td></tr>
	<td><label>Current Quantity</td> <td> <input type="text" name="orderquantity" id="orderquantity" disabled> </label></td></tr>
	<td><label>Reorder Level</td> <td> <input type="text" name="orderreorderlevel" id="orderreorderlevel" disabled> </label></td></tr>
	<td><label>Reorder Quantity</td> <td> <input type="text" name="orderreorderquantity" id="orderreorderquantity"> </label></td></tr>
	</table>
	<div class="myButton">
	<input type="submit" value="Place Orders"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="reset" value="Clear Details" name="reset"/>
	</div>
</form>

<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>