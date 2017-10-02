<?php
include 'db.inc.php';

$sql = "SELECT StockID,SupplierID,ReorderLevel,ReorderQuantity,CostPrice,RetailPrice,QuantityInStock FROM Stock ";
if (!$result = mysqli_query($con,$sql))
{
	
	die ("An error in the SQL Query:" .mysqli_query($con));
}
echo "<select name = 'StockList' id = 'StockList' >";
while ($row = mysqli_fetch_array($result))
{
	
			$StockID = ['StockID'] ; 
			$SupplierID = ['SupplierID'] 
			$ReorderLevel = ['ReorderLevel'] 
			$ReorderQuantity = ['ReorderQuantity'] 
			$CostPrice = ['CostPrice'] 
			$RetailPrice = ['RetailPrice'] 
			$QuantityInStock = ['QuantityInStock'];

	echo "<option value = '$StockID'>$StockID</option>";
}
echo "</select>";
mysqli_close($con);
?>