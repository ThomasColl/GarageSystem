<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           ReorderStock.php
*/
	//session_start();
	include '../../Resources/PHP/db.inc.php';
		
	$supplier = "";
	if (ISSET($_POST['selectedItemSupplier'])) {
		//If supplier is set then an order has been initiated
		$supplier = $_POST['selectedItemSupplier']; 
	}
		
	//Before any item is added to the order the $supplier variable is empty - it is set once the first item is added to the order
	if ($supplier == "") {
		//Creates the associative array that stores each item on the order and the quantity of the item on the order
		$_SESSION['orderItems'] = array();
		$sql = "SELECT Stock.StockID, Stock.Description, Stock.QuantityInStock, Stock.ReorderLevel, Stock.ReorderQuantity, Stock.DeleteFlag,
		Suppliers.SupplierName, Suppliers.DeleteFlag FROM Stock INNER JOIN Suppliers ON Suppliers.SupplierID = Stock.SupplierID WHERE Stock.DeleteFlag = 0 AND Suppliers.DeleteFlag = 0";
		produceStockTable($con, $sql);
	} else {
		$_SESSION['orderItems'][$_POST['selectedItem']] = $_POST['selectedItem'] . "/" . $_POST['quantity']; //Stores each stock item id and the quantity on the current order for use with job card
		$arr = $_SESSION['orderItems'];					//Assign the order items array into a variable
		$idsOnOrder = array();							//Array to store each stock id on the order
		$idString;
			
		foreach ($arr as $key) { 						//loops through orderItems
			$split = explode('/', $key);				//Splits the stock id and the quantity of that id on the order
			array_push($idsOnOrder, $split[0]);			//Push each stock id in the order into the array
		}
		$idString = "(" . join(",",$idsOnOrder) . ")"; 	//Builds the string containing the id's on the order for the NOT IN clause
		
		//****The NOT IN clause ensures the same item cannot be on an order more than once****//
		$sql = "SELECT Stock.StockID, Stock.Description, Stock.QuantityInStock, Stock.ReorderLevel, Stock.ReorderQuantity, 
		Suppliers.SupplierName, Suppliers.DeleteFlag FROM Stock INNER JOIN Suppliers ON Suppliers.SupplierID = Stock.SupplierID WHERE Stock.DeleteFlag = 0 
		AND Suppliers.DeleteFlag = 0 AND Suppliers.SupplierName = \"$supplier\" AND Stock.StockID NOT IN $idString";
		produceStockTable($con, $sql);
		}
	
	//This function produces a table which contains items of stock available to order
	function produceStockTable($con, $sql) {
			
		if (!$result = mysqli_query($con, $sql)) {
			die ("An error in the sql query" . mysqli_error($con));
		}
		$item = 0;	//Gives an id number to each row - this is used to select a row with javascript
			
		//Echo the table headings
		echo "<div id = \"stockTable\" style = \"height: 200px; overflow-y: scroll; border: 1px #aaa solid;\">
			  <table id = \"reorderStockTable\"><tr onclick = \"selectRow(this)\" id = \"$item\">
			  <th class = \"short\">Stock Number</th><th class = \"long\">Stock Description</th>
			  <th class = \"short\">Quantity in Stock</th>
			  <th class = \"short\">Reorder Level</th><th class = \"short\">Reorder Qty</th>
			  <th class = \"long\">Supplier's Name</th></tr>";
			
			
		//Echo each item on the order so the user can keep track of the items on the order
		while ($row = mysqli_fetch_array($result)) {
			$item++;
			echo "<tr onclick = \"selectRow(this)\" id = \"$item\"><td>" . $row['StockID'] . "</td>
				 <td class = \"long\">" . $row['Description'] . "</td>
				 <td class = \"short\">" . $row['QuantityInStock'] . "</td>
				 <td class = \"short\">" . $row['ReorderLevel'] . "</td>
				 <td class = \"short\">" . $row['ReorderQuantity'] . "</td>
				 <td class = \"long\">" . $row['SupplierName'] . "</td>
				 </tr>";
		}
		echo "</table></div><br>";
	}
		
	//This function produces a table which contains the items on the current order. The function is called after an item is added to the order.
	function produceOrderTable($con) {
			
		$arr = $_SESSION['orderItems'];
		$idsOnOrder = array();
		$quantitysOnOrder = array();
		$idString; //Stores the string for the IN clause of the sql statement
			
		foreach ($arr as $key) { 						//loops through orderItems
			$split = explode('/', $key);				//Splits the stock id and the quantity of that id on the order
			array_push($idsOnOrder, $split[0]);			//Push each stock id in the order into the array
			array_push($quantitysOnOrder, $split[1]);	//Push the quantity of each item into the other array
		}
		$idString = "(" . join(",",$idsOnOrder) . ")"; 	//Builds the string containing the id's on the order for the IN clause	

		$sql = "SELECT * FROM Stock WHERE Stock.StockID IN $idString";	
		if (!$result = mysqli_query($con, $sql)) {
			die ("An error in the sql query" . mysqli_error($con));
		}
			
		$index = 0;	//Index to keep track of the 'idsOnOrder' array and the 'quantitysOnOrder' array
			
		//Echo the table headings
		echo "<div id = \"orderDiv\" style = \"height: 200px; overflow-y: scroll; border: 1px #aaa solid;\">
			  <table id = \"orderTable\"><tr><th class = \"short\">Stock Number</th><th class = \"long\">Stock Description</th>
			  <th class = \"short\">Quantity on Order</th></tr>";
		
		//Echo the table rows containing each item on the order
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr><td>" . $idsOnOrder[$index] . "</td>
				 <td class = \"long\">" . $row['Description'] . "</td>
				 <td class = \"short\">" . $quantitysOnOrder[$index] . "</td>
				 </tr>";
			$index += 1;
		}
		echo "</table>
			  </div>";
			
		echo "<script>alert('Item added to order');
			  document.getElementById('orderTable').scrollIntoView();</script>";
			  //scrollIntoView scrolls the page down after an item is added to an order so the user doesnt have to scroll as much
	}
		
?>