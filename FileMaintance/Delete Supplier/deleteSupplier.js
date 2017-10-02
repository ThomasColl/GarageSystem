function populate()
{
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("delid").value = personDetails[0];
	document.getElementById("delSupplierName").value = personDetails[1];
	document.getElementById("delStreet").value = personDetails[2];
	document.getElementById("delTown").value = personDetails[3];
	document.getElementById("delCounty").value = personDetails[4];
	document.getElementById("delTelephone").value = personDetails[5];
	document.getElementById("delWebsite").value = personDetails[6];
	document.getElementById("delEmail").value = personDetails[7];
}
function confirmCheck()
{
	var response;
	response = confirm('Are you sure you want to delete this person?');
	if(response)
	{
		document.getElementById("delid").disabled = false;
		document.getElementById("delSupplierName").disabled = false;
		document.getElementById("delStreet").disabled = false;
		document.getElementById("delTown").disabled = false;
		document.getElementById("delCounty").disabled = false;
		document.getElementById("delTelephone").disabled = false;
		document.getElementById("delWebsite").disabled = false;
		document.getElementById("delEmail").disabled = false;

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
alert("Delete a supplier by selecting a supplier from the dropdown menu.");
}