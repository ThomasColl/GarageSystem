//Name: Thomas Coll
//Student Number: C00204384


//use the code learned in class
function populate()
{
	//Split the document and assign the relevant details to the relvant input boxes
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("amendid").value = personDetails[0];
	document.getElementById("amendname").value = personDetails[1];
	document.getElementById("amendaddressStreet").value = personDetails[2];
	document.getElementById("amendaddressTown").value = personDetails[3];
	document.getElementById("amendaddressCounty").value = personDetails[4];
	document.getElementById("amendtelephone").value = personDetails[5];
	document.getElementById("amendwebsite").value = personDetails[6];
	document.getElementById("amendemail").value = personDetails[7];
}
function toggleLock()
{
	if(document.getElementById("amendViewbutton").value == "Amend Details")
	{
		document.getElementById("amendname").disabled = false;
		document.getElementById("amendaddressStreet").disabled = false;
		document.getElementById("amendaddressTown").disabled = false;
		document.getElementById("amendaddressCounty").disabled = false;
		document.getElementById("amendtelephone").disabled = false;
		document.getElementById("amendwebsite").disabled = false;
		document.getElementById("amendemail").disabled = false;
		document.getElementById("amendViewbutton").value = "View Details";
	}
	else
	{
		document.getElementById("amendname").disabled = true;
		document.getElementById("amendaddressStreet").disabled = true;
		document.getElementById("amendaddressTown").disabled = true;
		document.getElementById("amendaddressCounty").disabled = true;
		document.getElementById("amendtelephone").disabled = true;
		document.getElementById("amendwebsite").disabled = true;
		document.getElementById("amendemail").disabled = true;
		document.getElementById("amendViewbutton").value = "Amend Details";
	}
}
function confirmCheck()
{
	//only allow the confirmation when in Amend mode
	if(document.getElementById("amendViewbutton").value == "Amend Details")
	{
		alert("The database can only update while the system is in amend mode");
		return false;
	}
	else
	{
		var response;
		response = confirm("Are you sure you want to save these changes?");
		
		if(response)
		{
			document.getElementById("amendid").disabled = false;
			document.getElementById("amendname").disabled = false;
			document.getElementById("amendaddressStreet").disabled = false;
			document.getElementById("amendaddressTown").disabled = false;
			document.getElementById("amendaddressCounty").disabled = false;
			document.getElementById("amendtelephone").disabled = false;
			document.getElementById("amendwebsite").disabled = false;
			document.getElementById("amendemail").disabled = false;
			return true;
		}
		else
		{
			//reset it to view amend mode if failed
			populate();
			document.getElementById("amendname").disabled = true;
			document.getElementById("amendaddressStreet").disabled = true;
			document.getElementById("amendaddressTown").disabled = true;
			document.getElementById("amendaddressCounty").disabled = true;
			document.getElementById("amendtelephone").disabled = true;
			document.getElementById("amendwebsite").disabled = true;
			document.getElementById("amendemail").disabled = true;
			document.getElementById("amendViewbutton").value = "Amend Details";
			return false;
		}
	}
}
function help()
{
	//give as much useful details as possible
	alert
		(		
				"This page allows you to amend or view the details of suppliers \n"
			+	"To get the page working click on the supplier option \n"
			+	"Amend Details will allow you to edit details \n"
			+	"It will change to View Details after being pressed \n"
			+	"Save changes will save the new details \n"
			+	"The clear button will reset the form to its previous details \n "
			+	"The back button takes you to the previous page \n"
		);
}
function back()
{
	//for back button
	window.history.back();
}
function forceSubmit()
{
	//used to make the php section look seemless
	document.getElementById("pageform").submit();
}
