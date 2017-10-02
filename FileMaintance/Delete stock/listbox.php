<?php
//Name: Cathal Brady
//Student Number: C00202493

include '../../Resources/PHP/db.inc.php';/// includes the database


$sql = "SELECT Stock.StockID,Stock.SupplierID,Stock.Description,Suppliers.SupplierName FROM Stock INNER JOIN Suppliers ON Stock.SupplierId = Suppliers.SupplierID WHERE Stock.DeleteFlag =0
		 AND Stock.QuantityInStock <= 0
		 AND StockID NOT IN(SELECT DISTINCT OrderItems.StockID FROM `OrderItems` INNER JOIN Orders ON OrderItems.OrderID = Orders.OrderID WHERE Delivered = 0)";
// sql statement to required functions from stock table and then inner joins with the suppliers table using supplierId as the link , the requirement is that the delete flag 
//must be = 0 AND the  Stock tables QuantityInStock is less than 0r equal to zero AND that the StockID is not being selected from the OrderItems table with the a Distinct stockid (no duplicates) 
//then inner joins the orders table to check that none of them have been deliverd , if this condition is met then the deletion of the stock item may be continued.

//http://stackoverflow.com/questions/1406215/sql-select-where-not-in-subquery-returns-no-results   link for the reference on stack overflow 

if(!$result=mysqli_query($con,$sql))
	{
		die('Error in querying the database'.mysqli_error($con));// if there is a error in the query this will be echod out 
	}
echo "<select name='listbox' id='listbox' onclick='populate()'>";// will echo out the listbox

while($row=mysqli_fetch_array($result))// will fetch the reults of the following row 
	{
		$Description=$row['Description'];
		$StockID=$row['StockID'];
		$SupplierName=$row['SupplierName'];
		$SupplierID=$row['SupplierID'];
		
		$allText="$StockID,$SupplierName,$SupplierID";
		echo "<option value = '$allText'> $Description</option>";
	}
	echo "</select>";
	mysqli_close($con);// ends the connection
?>