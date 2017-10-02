	<?php
		include 'db.inc.php';
		$sql = "SELECT * FROM Employees WHERE LoggedIn = 1";
		if (!$result = mysqli_query($con, $sql)) {
          die ("An error in the sql query" . mysqli_error($con));
		}
		$row = mysqli_fetch_array($result);
		echo "<label id=\"currentlyLoggedIn\">Logged in: " . $row['FirstName'] . " " . $row['LastName'] . "</label><br>
		<label id = \"currentTime\"></label>";
		
		
		
		/*
		
		//**Change to the code when login screen is done
		
		
		session_start();
		include 'db.inc.php';
		//Echo out the the name of whoever is logged in and the current time
		echo "<label id='currentlyLoggedIn'>Logged in: " . $_SESSION['LoggedIn'] . "</label><br>
			  <label id = 'currentTime'></label>";
			  
		*/
	?>
	
	
	