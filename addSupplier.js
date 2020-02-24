function correctErrors()
{
	var x = document.forms["addSupplier"]["TradingName"].value;
	if(x !=   || x=="")
	{
		alert("Name must be only alphabetical characters");
		return false; 
	}
}
