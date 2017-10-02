/*
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		2nd Year Project
File:			DeleteCustomer.js
*/

function populate(alltext) {

	var customerDetails = alltext.split('*'); //Split details
	
	//Populate the inputs
	document.getElementById("delid").value = customerDetails[0];
	document.getElementById("delfirstname").value = customerDetails[1];
	document.getElementById("dellastname").value = customerDetails[2];
	document.getElementById("delstreet").value = customerDetails[3];
	document.getElementById("deltown").value = customerDetails[4];
	document.getElementById("delcounty").value = customerDetails[5];
	document.getElementById("delphone").value = customerDetails[6];
	document.getElementById("delemail").value = customerDetails[7];
}

function confirmCheck() {
	if (document.getElementById("delid").value != "") {	//If a customer is selected
		
		var response = confirm('Are you sure you want to delete this customer?');	//Confirm they want to delete
		if (response) {
			//Undisable all of the inputs so they canbe posted
			document.getElementById("delid").disabled = false;			
			document.getElementById("delfirstname").disabled = false;
			document.getElementById("dellastname").disabled = false;
			document.getElementById("delstreet").disabled = false;
			document.getElementById("deltown").disabled = false;
			document.getElementById("delcounty").disabled = false;
			document.getElementById("delphone").disabled = false;
			document.getElementById("delemail").disabled = false;	
			return true;
		} else {
			return false;
		}
	} else {	//Delete button was clicked when no customer was selected
		alert("Error, no customer chosen!")
		return false;
	}

}

//Shows the help prompt
function showHelpPrompt() {
	alert("To delete customer, choose or search for the customer you wish to delete and click the delete customer button.");
}

//Goes back a page
function goBack() {
    window.history.back();
}


function selectRow(tr) {
	
	var currentRow = tr.id;		//Get the id of the row that was clicked
	var i = 0;
	if (currentRow != 0) {		//If the row that was clicked was not the first which contains the column names
	
		//Change the colour to pale green
		tr.style.backgroundColor = "#abbaab";			
		//Use jquery selector to get the value ($alltext) from the tr and pass it into populate in order to populate each input box
		populate($("#" + currentRow).data('value'));	
		
	} else {	//If the row that was clicked was the first which contains the column names unpopulate the input boxes
		
		document.getElementById("delid").value = "";
		document.getElementById("delfirstname").value = "";
		document.getElementById("dellastname").value = "";
		document.getElementById("delstreet").value = "";
		document.getElementById("deltown").value = "";
		document.getElementById("delcounty").value = "";
		document.getElementById("delphone").value = "";
		document.getElementById("delemail").value = "";	
	}
	
	var row = document.getElementById(i.toString());	//Select the first row in the table
	
	//Removes background colour of the other rows when one is clicked
	while (row != null) {	//Loop through the rows
		if (row.id != currentRow) {	//If row does not equal the clicked row
			row.style.backgroundColor = "transparent";	//Remove the colour
		}
		i += 1;
		row = document.getElementById(i.toString());	//Select next row
	}

}

//For search the table
function searchFunction() {

  var input, filter, table, tr, td;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("customerTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide the ones that don't match the search query
  for (var i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
	tr[i].style.backgroundColor = "transparent";	//Remove colour from selected row if search function is used while a row is selected
  }
  //Reset values of all inputs
  document.getElementById("delid").value = "";
  document.getElementById("delfirstname").value = "";
  document.getElementById("dellastname").value = "";
  document.getElementById("delstreet").value = "";
  document.getElementById("deltown").value = "";
  document.getElementById("delcounty").value = "";
  document.getElementById("delphone").value = "";
  document.getElementById("delemail").value = "";	
	
}