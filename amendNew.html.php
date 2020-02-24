<HTML>
<HEAD>
<TITLE>Amend or View a Supplier</TITLE>
</HEAD>
<link rel="stylesheet" href="amendViewSupplier.css" type="text/css">

</head>

<body bgcolor ="#000000" style="overflow: hidden">

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
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');//separates the variables by the comma in the sql query in listbox
	document.getElementById("amendid").value = personDetails[0];
	document.getElementById("amendtradingname").value = personDetails[1];
	document.getElementById("amendstreet").value = personDetails[2];
	document.getElementById("amendtown").value = personDetails[3];
	document.getElementById("amendcounty").value = personDetails[4];
	document.getElementById("amendtelephonenumber").value = personDetails[5];
	document.getElementById("amendfaxnumber").value = personDetails[6];
	document.getElementById("amendwebaddress").value = personDetails[7];
	document.getElementById("amendemailaddress").value = personDetails[8];
}
function toggleLock()
{
	if(document.getElementById("amendViewbutton").value == "Amend Details")
	{
		document.getElementById("amendtradingname").disabled = false;//enabled for changes to be made, double negative
		document.getElementById("amendstreet").disabled = false;
		document.getElementById("amendtown").disabled = false;
		document.getElementById("amendcounty").disabled = false;
		document.getElementById("amendtelephonenumber").disabled = false;
		document.getElementById("amendfaxnumber").disabled = false;
		document.getElementById("amendwebaddress").disabled = false;
		document.getElementById("amendemailaddress").disabled = false;
		document.getElementById("amendViewbutton").value = "View Details";//changes the button display to 'view'
	}
	else
	{
		document.getElementById("amendtradingname").disabled = true;//just a view list, no changes can be made
		document.getElementById("amendstreet").disabled = true;
		document.getElementById("amendtown").disabled = true;
		document.getElementById("amendcounty").disabled = true;
		document.getElementById("amendtelephonenumber").disabled = true;
		document.getElementById("amendfaxnumber").disabled = true;
		document.getElementById("amendwebaddress").disabled = true;
		document.getElementById("amendemailaddress").disabled = true;
		document.getElementById("amendViewbutton").value = "Amend Details";//changes the button display to 'amend'
	}
}
function confirmCheck()
{
	var response;
	response= confirm('Are you sure you want to save these changes?');
	if(response)
	{
		document.getElementById("amendtradingname").disabled = false;
		document.getElementById("amendstreet").disabled = false;
		document.getElementById("amendtown").disabled = false;
		document.getElementById("amendcounty").disabled = false;
		document.getElementById("amendtelephonenumber").disabled = false;
		document.getElementById("amendfaxnumber").disabled = false;
		document.getElementById("amendwebaddress").disabled = false;
		document.getElementById("amendemailaddress").disabled = false;
		return true;
	}
	else
	{
		//resets everything
		populate();
		toggleLock();
		return false;
	}
}
</script>
<form name="AmendViewSupplier" class="amendViewSupplier" action="amendViewSupplier.php" onsubmit="return confirmCheck()" method="post" autocomplete="on" >

<h1 class="heading">Amend/View a Supplier</h1>	

<?php include 'listbox.php'; ?>

<input type ="button" value="Amend Details" name="amendViewButton" id="amendViewbutton" onclick="toggleLock()">

	<table class="table" cellspacing="10">
	<tr><td><label>SupplierID</td> <td> <input type ="text" name="amendid" id ="amendid" READONLY> </label></td><tr>
	<td><label>Trading Name</td> <td> <input type="text" name="amendtradingname" id="amendtradingname" disabled> </label></td></tr>
	<td><label>Street</td> <td> <input type="text" name="amendstreet" id="amendstreet" disabled> </label></td></tr>
	<td><label>Town</td> <td> <input type="text" name="amendtown" id="amendtown" disabled> </label></td></tr>
	<td><label>County</td> <td> <input type="text" name="amendcounty" id="amendcounty" disabled> </label></td></tr>
	<td><label>Phone Number</td> <td> <input type="text" name="amendtelephonenumber" id="amendtelephonenumber" disabled> </label></td></tr>
	<td><label>Fax Number</td> <td> <input type="text" name="amendfaxnumber" id="amendfaxnumber" disabled> </label></td></tr>
	<td><label>Web Address</td> <td> <input type="text" name="amendwebaddress" id="amendwebaddress" disabled> </label></td></tr>
	<td><label>Email Address</td> <td> <input type="text" name="amendemailaddress" id="amendemailaddress" disabled> </label></td></tr>
	</table>
	<div class="myButton">
	<input type="submit" value="Save Changes"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="reset" value="Clear Details" name="reset"/>
	</div>
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>

