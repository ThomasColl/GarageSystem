<?php
include '../../Resources/PHP/db.inc.php';

$sql = "SELECT SupplierID, SupplierName, Street, Town, County, Telephone, Website, Email FROM Suppliers WHERE DeleteFlag = 0";

if(!$result = mysqli_query($con, $sql))
{
	die('Error in querying the database' . msqli_error($con));
}
echo "<Label for = 'list'> Select Supplier: </Label>";
echo "<select name = 'listbox' id = 'listbox' class = 'inputP' onclick = 'populate()'>";
while($row = mysqli_fetch_array($result))
{
	$SupplierID = $row['SupplierID'];
	$Sname = $row['SupplierName'];
	$Street = $row['Street'];
	$Town = $row['Town'];
	$County = $row['County'];
	$Telephone = $row['Telephone'];
	$Website = $row['Website'];
	$Email = $row['Email'];
	$allText = "$SupplierID,$Sname,$Street,$Town,$County,$Telephone,$Website,$Email";
	echo"<option value = '$allText'>$Sname</option>";
}
echo "</select>";
mysqli_close($con);
?>