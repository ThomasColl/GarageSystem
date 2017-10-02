<?php
//Name: Cathal Brady
//Student Number: C00202493

include '../../Resources/PHP/db.inc.php';/// includes the database

$sql = "SELECT * FROM Customers WHERE DeleteFlag = 0";//  this sql statement sleects everyrthing from the the stock table where the delete flag = 0 

if(!$result=mysqli_query($con,$sql))
	{
		die('Error in querying the database'.mysqli_error($con));// if there is an error in the query echos this will be outputted
	}
echo "<select name='listbox' id='listbox'>";// pulls up the listbox 

while($row=mysqli_fetch_array($result))// uses a while loop to populate the table
	{
		
		$FirstName=$row['FirstName'];
		$LastName=$row['LastName'];
		$CustomerID=$row['CustomerID'];
		$Street =$row['Street'];
		$Town =$row['Town'];
		$County =$row['County'];
		$Address = "$Street, $Town, $County";
		
		$allText="$FirstName,$LastName,$CustomerID";// assigns the chosen variables the allText 
		echo "<div align=\"center\">
		<option value = '$allText'> $CustomerID : $FirstName $LastName : $Address </option></div>";// outputs all text and the customer id and the First Name and   Last Name and Address 
	
}
	echo "</select>";// echos the select 
	mysqli_close($con);// closes the sql
	
?>	