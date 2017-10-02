<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<?php
	//include db.inc.php which is in Resources
	include '../../Resources/PHP/db.inc.php';
	date_default_timezone_set("UTC");

	//select all suppliers who arent deleted 
	$sql = "SELECT * FROM Suppliers WHERE DeleteFlag=0 "; 
	
	//kill the php if the query fails
	if(!$result = mysqli_query($con, $sql))
	{
		die( 'Error in querying the database' . mysqli_error($con));
	}
	
	//create a select menu
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	
	while($row = mysqli_fetch_array($result))
	{
		$id = $row['SupplierID'];
		$name = $row['SupplierName'];
		$addressStreet = $row['Street'];
		$addressTown = $row['Town'];
		$addressCounty = $row['County'];
		$phone = $row['Telephone'];
		$website = $row['Website'];
		$email = $row['Email'];
		//combine all data so it can be divided by javascript
		$allText = "$id,$name,$addressStreet,$addressTown,$addressCounty,$phone,$website,$email";
		echo "<option value = '$allText'> $name </option>";
	}
	
	echo "</select>";
	mysqli_close($con);
?>
