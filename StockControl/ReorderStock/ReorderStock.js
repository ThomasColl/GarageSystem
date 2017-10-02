/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           ReorderStock.js
*/

//Goes back a page
function goBack() {
    window.history.back();
}

//Shows help prompt
function showHelpPrompt() {
	alert("In order to add an item to the order select an item, input the quantity and click the add to order button. Once you have added all of the items you want on the order then click the make order button");
}

function selectRow(tr) {
	
	var currentRowID = tr.id;
	var row;
	var selectedItem;
	if (currentRowID != 0) {
		
		//Highlights the selected row with a light green
		tr.style.backgroundColor = "#abbaab";
		
		//Gets supplier name of currently selected stock item
		var supplier = tr.childNodes[10].innerHTML;
		
		//Sets it as the value of 2 hidden inputs, this keeps track of which supplier the order is coming from
		document.getElementById("selectedItemSupplier").value = supplier;	
		document.getElementById("selectedItemSupplier1").value = supplier;
		
		//Enable the quantity input
		document.getElementById("quantity").disabled = false;
		
		//Gets the id of the selected item
		selectedItem = tr.childNodes[0].innerHTML;
		
		//Assign the value of a hidden input to the selected item id
		document.getElementById("selectedItem").value = selectedItem;
	} else {
		document.getElementById("quantity").disabled = true;
	}
	
	var i = 0;
	//Grab the first row
	var row = document.getElementById(i.toString());
	//Loop through the rows
	while (row != null) {
		//if the id of the current row is not the same as the row variable then remove the colour - This prevents multiple rows being selected
		if (row.id != currentRowID) {
			row.style.backgroundColor = "transparent";
		}
		i += 1;
		//Select next row
		row = document.getElementById(i.toString());
	}

}

//Adds an item to the order
function addItemToOrder() {
	selectedItemValue = document.getElementById("selectedItem").value;	//Gets the value of the hidden input
	//If the input is not empty and the quantity input box is not disabled it means an item is selected and its ok to add to the order
	if (selectedItemValue != "" && document.getElementById("quantity").disabled == false) {
		var response = confirm('Are you sure you want to add the selected item to your current order?');
		if (response) {
			
			return true;
		} else {
			return false;
		}
	} else {
		alert("Make sure you select an item and enter the quantity of the item you want to order!");
		return false;
	}

}

//Resets the current order
function resetCurrentOrder() {
	var response = confirm('Are you sure you want to reset your current order?');
	if (response) {
		document.getElementById("selectedItemSupplier").value = "";
		document.getElementById("selectedItemSupplier1").value = "";
		document.getElementById("reorderStockForm").submit();
	}
}

function confirmCheck() {
	//Checks if an order is in progress - orderDiv only exists after the first item is added to the order
	if (document.getElementById("orderDiv") != null) {
		var response = confirm('Are you sure you want to place the order?');
		if (response) {
			return true;
		} else {
			return false;
		}
		
	} else {
		alert("Make sure you add at least one item before trying to place the order");
		return false;
	}

}


function searchFunction() {

  var input, filter, table, tr, td;
  input = document.getElementById("search");			//Get whats in the search box
  filter = input.value.toUpperCase();					//Change it to uppercase
  table = document.getElementById("reorderStockTable");	//grab the table
  tr = table.getElementsByTagName("tr");				//Create array of tr's

  // Loop through all table rows, and hide the ones that don't match the search query
  for (var i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];	//Grab second td in the tr
    if (td) {									//if it exists
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {	//get the index of what was typed into the search box and check if it exists, greater than -1 means it exists
        tr[i].style.display = "";								//If it exists dont change the display
      } else {
        tr[i].style.display = "none";							//If it doesnt exist change display to none to make it invisible
      }
    }
	tr[i].style.backgroundColor = "transparent";				//Change background colour of the rows

  }
  
  //**Unselect any selected items when the user searches**//
  document.getElementById("quantity").disabled = true;
  document.getElementById("selectedItem").value = 0;
	
}

//Filter search source: https://www.w3schools.com/howto/howto_js_filter_table.asp
