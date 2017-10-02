	<link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg"><!-- pulls stylesheets form the resources folder    --->
	<link rel="stylesheet" href="http://garage.candept.com/Resources/CSS/General.css"><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script><!-- pulls stylesheets form the resources folder    --->
	<script type="text/javascript" src="ChangePass.js"></script>
	<link rel="stylesheet" href="Login.css"> 
<?php
/* 
			//Name: Cathal Brady
			//Student Number: C00202493
 */
	session_start();// starts the session
	include '../Resources/PHP/db.inc.php'; 
	
	if ( isset($_POST['EmployeeID'])&& isset($_POST['Password']))// if the employees  and the password match enter the if 
	{
		$attempts = $_SESSION['attempts'];// counts the number of attempts
		$sql = "SELECT * FROM Employees WHERE EmployeeID = '$_POST[EmployeeID]' AND Password='$_POST[Password]'";// selects from the employee table where the EmployeeID AND Password match
			
			if(!mysqli_query($con,$sql))
				{
					echo "Error in query".mysqli_error($con);// echo if there is a problem 
				}
				
			else 
				{
					if(mysqli_affected_rows($con) == 0)
						{
									$attempts++;// counts the number of atempts	
									if($attempts <=3)// if the atempts is <=3
										{
												$_SESSION['attempts']=$attempts;// remeber the attempt
												buildPage($attempts);//
												echo "<div class ='errorstyle'>NO record found with this login name and password combination- Please try again.</div>";// echo if there is no login with this login wirth ther same password 
										}
									else/// else if the user has gone passed the 3 attempts 
										{
												// output this
												echo "<div class ='errorstyle'>Sorry you have used all 3 atempts the system is now shutting down...</div>";
										}
						}
					else
						{
									//successful login 
									$_SESSION['user']= $_POST['EmployeeID'];//session variable to keep track of the login name
									// for use with the change password screen
									// if you wish to change the loggin status 
									//UPDATE Employees SET LoggedIn = '(userchoice either 1 or 0)' WHERE EmployeeID = '$_POST[EmployeeID]' AND Password='itcarlow'
									$sql = "UPDATE Employees SET LoggedIn = '1' WHERE EmployeeID = '$_POST[EmployeeID]'";
									echo"<script>alert(\'Login Successful!\');</script>\"
									<script>	function newDoc()
									{
										window.location.assign(\"http://garage.candept.com/MainMenu.html.php\")
									}
									</script><body>
									<input type=\"button\" value=Proceed to main page onclick=\"newDoc()\">
									</body></html>";
									/*	
											<h2>Welcome to speedshop</h2>
											<h3>Do you wish to change your password or go directly to the main menu?</h3
											<input type='button' value ='change Password' onclick = 'window.location = \"changePass.php\"'>
											<input type='button' value ='change Password' onclick = 'window.location = \"LoginChangePassword.php\"'>";
									*/
									
						}			
				}					
	}										
	else
	{
		//building page for initial display
		$attempts =1;/// screen will displayed for the first attempts // sets the attempts at 1 
		$_SESSION['attempts']= $attempts; // sets the sesion variable for the attempt
		buildPage($attempts);// builds the atempts page 


	}
		function buildPage($att)// to build the attemps page 
		{
			echo " 	<body>

    <header>
		 <a href=\"http://garage.candept.com/MainMenu.html.php\"><h1 class=\"header centerAlign\">Speed Shop</h1></a><!-- goes to the main menu when clixcked  --->
    </header>
    <hr>
	<?php session_start();?>

    <hr>
	<?php include '../Resources/PHP/LoggedInAndCurrentTime.php'; ?><!-- includes the loggin and current time     --->
    <br><br>
<!-------------------------------------START FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  
		<form name=\"myForm\" action = \"LoginScreen.php\" onsubmit=\"return confirmCheck()\" method = \"POST\" class=\"formWidth40\">
		<h2 class=\"centerAlign\">Welcome. Login to your account.</h2>
			
		<label for=\"EmployeeID\">EmployeeID:</label>
		<input class=\"inputP\" type=\"text\" name=\"EmployeeID\" id=\"EmployeeID\" title=\"Please enter your username here.\" placeholder=\"Enter username..\"  required autofocus/><br><br>
			 
		<label for=\"Password\">Password:</label>
		<input class=\"inputP\" type=\"Password\" name=\"Password\" id=\"Password\" title=\"Please enter your password here.\" placeholder=\"Enter password..\"  required/><br><br>
			
		<br><br>

		<input type=\"submit\" value=\"Login\" id=\"button\" class=\"buttons\"  />
        <input  type=\"reset\" value=\"Clear\" id=\"button2\" class=\"buttons marginRight\" name=\"clearForm\" onclick=\"refresh()\"/>  
		<input type=\"button\" value=\"Help\" id=\"button3\" class=\"buttons marginRight\" name=\"Help\" onclick=\"help()\"/>  
		<br><br>
		</form>
<!-------------------------------------END FORM HERE-------------------------------------------------------------------------------------------------------------------------------------->	  	  
	  <br><br>
	<div class=\"footer\">Speed Shop 2017&reg;</div>
</body>";

		}
mysqli_close($con);// connection_aborted sql is closed
?>