<?php
include 'db.inc.php';

$sql = "SELECT CustomerID,FirstName,LastName FROM Customers ";
if (!$result = mysqli_query($con,$sql))
{
	
	die ("An error in the SQL Query:" .mysqli_query($con));
}
echo "<select name = 'clientList' id = 'clientList' >";
while ($row = mysqli_fetch_array($result))
{
	$id = $row['CustomerID'];
	$Fname = $row['FirstName'];
	$Lname = $row['LastName'];
	

	echo "<option value = '$id',> CustomerID </option>";
}
echo "</select>";
mysqli_close($con);
?>