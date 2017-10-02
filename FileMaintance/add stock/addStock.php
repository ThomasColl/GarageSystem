<?php
/*
	Name: Cathal Brady
	Student Number: C00202493   */

	session_start();// starts the session
	include '../../Resources/PHP/db.inc.php'; 

	// sql statment to say the we are taking the max stock id from the stock table 
	$sql = "SELECT MAX(StockID) AS High FROM Stock";

	if (!$result = mysqli_query($con,$sql))// if the query has a problem will output the code below
		{	
			die ("An error in the SQL Query:" .mysqli_query($con));
		}
	else
		{
			if (mysqli_affected_rows($con)!=0)
			{
				$row = mysqli_fetch_array($result);
			}
		}
		
	$High = $row['High']+1;
	$sql = "Insert into Stock(StockID,SupplierID,Description,ReorderLevel,ReorderQuantity,CostPrice,RetailPrice,QuantityInStock,DeleteFlag)
	values($High,'$_POST[SupplierList]','$_POST[Description]','$_POST[ReorderLevel]','$_POST[ReorderQuantity]','$_POST[CostPrice]','$_POST[RetailPrice]',0,0)";// sets the highest id and then must be added on eg max +1
	if (!mysqli_query($con,$sql))// if the query has a problem will output the code below
		{
			die ("An error in the SQL Query:" .mysqli_query($con));
		}
	//else will say that the record has been added to stock
	mysqli_close($con);
	?>
	<form id="submit" action="addStockItem.html.php" >
	 <script>
	alert("Item sucessfully Added")
	 document.getElementById("submit").submit();
	</script>
	</form>
