<?php
include '../../Resources/PHP/db.inc.php';//Connection to the database.

$sql = "SELECT OrderID FROM Orders WHERE Delivered = '0'";
if(!$result = mysqli_query($con, $sql))
{
	die('Error in querying the database' . msqli_error($con));
}
echo "
<label for = list>Select Order By ID:</label>
	  <select name = 'listbox' id = 'listbox' onclick = 'populate()' class = 'inputP'>";
	 
while($row = mysqli_fetch_array($result))
{
	
	$OrderID= $row['OrderID'];
	
	$allText = "$OrderID,$Date";

	echo"<option value = '$allText'>$OrderID</option>";
}
echo "</Select>";
mysqli_close($con);
?>