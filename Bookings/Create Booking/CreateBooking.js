//Name: Cathal Brady
//Student Number: C00202493

function populate(tr) // populates the table rows using this */
{
		var TimeVal = document.getElementById("time").value; // gets the value in time hidden input  */
		var CustIdVal = document.getElementById("custId").value; // gets the value in custId hidden input   */
	
	if (tr.childNodes[2].innerHTML == "" && TimeVal == "" && CustIdVal  == "")  // if name row is empty and the value is empty of both the CustomerId and timeVal  */
	{
		var val = document.getElementById("listbox").value; // pulls the listbox value   */
		var details = val.split(','); // split val  */
		var name = details[0] + " " + details[1]; //takes name in details[0] and [1] then places the name in the variable name  */
		tr.childNodes[2].innerHTML = name;// takes the name and puts it in the name part of the table row
		
		document.getElementById("custId").value = details[2];	// set the id to be posted for making the booking */
		document.getElementById("time").value = tr.childNodes[1].innerHTML;	// set the time to be posted for making the booking */
	}
}
function Reset()// reloads the page
{
    location.reload();
}
function help()// sets the help for the button
{
	alert
		(			
			
			+	"Create a booking\n"
			+	"For the screen you will need to choose a booking date if\n"
			+	"the date chosen is not today so you will just need to click on the date picker \n"
			+	"chose the date then hit the submit button beside it the system will the pull the curent bookings from the database \n"
			+	"The user will then just have to click on the timeslot they wish for that day  \n "
			+	"then click on make a booking and the database will be updated\n"
		);
}
