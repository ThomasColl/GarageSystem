<!-- Name: Thomas Coll -->
<!-- Student Number: C00204384 -->

<?php
	//include the db.inc.php stored in the Resources file
	include '../../Resources/PHP/db.inc.php';
	date_default_timezone_set("UTC");

	//if the date is set then create the 
	if(ISSET($_POST['adddategot']))
	{
		//perform an inner join to select all the neceaary rows
		$sql = "SELECT Bookings.BookingID, Bookings.CustomerID, Bookings.BDate, Bookings.BTime, Customers.CustomerID, Customers.DeleteFlag, Customers.FirstName, Customers.LastName FROM Customers INNER JOIN Bookings ON Bookings.CustomerID = Customers.CustomerID WHERE Bookings.DeleteFlag=0 AND Customers.DeleteFlag=0 AND Bookings.BDate ='" . $_POST['adddategot'] . "'" . " ORDER BY Bookings.BTime"; 
		
		//if the query fails then kill the php
		if(!$result = mysqli_query($con, $sql))
		{
			die( 'Error in querying the database' . mysqli_error($con));
		}
		
		//if there is no bookings that date create the form as such and send it back
		if(mysqli_affected_rows($con) == 0)
		{
			echo "<form name=\"myFormEmpty\" id = \"myFormEmpty\" action = \"CancelBooking.html.php\" onsubmit=\"return confirmCheck(this)\" method = \"POST\" class=\"formWidth40\">";
			echo "<p id=\"large\" >There is no bookings today, sorry </p>";
			echo "<input type=\"submit\" id=\"back2\" value=\"Back\" class=\"bigButton\">";
			echo "<br><br>";
			echo "</form>";
			UNSET($_POST['adddategot']);
		}
		
		//else create a table
		else
		{
			echo "<br><br>";
			echo "<form name=\"myFormName\" id = \"myFormName\" action = \"CancelBooking.php\" onsubmit=\"return confirmCheck(this)\" method = \"POST\" class=\"formWidth40\">";
			echo "<h2 class=\"Login centerAlign\">Cancel Booking </h2>";
			echo "<br><br>";
			//use the flow class to create a scroll bar
			echo "<div class=\"flow\">";
			echo "<table> ";
			echo "<tr><th> Time </th><th> Customer </th><th> Booking ID </th><th> Selected </th></tr>";
			
			//use two equally sized arrays, each number is corropsoinding to a time
			$numArrayPost = array("9:00-9:30", "9:30-10:00", "10:00-10:30", "10:30-11:00", "11:00-11:30", "11:30-12:00", "13:00-13:30", "13:30-14:00", "14:00-14:30", "14:30-15:00", "15:00-15:30", "15:30-16:00", "16:00-16:30", "16:30-17:00");
			$numArrayPre = array("09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30");
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
					$i = 0;
				    //use a while loop to check which value is equal to the other
					while($i < sizeof($numArrayPre))
					{
						//when the right one is found then create the td 
						if($numArrayPre[$i] == $row['BTime'])
						{
							echo "<td> " . $numArrayPost[$i] . " </td>";
						}
						$i++;
					}
					echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
					echo "<td> " . $row['BookingID'] . " </td>";
					echo "<td> <input type=\"radio\" name=\"cancel\" value=\" " . $row['BookingID'] . " \"> </td>" ;
				echo "</tr>";
			}
			
			echo "</table>";
			echo "</div>";
			echo "<br><br>";
			echo "	<input type=\"button\" id=\"back1\" onclick=\"back(this)\" value=\"Back\" class=\"button\">";
			echo "  <input type=\"button\" id=\"num2\" onclick=\"help(this)\" value=\"Help\" class=\"button\">";
			echo "	<input type=\"reset\"  value=\"Clear\" class=\"button\">";
			echo "<input type=\"submit\" id=\"submit\" value=\"Cancel Booking\" class=\"button\">";
			echo "</form>";
		}
		//unset the date variable to allow the page to be reloaded in the first way
		UNSET($_POST['adddategot']);
	}
	
	//if the variable isnt set then create the input which can set it 
	else
	{
		echo "<br>";
		echo "<form name=\"myFormDate\" id = \"myFormDate\" action = \"CancelBooking.html.php\" onsubmit=\"return confirmCheck(this)\" method = \"POST\" class=\"formWidth40\">";
		echo "<h2 class=\"Login centerAlign\">Cancel Booking </h2>";
		echo "<br>";
		echo "	<label for=\"adddategot\" > Date of Invoice </label> ";
		//call the checkDate on blur
		echo "	<input type=\"date\" name=\"adddategot\" id=\"adddategot\" onblur=\"checkDate()\" min='2000-13-13' class=\"inputP\" required/>";
		echo "<br><br>";
		echo " <br><br>";
		echo "	<input type=\"button\" onclick=\"back()\" value=\"Back\" class=\"button\">";
		echo "  <input type=\"button\" id=\"num1\" onclick=\"help(this)\" value=\"Help\" class=\"button\">";
		echo "	<input type=\"reset\"  value=\"Clear\" class=\"button\">";
		echo "	<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Pick Date\" class=\"button\"/>";
		echo "</form>"	;
	}
	mysqli_close($con);
?>
