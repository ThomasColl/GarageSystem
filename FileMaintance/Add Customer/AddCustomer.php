<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        Adds a customer and echos a success message
File:           AddCustomer.php
*/
include '../../Resources/PHP/db.inc.php';

//returns true when the submit button is pressed
if (!empty($_POST['submit'])) {
    
    //Put the posted values into variables
    $fname  = htmlspecialchars($_POST['forename']);
    $sname  = htmlspecialchars($_POST['surname']);
    $street = htmlspecialchars($_POST['street']);
    $town   = htmlspecialchars($_POST['town']);
    $county = htmlspecialchars($_POST['county']);
    $phone  = htmlspecialchars($_POST['phone']);
    $email  = htmlspecialchars($_POST['email']);
    
    //Get the highest customer id
    $sql = "SELECT MAX(CustomerID) AS MaxID FROM Customers";
    if (!$result = mysqli_query($con, $sql)) {
        die("An error in the sql query: " . mysqli_error($con));
    }
    
    $row = mysqli_fetch_array($result);
    if (is_null($row['MaxID'])) {
        //Sets the first id to one when no other records in the database
        $maxID = 1;
    } else {
        //Increment the highest id by one
        $maxID = $row['MaxID'] + 1;
    }
    
    //Insert the new record into the database
    $sql = "INSERT INTO Customers (CustomerID, FirstName, LastName, Street, Town, County, Telephone, Email, DeleteFlag)
        VALUES ('$maxID', '$fname', '$sname', '$street', '$town', '$county', '$phone', '$email', 0)";
    
    if (!$result2 = mysqli_query($con, $sql)) {
        die("An error in the sql query" . mysqli_error($con));
    }
    
    //Echo a javascript alert to notify the user that the customer was added successfully
    echo '<script language="javascript">';
    echo "alert(\"Customer $fname $sname successfully created!\")"; 
    echo '</script>';
}

?>