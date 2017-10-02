<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        Prints the order letter and adds records to the database
File:           ReorderLetter.php
*/
	session_start();
	include '../../Resources/PHP/db.inc.php';
	
	//Put the session variable which holds the items on the order into the variable $arr
	$arr = $_SESSION['orderItems'];
	
	//Create array for storing ids of stock items on the order
	$idsOnOrder = array();
	
	//Create array for storing the quantity of each item on the array
	$quantitysOnOrder = array();
	
	//Stores the string for the IN clause of the sql statement
	$idString; 
	
	foreach ($arr as $key) { 						//loops through orderItems
		$split = explode('/', $key);				//Splits the stock id and the quantity of that id on the order
		array_push($idsOnOrder, $split[0]);			//Push each stock id in the order into the array
		array_push($quantitysOnOrder, $split[1]);	//Push the quantity of each item into the other array
	}
	$idString = "(" . join(",",$idsOnOrder) . ")"; 	//Builds the string for the IN clause
	
	////////////Gets order ID for this order//////////////
	$sql = "SELECT MAX(OrderID) AS MaxID From Orders";
	if (!$result = mysqli_query($con, $sql)) {
		die ("An error in the sql query" . mysqli_error($con));
	}
	$row = mysqli_fetch_array($result);
	$maxID;
	if (is_null($row['MaxID'])) { //If there are no orders in the database the id will be 1
		$maxID = 1;
	} else {
		$maxID = $row['MaxID'] + 1;
	}
	/////////////////////////////////////////////////////
	
	date_default_timezone_set("UTC");
	$date = date('Y/m/d');
	
	//Select information about the supplier we are ordering from and about each stock item
	$sql = "SELECT * FROM Suppliers INNER JOIN Stock ON Stock.SupplierID = Suppliers.SupplierID WHERE Stock.StockID IN $idString";	
	
	//Perform the sql
	if (!$result = mysqli_query($con, $sql)) {
		die ("An error in the sql query" . mysqli_error($con));
	}
	$row = mysqli_fetch_array($result);
	$supplierID = $row['SupplierID'];
		
	//Echo the speedshop address
	echo "<div id = \"reorderLetterDiv\">
		 <p id = \"ourAddress\">Speed Shop Garage<br>
		 Carlow Business Park<br>
		 Co. Carlow<br>
		 $date</p><br><br><br><br>";
	
	//Echo the supplier address
	echo "<p id = \"supplierAddress\">" . $row['SupplierName'] ."<br>" .
		 $row['Street'] . "<br>" .
		 $row['Town'] . "<br>" .
		 $row['County'];
	
	//Echo the order number 
	echo "<p id = \"orderNum\">Order Number: #$maxID</p><br><br>
	Please supply the following stock items: <br><br>";
	
	//Echo the table containing each item on the order
	echo "<table>
		  <tr><th class = \"short\">Stock Id</th>
		  <th class = \"long\">Item Description</th>
		  <th class = \"short\">Quantity</th>
		  <th class = \"short\">Price Per Unit</th>
		  </tr>";
	//Loop counter for the quantitysOnOrder array
	$quantityIndex = 0; 
	echo "<tr>
		  <td class = \"short\">" . $row['StockID'] . "</td>
		  <td class = \"long\">" . $row['Description'] . "</td>
		  <td class = \"short\">" . $quantitysOnOrder[$quantityIndex] . "</td>
		  <td class = \"short\">" . $row['CostPrice'] . "</td>
		  </tr>";
	
	//Add the information to the table
	while ($row = mysqli_fetch_array($result)) {
	$quantityIndex += 1;
	echo "<tr>
		  <td class = \"short\">" . $row['StockID'] . "</td>
		  <td class = \"long\">" . $row['Description'] . "</td>
		  <td class = \"short\">" . $quantitysOnOrder[$quantityIndex]. "</td>
		  <td class = \"short\">" . $row['CostPrice'] . "</td>
		  </tr>";
			
	}
	echo "</table><br>";
	
	//Echo the sign off
	echo "<p id = \"foot\">Yours sincerely,<br>
		 Alex Matthews<br>
		 Stock Controller.<br></p>";
		 
	echo "</div><br>"; 
	
	//Add record to the orders table
	$sql = "INSERT INTO Orders VALUES ($maxID, $supplierID, '$date', 0)";
	if(!$result = mysqli_query($con, $sql)) {
		die ("An error in the sql query" . mysqli_error($con));
	} else {
		echo "<script>alert(\"Order placed sucessfully.\")</script>";
	}
	
	//Add records to the order items table
	for ($i = 0; $i < sizeof($idsOnOrder); $i++) {
		$sql = "INSERT INTO OrderItems VALUES ($idsOnOrder[$i], $maxID, $quantitysOnOrder[$i])";
		if (!$result = mysqli_query($con, $sql)) {
			die ("An error in the sql query" . mysqli_error($con));
		}
	}
	

?>