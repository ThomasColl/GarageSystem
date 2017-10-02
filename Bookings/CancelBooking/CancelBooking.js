//Name: Thomas Coll
//Student Number: C00204384

function confirmCheck(formName)
{
	//Check which form is being checked and prompt as necessary
	var response;
	if(formName == document.getElementById("myFormDate"))
	{
		response = confirm("Are you sure you want to use this date?");
	}
	else if(formName == document.getElementById("myFormName"))
	{
		response = confirm("Are you sure you want cancel this booking?");
	}
	else
	{
		response = true;
	}
	
	//take the response and either submit or not
	if(response)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function checkDate()
{
	//define the date var
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;  //January is defined as 0
	var yyyy = today.getFullYear();
	//if any of the dates are from Jan - Sept add a 0 to balance it 
	if(dd < 10)
	{
		dd = '0' + dd
	} 
	if(mm < 10)
	{
		mm = '0' + mm
	} 
	today = yyyy+'-'+mm+'-'+dd;
	//define the date min as today so there cannot be any befoe today
	document.getElementById("adddategot").setAttribute("min", today);
	/* Ref : https://jsfiddle.net/dae4y126/ */
}
function forceSubmit()
{
	//used to submit the first form back quickly so it gives the illusion of seemless transition
	document.getElementById("pageform").submit();
}
function back(id)
{
	//resets the form as to minimise any chances of a form resubmission error 
	document.getElementById("myFormName").reset(); 
	window.history.back();
}
function help(formName)
{
	//depending on the form (denoted by the button pressed) it will display the relevant message
	if(formName == document.getElementById("num1"))
	{
		alert
		(
				"This page allows you to select the day where the booking you're looking for \n"
			+	"The page wouldn't allow you to select a date from the past as a booking cannot be cancelled after the fact"
		);
	}
	else
	{
		alert
		(		
				"This displays the Time its saved as, the Customer's name, the Booking is and a radio 'Selected' button \n"
			+	"This button allows only one option at a time and use the 'Remove' button \n"
			+	"Back brings you back to the date picker \n"
			+	"The Cancel button deselects the radio button"
		);
	}
}
function displayAddress()
{
	//used to display the address in the Text Area 
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	var output = personDetails[2] + ", \n" + personDetails[3] + ", \n" + personDetails[4];
	document.getElementById("address").innerHTML = output;
}