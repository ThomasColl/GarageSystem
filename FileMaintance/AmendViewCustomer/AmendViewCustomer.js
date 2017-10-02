/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           AmendViewCustomer.js
*/
function populate(alltext) {
	//Split details stored within the selected row
    var customerDetails = alltext.split('*'); 
	
	//Populate the inputs witht the information
    document.getElementById("amendid").value = customerDetails[0];
    document.getElementById("amendfirstname").value = customerDetails[1];
    document.getElementById("amendsurname").value = customerDetails[2];
    document.getElementById("amendstreet").value = customerDetails[3];
    document.getElementById("amendtown").value = customerDetails[4];
    document.getElementById("countySelect").value = customerDetails[5];
    document.getElementById("amendtelephone").value = customerDetails[6];
    document.getElementById("amendemail").value = customerDetails[7];
}

function toggleLock() {
	//Only allow the user to toggle the lock when a customer is chosen
	//If the input box which holds the ID is not empty then a customer is chosen
    if (document.getElementById("amendid").value != "") {
        if (document.getElementById("amendViewButton").value == "Amend Details") {
            document.getElementById("amendfirstname").disabled = false;
            document.getElementById("amendsurname").disabled = false;
            document.getElementById("amendstreet").disabled = false;
            document.getElementById("amendtown").disabled = false;
            document.getElementById("countySelect").disabled = false;
            document.getElementById("amendtelephone").disabled = false;
            document.getElementById("amendemail").disabled = false;
            document.getElementById("amendViewButton").value = "View Details";
        } else {
            document.getElementById("amendfirstname").disabled = true;
            document.getElementById("amendsurname").disabled = true;
            document.getElementById("amendstreet").disabled = true;
            document.getElementById("amendtown").disabled = true;
            document.getElementById("countySelect").disabled = true;
            document.getElementById("amendtelephone").disabled = true;
            document.getElementById("amendemail").disabled = true;
            document.getElementById("amendViewButton").value = "Amend Details";
        }
    } else {
		//Alert the user if they try to amend details while no customer is selected
        alert("Error! Please select a customer.");
    }

}

//Unselects the chosen customer 
function unselect() {
	var table = document.getElementById("customerTable");
	var tr = table.getElementsByTagName("tr");
    // Loop through all rows and remove the colour
    for (var i = 0; i < tr.length; i++) {
		//Grab the name section of the row
        td = tr[i].getElementsByTagName("td")[1];
		//Remove colour from row
        tr[i].style.backgroundColor = "transparent"; 
    }
}

function confirmCheck() {
	//Only allow the user to submit the form when a customer is chosen
    if (document.getElementById("amendid").value != "") {
		//Only allow the user to submit the form when in amend mode
        if (document.getElementById("amendViewButton").value == "Amend Details") {
            alert("You must be in amend mode to submit. To enter amend mode click the 'amend details' button.");
            return false;
        } else {
            var response = confirm('Are you sure you want to make these changes?');
            if (response) {
				//Disable the id input before submitting
                document.getElementById("amendid").disabled = false;
                return true;
            } else {
                return false;
            }
        }
    } else {
        alert("Error! Please select a customer!");
        return false;
    }

}

function showHelpPrompt() {
    alert("To amend customer, choose the customer you want to amend and press the amend details button. When you have made the desired changes press the amend customer button.");
}

function goBack() {
    window.history.back();
}

function selectRow(tr) {
	
	//Get the id of the row that was clicked
    var currentRow = tr.id; 
	
    //If the row that was clicked was not the first which contains the column names
    if (currentRow != 0) { 

        //Change the colour to pale green
        tr.style.backgroundColor = "#abbaab";
        //Use jquery selector to get the value ($alltext) from the tr and pass it into populate in order to populate each input box
        populate($("#" + currentRow).data('value'));

    } else { 
        //If the row that was clicked was the first which contains the column names unpopulate and disable the input boxes
        disableInputs();
    }
	
	//Loop counter
    var i = 0;
    //Select the first row in the table
    var row = document.getElementById(i.toString()); 

    //Removes background colour of the other rows when one is clicked
    while (row != null) { //Loop through the rows
	    //If row does not equal the clicked row
        if (row.id != currentRow) { 
		    //Remove the colour
            row.style.backgroundColor = "transparent"; 
        }
		//Increment counter
        i += 1;
		//Select next row
        row = document.getElementById(i.toString()); 
    }

}

function searchFunction() {
	//Grab the search box
    var input = document.getElementById("search");
	
	//Take the text in the search box and change it to uppercase for easy comparison
    var filter = input.value.toUpperCase();
	
	//Grab the customer table
    var table = document.getElementById("customerTable");
	
	//Create an array of every row in the table
    var tr = table.getElementsByTagName("tr");

    // Loop through all rows and hide the ones that don't match the search query
    for (var i = 0; i < tr.length; i++) {
		//Grab the name section of the row
        td = tr[i].getElementsByTagName("td")[1];
		//If it exists
        if (td) {
			//Try find the index of whats in the search box within the customer name
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				//If it exists dont change the display
                tr[i].style.display = "";
            } else {
				//If it doesn't exist make the row invisible
                tr[i].style.display = "none";
            }
        }
		//Remove colour from selected row if search function is used while a row is selected
        tr[i].style.backgroundColor = "transparent"; 
    }
	//And disable and clear the inputs
    disableInputs();

}

function disableInputs() {
    //Unpopulate all inputs
    document.getElementById("amendid").value = "";
    document.getElementById("amendfirstname").value = "";
    document.getElementById("amendsurname").value = "";
    document.getElementById("amendstreet").value = "";
    document.getElementById("amendtown").value = "";
    document.getElementById("countySelect").value = "";
    document.getElementById("amendtelephone").value = "";
    document.getElementById("amendemail").value = "";

    //Disable all inputs
    document.getElementById("amendfirstname").disabled = true;
    document.getElementById("amendsurname").disabled = true;
    document.getElementById("amendstreet").disabled = true;
    document.getElementById("amendtown").disabled = true;
    document.getElementById("countySelect").disabled = true;
    document.getElementById("amendtelephone").disabled = true;
    document.getElementById("amendemail").disabled = true;
    document.getElementById("amendViewButton").value = "Amend Details";
}