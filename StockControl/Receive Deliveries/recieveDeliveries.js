function populate()
{
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("recID").value = personDetails[0];
	document.getElementById("recDate").value = personDetails[1];
	document.getElementById("recName").value = personDetails[2];
	document.getElementById("recStreet").value = personDetails[3];
	document.getElementById("recTown").value = personDetails[4];
	document.getElementById("recCounty").value = personDetails[5];
	document.getElementById("recStockID").value = personDetails[6];
	document.getElementById("recDescription").value = personDetails[7];
	document.getElementById("recQuantity").value = personDetails[8];
}
function confirmCheck()
{
	var response;
	response = confirm('Are you sure you want to add these details?');
	if(response)
	{
		document.getElementById("recID").disabled = false;
		document.getElementById("recDate").disabled = false;
		document.getElementById("recName").disabled = false;
		document.getElementById("recStreet").disabled = false;
		document.getElementById("recTown").disabled = false;
		document.getElementById("recCounty").disabled = false;
		document.getElementById("recStockID").disabled = false;
		document.getElementById("recDescription").disabled = false;
		document.getElementById("recQuantity").disabled = false;

		return true;
	}
	else
	{
	populate();
	return false;
	}
}
function helpPrompt()
{
	alert("Select an Order ID from the menu, for the you want to change.");
}

function helpPrompt2()
{
	alert("Press 'Received to clarify that the order has been received.");
}