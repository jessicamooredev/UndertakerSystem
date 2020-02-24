<HTML>
<HEAD>
<TITLE>Delete a Supplier</TITLE>
</HEAD>
<link rel="stylesheet" href="deleteSupplier.css" type="text/css">

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
	var sel = document.getElementById("listboxDel");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("deleteid").value = personDetails[0];
	document.getElementById("deletetradingname").value = personDetails[1];
	document.getElementById("deletestreet").value = personDetails[2];
	document.getElementById("deletetown").value = personDetails[3];
	document.getElementById("deletecounty").value = personDetails[4];
	document.getElementById("deletetelephonenumber").value = personDetails[5];
	document.getElementById("deletefaxnumber").value = personDetails[6];
	document.getElementById("deletewebaddress").value = personDetails[7];
	document.getElementById("deleteemailaddress").value = personDetails[8];
}

function confirmCheck()
{
	var response;
	response= confirm('Are you sure you want to delete these details?');
	if(response)
	{
		document.getElementById("deletetradingname").disabled = false;
		document.getElementById("deletestreet").disabled = false;
		document.getElementById("deletetown").disabled = false;
		document.getElementById("deletecounty").disabled = false;
		document.getElementById("deletetelephonenumber").disabled = false;
		document.getElementById("deletefaxnumber").disabled = false;
		document.getElementById("deletewebaddress").disabled = false;
		document.getElementById("deleteemailaddress").disabled = false;
		return true;
	}
	else
	{
		populate();
		return false;
	}
}
</script>
<form name="Delete Supplier" class="deleteSupplier" action="deleteSupplier.php" onsubmit="return confirmCheck()" method="post" autocomplete="on" >

<h1 class="heading">Delete a Supplier</h1>	
<div class="nameDiv">
<label>Supplier Name</label>
<?php include 'listboxDel.php'; ?>
</div>
	<table class="table" cellspacing="10">
	<tr><td><label>SupplierID</td> <td> <input type ="text" name="deleteid" id ="deleteid" READONLY> </label></td><tr>
	<td><label>Trading Name</td> <td> <input type="text" name="deletetradingname" id="deletetradingname" disabled> </label></td></tr>
	<td><label>Street</td> <td> <input type="text" name="deletestreet" id="deletestreet" disabled> </label></td></tr>
	<td><label>Town</td> <td> <input type="text" name="deletetown" id="deletetown" disabled> </label></td></tr>
	<td><label>County</td> <td> <input type="text" name="deletecounty" id="deletecounty" disabled> </label></td></tr>
	<td><label>Phone Number</td> <td> <input type="text" name="deletetelephonenumber" id="deletetelephonenumber" disabled> </label></td></tr>
	<td><label>Fax Number</td> <td> <input type="text" name="deletefaxnumber" id="deletefaxnumber" disabled> </label></td></tr>
	<td><label>Web Address</td> <td> <input type="text" name="deletewebaddress" id="deletewebaddress" disabled> </label></td></tr>
	<td><label>Email Address</td> <td> <input type="text" name="deleteemailaddress" id="deleteemailaddress" disabled> </label></td></tr>
	</table>
	<div class="myButton">
	<input type="submit" value="Delete Details"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="reset" value="Clear Details" name="reset"/>
	</div>
</form>
<img class="middlePic" src="light tree middle.jpg" hspace="20">
<div class="bottom"> <p class="bottom">A Dying Business-Your Death is Our Business</p></div>
</body>
</html>

