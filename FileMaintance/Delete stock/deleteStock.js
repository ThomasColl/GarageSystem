 /* 
	//Name: Cathal Brady
	//Student Number: C00202493
 */
function populate()// sets the function called populate
{
	var sel = document.getElementById("listbox");// sets the varaible called listbox 
	var result;// sets the varaible result
	result = sel.options[sel.selectedIndex].value;//sets thwe result as the selected option in the selected Index position 
	var personDetails = result.split(',');// takes the persons details and splits it with the ,
	
	document.getElementById("StockID").value = personDetails[0];// sets the vaiables to be called
	document.getElementById("SupplierName").value = personDetails[1];
	document.getElementById("SupplierID").value = personDetails[2];
	
	
	
}
/*
function toggleLock()// function for the enabling of editing of the stock list.
{
	if(document.getElementById("Description").value == "Description")
	{
		document.getElementById("StockID").disabled = false;
		document.getElementById("SupplierName").disabled = false;
		document.getElementById("SupplierID").disabled = false;
		document.getElementById("description").value = "Change Stock";
	}
	else
	{
		document.getElementById("StockID").disabled = true;
		document.getElementById("SupplierName").disabled = true;
		document.getElementById("SupplierID").disabled = true;
		document.getElementById("RemoveStock").value = "RemoveStock";
	}
}*/
function confirmCheck()
{
		var response;
		response = confirm("Are you sure you want to Delete this unit of stock from the stock List?");
		
		if(response)
		{
		document.getElementById("StockID").disabled = false;
		document.getElementById("SupplierName").disabled = false;
		document.getElementById("SupplierID").disabled = false;
		document.getElementById("description").value = "Delete Stock";
			return true;
		}
		else
		{
			populate();
		document.getElementById("StockID").disabled = true;
		document.getElementById("SupplierName").disabled = true;
		document.getElementById("SupplierID").disabled = true;
		document.getElementById("RemoveStock").value = "RemoveStock";
			return false;
		}
}
function help()// this will say what going to be  done to the screen for this will give the user a general help
{
	alert
		(		
				" \n"
			+	"\n"
			+	"Delete stock will allow you to remove an item from stock. \n"
			+	"the sql will choose from the database the stock that follows the correct conditions \n"
			+	"The delete stock button will send theauthorisation to remove it from the active stock and will set the delete flag to 1 \n"
			+	"The clear button will reset the form to its previous details \n "
			+	"The back button takes you to the previous page \n"
		);
}
function back()// sends the page back one step through history
{
	window.history.back();
}
function checkValid(input)// checks if the page is valid 
{
	var item = input.value;
	if(item)
	{
		input.setCustomValidity("");
	}
	else
	{
		input.setCustomValidity("There must be something inputted to this");
	}
}
function Reset()// reloads the page
{
    location.reload();
}
