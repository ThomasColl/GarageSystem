<?php
//Name: Cathal Brady
//Student Number: C00202493

session_start();/// starts the session 
include '../../Resources/PHP/db.inc.php';/// includes the database

		
if(empty($_POST['Changedate']))// pulls up todays date 
{	
	$date =date("Y-m-d");

	$sql = "SELECT * FROM Bookings INNER JOIN Customers ON Bookings.CustomerID = Customers.CustomerID WHERE Bookings.DeleteFlag = 0 AND Customers.DeleteFlag = 0 AND BDate = '$date'";
	// if there is any existing bookings in the table it will be outputted on the screen
	
	if(!$result=mysqli_query($con,$sql))// if there is a problem with the query 
		{
			die('Error in querying the database'.mysqli_error($con));// echos this 
		}
		// else this code will be echoed this echos the table with the time and customer headings which is then filled 
	echo "<div class=\"scroll\"><table id = \"BookingTimesAvail\"><tr>

				<th>Time</th>
				<th>Customer</th>
				</tr>" ;
	
	// sets the booking times as shown below
	$times = array("09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00");

	
	$rowCount = 0;
	for( $i = 0; $i < 16; $i++ ) // runs a loop to echo the times into the table
	{

		while ($row = mysqli_fetch_array($result)) 
		{
			if ($row['BTime'] == $times[$rowCount]) // if row [BTime] is == to times above i++ 
			{
						echo "
				<tr onclick = \"populate(this)\">
				<th>$times[$rowCount]</th>";
				echo "<th>$row[FirstName] $row[LastName]</th>"; // echo the first namwe last name 
				$rowCount++;
				
			
			}
			
		}
		mysqli_data_seek ($result , 0);
		if ($rowCount < $i) // if a row was not printed above prints an empty row
		{
									echo "
				<tr onclick = \"populate(this)\">
				<th>$times[$rowCount]</th>";
			echo "<th></th>"; // echos the th
			$rowCount++;
		}
  
		echo  "</tr>";// echo table row
		
    }
		echo '</table></div>';	// echo the full table
		
} 
else
	{
	///// ------------------------------- FOR CHOSEN DATE ONLY ----------------------------------------*/
	$date =date("Y-m-d");
	// if there is any existing bookings in the table it will be outputted on the screen for this date
	$sql = "SELECT * FROM Bookings INNER JOIN Customers ON Bookings.CustomerID = Customers.CustomerID WHERE Bookings.DeleteFlag = 0 AND Customers.DeleteFlag = 0 AND BDate = '$_POST[Date]'";
	if(!$result=mysqli_query($con,$sql))// for selected dates putting a date into the date picker 
		{
			die('Error in querying the database'.mysqli_error($con));// if there is a problem with the query 
		}
		// echos the table headings 
	echo "<div class=\"scroll\"><table id = \"BookingTimesAvail\"><tr>

				<th>Time</th>
				<th>Customer</th>
				</tr>";
				
	
	// sets the booking times as shown below
	$times = array("09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00");
	
	
	$rowCount = 0;
	for( $i = 0; $i < 16; $i++ ) // runs a loop to echo the times into the table
	{

		while ($row = mysqli_fetch_array($result)) 
		{
			if ($row['BTime'] == $times[$rowCount]) // if row [BTime] is == to times above i++ 
			{
						echo "
				<tr onclick = \"populate(this)\">
				<th>$times[$rowCount]</th>";
				echo "<th>$row[FirstName] $row[LastName]</th>"; // echo the first namwe last name 
				$rowCount++;
				
			
			}
			
		}
		mysqli_data_seek ($result , 0);
		if ($rowCount < $i) // if a row was not printed above prints an empty row
		{
									echo "
				<tr onclick = \"populate(this)\">
				<th>$times[$rowCount]</th>";
			echo "<th></th>"; // echos the th
			$rowCount++;
		}
		
	}
	echo '</table></div>';// echo the full table
	$_SESSION['BookingDate']=$_POST['Date'];// sets the session variable or the booking darte as the date chosen
}
mysqli_close($con);	// closes the connection
?>