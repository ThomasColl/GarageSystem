<?php
include '../../Resources/PHP/db.inc.php';// includes the database 

$sql = "SELECT Stock.Description,Stock.StockID,Stock.ReorderLevel,Stock.ReorderQuantity,Suppliers.SupplierName,Stock.CostPrice,Stock.RetailPrice,Stock.SupplierID FROM Stock INNER JOIN Suppliers ON Stock.SupplierId = Suppliers.SupplierID WHERE Stock.DeleteFlag = 0";
// this sql statement pulls the vairous stock names from the datebase for the values to be amended later in the JavaScript , this statement has an inner join (which means to connect two sectionsof the datebase) the inner join is linked with the supplier id and will only pull data for amending with stock that is not flagged for deletion
if(!$result=mysqli_query($con,$sql))
	{
		die('Error in querying the database'.mysqli_error($con));//if statement the result is not = to the query on the connection to the database and the sql state it will say that there is an error .
	}
echo "<select name='listbox' id='listbox' onclick='populate()'>";// this will echo the listbox and bring up all the fields that have been selected to be called in the listbox.

while($row=mysqli_fetch_array($result))// while loop is ran while the if is this will take the values that are in the database and fill them into rows and insert them into the from in the order below.
	{
		$StockID=$row['StockID'];// pulls the StockID and assigns it to the row 0
		$Description=$row['Description'];// pulls the Description and assigns it to the row 1
		$ReorderLevel=$row['ReorderLevel'];// pulls the ReorderLevel and assigns it to the row 2
		$ReorderQuantity=$row['ReorderQuantity'];// pulls the ReorderQuantity and assigns it to the row 3
		$SupplierName=$row['SupplierName'];// pulls the SupplierName and assigns it to the row 4
		$CostPrice=$row['CostPrice'];// pulls the CostPrice and assigns it to the row 5
		$RetailPrice=$row['RetailPrice'];// pulls the RetailPrice and assigns it to the row 6
		
		$SupplierID=$row['SupplierID'];
		
		$allText="$StockID,$SupplierID,$ReorderLevel,$ReorderQuantity,$CostPrice,$RetailPrice,$SupplierName";// sets the values that are to be called in the vairable created called all text 
		echo "<option value = '$allText'> $Description</option>";// sets the values of all text to be called  using the description fucntion if you click on description it will call the the variable all text and use tht to populate the list.
	/**/
}
	echo "</select>";
	mysqli_close($con);// closes the sql and ends the connection
	?>