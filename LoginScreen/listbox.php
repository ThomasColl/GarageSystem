<?php
/* 
	//Name: Cathal Brady
	//Student Number: C00202493
*/
 
'../Resources/PHP/db.inc.php'; 
	// takes the employee tables data 
	$sql = "SELECT Employees.EmployeeID,Employees.FirstName,Employees.LastName,Employees.Password FROM Employees";

	if(!$result=mysqli_query($con,$sql))
		{
			die('Error in querying the database'.mysqli_error($con));// if there is a problem wit the query 
		}
	echo "<select name='listbox' id='listbox' onclick='populate()'>";// echo the listbox 

	while($row=mysqli_fetch_array($result))// a while loop, to go around the page and fill the listbox wuth the data for each row as shown below 
		{
			$EmployeeID=$row['EmployeeID'];
			$FirstName=$row['FirstName'];
			$LastName=$row['LastName'];
			$Password=$row['Password'];
			
			$allText="$EmployeeID,$FirstName,$LastName,$Password";// assigning vaiables to alltext
			echo "<option value = '$allText'> $Description</option>";// echoing alltext on the id Description
		/**/
	}
		echo "</select>";// echos the select
		mysqli_close($con);// closes the connection
?>
		