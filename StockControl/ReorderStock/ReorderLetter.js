/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           ReorderLetter.js
*/

//Show the help prompt
function showHelpPrompt() {
	alert("Click the print job card button to print the shown job card.");
}

//Goes back a page
function goBack() {
    window.history.back();
}

//Print the letter using this method
function printDiv(divName) {
	
     var printContents = document.getElementById(divName).innerHTML; //Div to print
     var originalContents = document.body.innerHTML;				 //Save original contents of page to be restored after printing
     document.body.innerHTML = printContents;						 //Make the body consist of only the div
     window.print();												 //Call the browsers print function
     document.body.innerHTML = originalContents;					 //Restore page back to what it was before printing
	 
}

//Source of printDiv: http://stackoverflow.com/questions/468881/print-div-id-printarea-div-only