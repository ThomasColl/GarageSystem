<?php
/*
Name:           Alex Matthews
Student Number: C00208942
Purpose:        2nd Year Project
File:           DeleteCustomer.php
*/
//No need for htmlspecialchars because posted information comes from database
include '../../Resources/PHP/db.inc.php';

//Checks if the customer has a booking
$sql = "SELECT * FROM Customers INNER JOIN Bookings ON 
	Customers.CustomerID = Bookings.CustomerID WHERE Customers.CustomerID = '$_POST[delid]'";

if (!mysqli_query($con, $sql)) {
    //Should never get here
    echo "Error" . mysqli_error($con);
} else {
    if (mysqli_affected_rows($con) > 0) {
        //if the customer does have a booking
        echo '<script language="javascript">';
        echo 'alert("You cant delete that customer because they currently have a booking. Cancel the booking and try again.")';
        echo '</script>';
        
    } else {
        //Customer has no bookings so delete is ok
        $sql = "UPDATE Customers SET DeleteFlag = 1 WHERE CustomerID = '$_POST[delid]'";
        if (!mysqli_query($con, $sql)) {
            //Should never get here
            echo "Error" . mysqli_error($con);
        } else {
            
            if (mysqli_affected_rows($con) != 0) {
                //Delete successfull
                $s = "The person with ID number " . $_POST['delid'] . " has been deleted.";
                echo '<script language="javascript">';
                echo "alert(\"$s\")";
                echo '</script>';
            } else {
                //Should never get here
                echo '<script language="javascript">';
                echo 'alert("No records were updated!")';
                echo '</script>';
            }
        }
    }
}
mysqli_close($con);

?>

<form action = "DeleteCustomer.html.php" method = "post" name = "submit" id = "submit">
<input type = "submit" style = "display:none;">
</form>
<?php
//Script to submit page and return to delete customer
echo "<script>document.getElementById(\"submit\").submit();</script>";
?>