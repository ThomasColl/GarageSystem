<?php

//Name: Cathal Brady
//Student Number: C00202493


	include '../../Resources/PHP/db.inc.php';/// includes the database
	session_start();// starts the session 
	
	$sql = "SELECT MAX(BookingID) AS High FROM Bookings"; // creates the max booking so each ide is greater than the last 
if (!$result = mysqli_query($con,$sql))// if the query has a problem will output the code below
{
	die ("An error in the SQL Query:" .mysqli_query($con)); // prints this if there is and error in the query 
}
else 
{
	if (mysqli_affected_rows($con) == 1)
		{
			$row = mysqli_fetch_array($result);
		}
}
$High = $row['High']+1;// gets the previous high in the table and sets the new booking as the new high 
if (!ISSET($_SESSION['BookingDate']))// if the date picker is not set on the booking date
{
	$date =date("Y-m-d"); // it must follow this format 
}
else
{
	$date =$_SESSION['BookingDate']; // else takes the current date 
}

$sql = "INSERT INTO Bookings (BookingID,CustomerID,BDate,BTime,DeleteFlag)
			VALUES ($High,'$_POST[custId]','$date','$_POST[time]',0)";// inserts the booking into the booking table and sets the BookingID,CustomerID,BDate,BTime,DeleteFlag with the 
			//values  of the current highest then customer id , the date and the time 

		echo $sql ;	// echos the sql 
			
if (!mysqli_query($con,$sql))// if the query has a problem will output the code below
{
	die ("An error in the SQL Query:" .mysqli_query($con));
}	
	else
	{
		echo "<script type = 'javascript' >alert(\"successfully booked into the table\");</script> ";
	}
			
	
	mysqli_close($con);// closes the connesction 
?>
<form action = "MakeBooking.html.php" id="pageform" method="post"/> // just links it to the make a booking page 
	<script type="text/javascript">alert("The Booking has been sucessfully created")</script>
	<script type="text/javascript">document.getElementById("pageform").submit()</script>
</form>
