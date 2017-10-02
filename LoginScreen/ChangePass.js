/* 
		//Name: Cathal Brady
		//Student Number: C00202493
 */
function populate()
{
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	
	document.getElementById("listbox").value = personDetails[0];
	document.getElementById("FirstName").value = personDetails[1];
	document.getElementById("LastName").value = personDetails[2];
	document.getElementById("Password").value = personDetails[3];

	
}

function confirmCheck()
{
	if(document.getElementById("Description").value == "Change Password")
	{
		alert("The database can only be updated when the appropriate user is logged in");
		return false;
	}
	else
	{
		var response;
		response = confirm("Are you sure you wish to change the login password?");
		
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
	//
	}
}

function help()// sets the help for the button
{
	alert
		(
		
			+	"This is the change password screen \n"
			+	"It will change the password for the user after login \n"
			+	"Save login will save the new details \n"
			+	"The back button takes you to the previous page \n"
		)
}
function back()
{
	window.history.back();
}

function refresh()// refreshes the window 
{
		document.getElementById("pageform").window.location.reload();
}