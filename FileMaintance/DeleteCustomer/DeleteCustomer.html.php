<!--
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		Delete a customer
File:			DeleteCustomer.html.php
-->

<!DOCTYPE html>
<html>
   <head>
      <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
      <link rel="stylesheet" type="text/css" href="DeleteCustomer.css">		<!--DeleteCustomer.css-->
	  <link rel="stylesheet" type="text/css" href="http://garage.candept.com/Resources/CSS/General.css">			<!--General.css-->
	  <script type = "text/javascript" src = "DeleteCustomer.js"></script>	<!--DeleteCustomer.js-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	<!--Script import for jquery. I used jquery in DeleteCustomer.js-->
	  <script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	<!--LoggedInAndCurrentTime.css - updates the time-->
      <title>Speed Shop - Delete Customer</title>
   </head>
   <body>
      <header>
	  <a href = "http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>	<!--Main heading-->
      </header>
      <hr>
      <?php include '../../Resources/PHP/menubar.php'; ?>		<!--Include the menubar-->
      <hr>
	  <?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?><br><br>	<!--Include the logged in user and current time in the right corner-->
         <form class = "formWidth40" id = "deleteCustomerForm" action = "DeleteCustomer.php" onsubmit = "return confirmCheck()" method = "Post" >
            <h2 class="centerAlign">Delete Customer</h2><br>
			<input type="text" id="search" onkeyup="searchFunction()" placeholder="Search by name.."><br><br>	<!--Search box-->
			<?php include '../../Resources/Alex/CustomerSelectTable.php'; ?>		<!--Include the customer select table-->
            <br>
			<!--Input boxes-->
			<label for = "delid">ID:</label>
            <input class="inputP" type = "text" name = "delid" id = "delid" placeholder = "Customer ID.." disabled />
            <br><br>			
			
            <label for = "delfirstname">First name:</label>
            <input class="inputP" type = "text" name = "delfirstname" id = "delfirstname" disabled />
            <br><br>
			
            <label for = "dellastname">Surname:</label>
            <input class="inputP" type = "text" name = "dellastname" id = "dellastname" disabled />
            <br><br>
			   
			<label for = "delstreet">Street:</label>
            <input class="inputP" type = "text" name = "delstreet" id = "delstreet" disabled />
			<br><br>
			   
			<label for = "deltown">Town:</label>
            <input class="inputP" type = "text" name = "deltown" id = "deltown" disabled />
			<br><br>
			   
			<label for = "delcounty">County:</label>
            <input class="inputP" type = "text" name = "delcounty" id = "delcounty" disabled />
			<br><br>
			   
			   			   
			<label for = "delphone">Telephone:</label>
            <input class="inputP" type = "text" name = "delphone" id = "delphone" disabled />
			<br><br>
			   
			   			   
			<label for = "delemail">Email:</label>
            <input class="inputP" type = "text" name = "delemail" id = "delemail" disabled />
			<br><br><br>
			   
            <input class="buttons greyHover" type = "submit" id = "button1" value = "Delete Customer">
			<input class="buttons marginRight greyHover" id="button2" type="button" value="Help" name="Help" onclick="showHelpPrompt()"/>  
			<input class="buttons marginRight greyHover" id="button3" type="button" value="Back" name="Back" onclick="goBack()"/> 
			<br>
         </form>
	  <br><br><br>
	 <div class="footer">Speed Shop 2017&reg;</div>	<!--Footer-->
   </body>
</html>