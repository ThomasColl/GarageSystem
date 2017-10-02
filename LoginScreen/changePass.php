<?php
/* 
		//Name: Cathal Brady
		//Student Number: C00202493
 */
	session_start();// starts the session
	include '../Resources/PHP/db.inc.php';
	
	if ( isset($_SESSION['user'])) {	// checks the user loginin
	
		// for changing the passwords  
		// if password is sets && newPass is sets
		if ( isset($_POST['Password'])&& isset($_POST['newPass'])&& isset($_POST['ConfirmPass'])) 
		{
				$old = $_POST['Password'];// sets vaiable
				$new = $_POST['newPass'];
				$confirm = $_POST['ConfirmPass'];
		
		
				$user = $_SESSION['user'];// sets the session user 
				// pulls the users from the employee id 
				$sql = "SELECT * FROM Employees WHERE EmployeeID = '$_POST[EmployeeID]' AND Password='$_POST[Password]'";
				//echo $sql;
				if(!mysqli_query($con,$sql)) 
					
					echo "Error in query".mysqli_error($con);// echo if there is a problem 
				else 
				{
					if(mysqli_affected_rows($con)==0)
					{
						buildPage($old,$new,$confirm);// if the user enter the wrong old password 
						echo "<div class ='errorstyle'>Old password incorrect!.</div>";
					} 
					else 
					{
						if($_POST['newPass']!= $_POST['ConfirmPass']) // checks if the new password is the same as the one entered into the confirm password 
						{
							buildPage($old,$new,$confirm);// if they do not match enter this.
							echo "<div class ='errorstyle'>New passwords do not match please try again.</div>";
						} 
						else 
						{
							// updates the employees table with the new password of the user that is logged in
							$sql = "UPDATE Employees SET Password = '$_POST[newPass]'WHERE EmployeeID = '$_SESSION[user]'";
							echo $sql;
							if(!mysqli_query($con,$sql))// if there is an error in the query echos the statement below
								echo "Error in update query".mysqli_error($con);
							else 
							{
								if(mysqli_affected_rows($con)==0) // if there an error in the update the following message is outputed 
								{
									buildPage($old,$new,$confirm);
									echo"<div class ='errorstyle'Sorry - update not sucessful!</div> ";
								} 
									else 
									{
										// if sucessful the following message will be outputed and thwe pafge with be redirected
										echo"<div class ='errorstyle'>Congratualtion, your password has been updated!</div> ;
										<script>document.getElementById(\"pageform\").submit()</script>
										<h3><input type ='\button\' value =\'\Proceed to main menu\' onclick =\'window.location\=\"menu.php\'></h3>";
										
									}
							}
						}
					}
				
				}
		} 
		else 
		{
			// building the initial display
			buildPage("","","");// sets the buildPage as blank on start 
		}
	} 
	else
	{
		// prints out if there is no user logged into the page 
		echo '<div class ="nologin">you must be logged in to view this page</div>';
	}
function buildPage($o,$n,$c)// builds the buildpage if the inital loggin failed
{
			echo"<body>
			
			 <header>
		<a href=\"MainMenu.html.php\"><h1 class=\"header centerAlign\">Speed Shop</h1></a>
    </header>
    <hr>
	<?php session_start();?>
	<?php include '../Resources/PHP/menubar.php'; ?><!-- includes the menu bar    --->
    <hr>
	<?php include '../Resources/PHP/LoggedInAndCurrentTime.php'; ?><!-- includes the loggin and current time     --->
    <br><br>
<!-------------------------------------START FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
		<form name=\"myForm\" action = \"changePass.php\" onsubmit=\"return confirmCheck()\" method = \"POST\" class=\"formWidth40\">
		<h2 class=\"centerAlign\">Welcome. Login to your account.</h2>
			
		<label for=\"EmployeeID\">old Password:</label>
		<input type=\"Password\" name=\"old password\" id ='Password'autocomplete = 'off' value =$o  title=\"Please enter your old password here.\" placeholder=\"Enter username..\"  required autofocus/><br><br>
			 
		<label for=\"Password\">New Password:</label>
		<input type=\"Password\" name=\"newPass\"id ='newPass'autocomplete = 'off'value =$n title=\"Please enter your  new password here.\" placeholder=\"Enter password..\"  required/><br><br>
			
		<label for=\"Password\">Confirm New Password:</label>
		<input type=\"Password\" name=\"confirmPass\"id ='newPass'autocomplete = 'off'value =$c title=\"Please enter your  new password here.\" placeholder=\"Enter password..\"  required/><br><br>
		
		<input type ='submit' value ='submit'>
		<br><br>

		<input  class=\"buttons\" type=\"submit\" value=\"Login\" id=\"button\" onclick=\"return confirm('Are you sure you wish to login)\" />
        <input class=\"buttons marginRight\" type=\"reset\" value=\"Clear\" id=\"button2\" name=\"clearForm\" onclick=\"refresh()\"/>  
		<input class=\"buttons marginRight\" type=\"button\" value=\"Help\" id=\"button3\" name=\"Help\" onclick=\"help()\"/>  
		<input class=\"buttons marginRight\" type=\"button\" value=\"Back\" id=\"button4\" name=\"Back\" onclick=\"back()\"/>  
		<br><br>
		</form>
<!-------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  	  
	  <br><br>
	<div class=\"footer\">Speed Shop 2017&reg;</div>
</body>";
}
mysqli_close($con);// connection_aborted sql is closed
?>
<form id="submit" action="ChangePassword.html.php" >
 <script>
alert("Password sucessfully amended")
 document.getElementById("submit").submit();
</script>