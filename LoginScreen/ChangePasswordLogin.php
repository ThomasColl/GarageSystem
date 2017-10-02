<?php
 /* 
	//Name: Cathal Brady
	//Student Number: C00202493
 */
	'../../Resources/PHP/db.inc.php'; // include the database
	// sdql to update the password for the Employee with the id chosen  
	$sql = "UPDATE Employees SET Password = '$_POST[Password]' ,
	
			EmployeeID = '$_POST[listbox]' ,
			FirstName = '$_POST[FirstName]' ,
			LastName = '$_POST[LastName]'  WHERE EmployeeID='$_POST[EmployeeID]'";
			
	echo $sql;			
	if(!mysqli_query($con, $sql))
	{
		echo "Error " . mysqli_error($con);// if there is an error 
	}
	else
	{
		if(mysqli_affected_rows($con) != 0)// if there is no error 
		{
			echo mysqli_affected_rows($con) . " record(s) updated <br>";// update to say the system is to be changed 
			echo "The password for " . $_POST['FirstName']. $_POST['LastName'] . "with the id of " . $_POST['EmployeeID'] . " has been changed";
		}
		else
		{
			echo "No records were changed";// if there is no changes
		}
	}
	mysqli_close($con);// ends the connection
?>
<form action = "LoginChangePassword.html.php" id="pageform" method="post"/>

	<script type="text/javascript">alert("The password has been updated");</script>
	<script type="text/javascript">document.getElementById("pageform").submit();</script>
	
</form>
