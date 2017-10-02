//Name: Cathal Brady
//Student Number: C00202493
function populate()// sets the function called populate
{
	var sel = document.getElementById("listbox");// sts the varaible called listbox 
	var result;// sets the varaible result
	result = sel.options[sel.selectedIndex].value;//sets thwe result as the selected option in the selected Index position 
	var personDetails = result.split(',');// takes the persons details and splits it with the ,
	
	document.getElementById("StockID").value = personDetails[0];// assigns the value to the row 
	document.getElementById("SupplierID").value = personDetails[1];
	document.getElementById("ReorderLevel").value = personDetails[2];
	document.getElementById("ReorderQuantity").value = personDetails[3];
	document.getElementById("CostPrice").value = personDetails[4];
	document.getElementById("RetailPrice").value = personDetails[5];
	document.getElementById("SupplierName").value = personDetails[6];
	
}
function toggleLock()// function for the enabling of editing of the stock list.
{
	if(document.getElementById("Description").value == "Amend Details")// if the description == amend details do allow modification of the table 
	{
		document.getElementById("SupplierID").disabled = false;
		document.getElementById("ReorderLevel").disabled = false;
		document.getElementById("ReorderQuantity").disabled = false;
		document.getElementById("SupplierName").disabled = false;
		document.getElementById("CostPrice").disabled = false;
		document.getElementById("RetailPrice").disabled = false;
		document.getElementById("Description").value = "View Details";// allows the viewing of the details 
	}
	else
	{
		document.getElementById("SupplierID").disabled = true;
		document.getElementById("ReorderLevel").disabled = true;
		document.getElementById("ReorderQuantity").disabled = true;
		document.getElementById("SupplierName").disabled = true;
		document.getElementById("CostPrice").disabled = true;
		document.getElementById("RetailPrice").disabled = true;
		document.getElementById("Description").value = "Amend Details";// denies the viewing of the details 
	}
}
function confirmCheck()
{
	if(document.getElementById("Description").value == "View Stock")
	{
		alert("The databse can only update the database when the Query is set to amend");
		return false;
	}
	else
	{
		var response;
		response = confirm("Are you sure you want to amend this unit of stock from the stock List?");
		
		if(response)
		{
			document.getElementById("StockID").disabled = false;
			document.getElementById("Description").value = "View Details";
			return true;
		}
		else
		{
			return false;
		}
	
}
}
function checkReturn()
{
	if(complete == "true")
	{
		window.alert("Works");
	}
}

function help()// sets the help for the button
{
	alert
		(			
			+	" \n"
			+	"Amend Details will allow you to edit details \n"
			+	"It will change to View Details after being pressed by the user \n"
			+	"Submit will send the new details to the database for the change to be complete \n"
			+	"The clear button will reset the form to its original state with no details picked \n "	
		);
}
function refresh()// refreshes the window
{
	window.location.reload();
}
