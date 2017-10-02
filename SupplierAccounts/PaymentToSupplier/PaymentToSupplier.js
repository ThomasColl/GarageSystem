//Name: Thomas Coll
//Student Number: C00204384

function populate()
{
	//use the listbox to get the elements, split it and then assign them to the relevant boxes
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("paymentid").value = personDetails[0];
	document.getElementById("paymentname").value = personDetails[1];
	document.getElementById("paymentstreet").value = personDetails[2];
	document.getElementById("paymenttown").value = personDetails[3];
	document.getElementById("paymentcounty").value = personDetails[4];
	document.getElementById("paymenttelephone").value = personDetails[5];
	document.getElementById("paymentwebsite").value = personDetails[6];
	document.getElementById("paymentemail").value = personDetails[7];
}
function confirmCheck()
{
	var response;
	response = confirm("Are you sure you want to select this supplier?");
	
	if(response)
	{
		document.getElementById("paymentid").disabled = false;
		document.getElementById("paymentname").disabled = false;
		document.getElementById("paymentstreet").disabled = false;
		document.getElementById("paymenttown").disabled = false;
		document.getElementById("paymentcounty").disabled = false;
		document.getElementById("paymenttelephone").disabled = false;
		document.getElementById("paymentwebsite").disabled = false;
		document.getElementById("paymentemail").disabled = false;
		return true;
	}
	else
	{
		populate();
		return false;
	}
}
function help()
{
	
	alert
	(
		"This page lets you select a supplier and it displays the details of the supplier \n"
	+	"You can go back a page with the Back button \n"
	+	"The Cancel button will clear the form"
	+	"The Invoice button will form the invoice for you"
	);
}
function print()
{
	// Was going to add functionality but since the project does not require it I decided nto to
	alert("This function is not required and thus not added");
}