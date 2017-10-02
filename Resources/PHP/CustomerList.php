<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           CustomerList.php
*/
include 'db.inc.php';

//Select everything from Customers
$sql = "SELECT * FROM Customers WHERE DeleteFlag = 0";

//Perform the sql
if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

//Open the select
echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result)) {
    
    $id        = $row['CustomerID'];
    $fname     = $row['FirstName'];
    $lname     = $row['LastName'];
    $street    = $row['Street'];
    $town      = $row['Town'];
    $county    = $row['County'];
    $telephone = $row['Telephone'];
    $email     = $row['Email'];
    $flag      = $row['DeleteFlag'];
    
    //Echo all records from the customers table
    $allText = "$id*$fname*$lname*$street*$town*$county*$telephone*$email*$flag";
    echo "<option value = '$allText'>$id : $fname $lname</option>";
}

echo "</select>";
mysqli_close($con);

?>
