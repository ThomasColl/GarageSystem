<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           CustomerSelectTable.php
*/
//This file echos a table of customers which can be selected
include '../../Resources/PHP/db.inc.php';
//Only select customers records which have not been deleted
$sql = "SELECT * FROM Customers WHERE DeleteFlag = 0";

//Perform the sql
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

//Variable to give each row an id
$item = 0;

//Print the headings of the table
echo "<div style = \"height: 200px; overflow-y: scroll; border: 1px #aaa solid;\">
	<table id = \"customerTable\"><tr onclick = \"selectRow(this)\" id = \"$item\">
	<th class = \"vshort\">ID</th>
	<th class = \"short\">Name</th>
	<th class = \"long\">Address</th></tr>";

//Fill the table with values from the customer table
while ($row = mysqli_fetch_array($result)) {
    $item++;
    $id        = $row['CustomerID'];
    $fname     = $row['FirstName'];
    $lname     = $row['LastName'];
    $street    = $row['Street'];
    $town      = $row['Town'];
    $county    = $row['County'];
    $telephone = $row['Telephone'];
    $email     = $row['Email'];
    
    $allText = "$id*$fname*$lname*$street*$town*$county*$telephone*$email";
    echo "<tr onclick = \"selectRow(this)\" id = \"$item\" data-value = \"$allText\">
		<td>" . $row['CustomerID'] . "</td>
		<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>
		<td>" . $row['Street'] . "</td>
		</tr>";
    
}
//Close the table
echo "</table>	
	</div><br>";
mysqli_close($con);
?>