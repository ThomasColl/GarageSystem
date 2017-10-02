/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           AddCustomer.js
*/
function goBack() {
	//Goes to the previous page
    window.history.back();
}

function showHelpPrompt() {
	alert("To add a new customer, enter all of the required information and click the add customer button.");
}

function confirmCheck() {
	//Ask user are they sure they want to add a new customer
	var response = confirm('Are you sure you want to make a new customer account with the provided details ?');
	if (response) {
		return true;
	} else {
		return false;
	}
}


