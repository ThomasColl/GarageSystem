<?php
include 'db.inc.php';

$sql = "SELECT StockID,SupplierID,ReorderLevel,ReorderQuantity,CostPrice,RetailPrice,QuantityInStock FROM Stock ";
if (!$result = mysqli_query($con,$sql))
{
	
	die ("An error in the SQL Query:" .mysqli_query($con));
}
echo "<select name = 'SupplierList' id = 'SupplierList' >";
while ($row = mysqli_fetch_array($result))
{
	$id = $row['SupplierID'];
	$name = $row['SupplierName'];

	echo "<option value = '$id'> $name </option>";
}
echo "</select>";
mysqli_close($con);
?>