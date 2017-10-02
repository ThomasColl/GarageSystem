//Name: Thomas Coll
//Student Number: C00204384


//use the code learned in class
function confirmCheck()
{
	response = confirm("Are you sure you want to save these changes?");
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
	var mm = today.getMonth()+1; //January is defined as 0
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
	document.getElementById("adddategot").setAttribute("max", today);
	/* Ref : https://jsfiddle.net/dae4y126/ */
}
function forceSubmit()
{
	//Submits the form instantly
	document.getElementById("pageform").submit();
}
function back()
{
	window.history.back();
}
function help()
{
	//depending on the form (denoted by the button pressed) it will display the relevant message
	alert
		(		
				"This page allows you to enter the details of an invoice recieved by a supplier \n"
			+	"The reference number is the reference number of the invoicer \n"
			+	"The date of the invoice is the date the invoice was addressed to \n"
			+	"The amount is how many euros the company is billed for \n"
			+	"The button called Add Invoice will add a new record with the inputted data \n"
			+	"The button called Clear will empty any input you've made \n "
		);
}
function displayAddress()
{
	// forms the address via a listbox and creates an attractive layout for the data
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	var output = personDetails[2] + ", \n" + personDetails[3] + ", \nCo." + personDetails[4];
	document.getElementById("address").innerHTML = output;
}