<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        Amends the customer details
File:           AmendViewCustomer.php
*/

include '../../Resources/PHP/db.inc.php';

if (!empty($_POST['amendfirstname'])) {
    //Sql for updating customer record
	
	$fname = htmlspecialchars($_POST['amendfirstname']);
	$sname = htmlspecialchars($_POST['amendsurname']);
	$street = htmlspecialchars($_POST['amendstreet']);
	$town = htmlspecialchars($_POST['amendtown']);
	$county = htmlspecialchars($_POST['county']);
	$tele = htmlspecialchars($_POST['amendtelephone']);
	$email = htmlspecialchars($_POST['amendemail']);
	
    $sql = "UPDATE Customers SET CustomerID = '$_POST[amendid]', FirstName = '$fname',
		LastName = '$sname', Street = '$street', Town = '$town', County = '$county',
		Telephone = '$tele', Email = '$email', DeleteFlag = 0 WHERE CustomerID = '$_POST[amendid]' ";
    //When the form gets posted 
    if ($_POST['submit']) {
        
        //Perform the sql statement
        if (!mysqli_query($con, $sql)) {
            die("Error with sql statement: " . mysqli_error($con));
        } else {
            //If a row was affected then the query was successfull
            if (mysqli_affected_rows($con) != 0) {
                
                //String to hold the alert text
                $s = "Record(s) updated: " . "Person Id " . $_POST['amendid'] . ", " . htmlspecialchars($_POST['amendfirstname']) . " " . htmlspecialchars($_POST['amendlastname']) . " has been updated.";
                
                //Echo the alert text with a2 javascript alert
                echo '<script language="javascript">';
                echo "alert(\"$s\")";
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("No records were updated!")';
                echo '</script>';
            }
        }
        mysqli_close($con);
    }
}

?>
