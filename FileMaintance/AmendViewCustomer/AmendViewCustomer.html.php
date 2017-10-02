<!--
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		Amend/View a Customer record
File:			Amend/ViewCustomer.html.php
-->
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel="stylesheet" type="text/css" href="AmendViewCustomer.css">
    <link rel="stylesheet" type="text/css" href="http://garage.candept.com/Resources/CSS/General.css">
    <script type="text/javascript" src="AmendViewCustomer.js"></script>
	<script type="text/javascript" src="http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>
	<!--Script import for jquery. I used jquery in AmendViewCustomer.js-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
    <title>Speed Shop - Amend/View Customer</title>
</head>

<body>
	<?php include 'AmendViewCustomer.php'; ?>	<!--Include the php to update the customer record, values posted to this-->
    <header>
        <a href = "http://garage.candept.com/MainMenu.html.php"><h1 class="header centerAlign">Speed Shop</h1></a>
    </header>
    <hr>
    <?php include '../../Resources/PHP/menubar.php'; ?>	<!--Include the menu bar-->
    <hr>
	<?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>
    <br><br>
    <form class="formWidth40" onsubmit="return confirmCheck()" method="Post">
        <h2 class="centerAlign">Amend/View Customer</h2>
        <br>
		<input type="text" id="search" onkeyup="searchFunction()" placeholder="Search by name..">	<!--Search box-->
		<input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
		<br><br>	
        <?php include '../../Resources/Alex/CustomerSelectTable.php'; ?>	<!--Include customer select table-->
        <br>
        <label for="amendid">ID:</label>
        <input class="inputP" type="text" name="amendid" id="amendid" placeholder="Customer ID.." disabled />
        <br><br>

        <label for="amendfirstname">Forename:</label>
        <input class="inputP" type="text" name="amendfirstname" id="amendfirstname" placeholder="Forename.." pattern="[A-Za-z. ]{1,30}" 
		title = "Forename must only contain letters, spaces or fullstops and be no longer than 30 letters." disabled required />
        <br><br>

        <label for="amendsurname">Surname:</label>
        <input class="inputP" type="text" name="amendsurname" id="amendsurname" placeholder="Surname.." pattern="[A-Za-z ]{1,30}" 
		title = "Surname must only contain letters, spaces or a hyphen and be no longer than 40 characters long." disabled required />
        <br><br>

        <label for="amendstreet">Street:</label>
        <input class="inputP" type="text" name="amendstreet" id="amendstreet" placeholder="Street.." pattern="[A-Za-z0-9.,' ]{3,60}" 
		title="Street must be no longer than 60 characters long and contain only the following characters: A-Z a-z 0-9.,' " disabled required />
        <br><br>

        <label for="amendtown">Town:</label>
        <input class="inputP" type="text" name="amendtown" id="amendtown" placeholder="Town.." pattern="[A-Za-z0-9., ]{3,60}" 
		title="Town must be no longer than 60 characters long and contain only the following characters: A-Z a-z 0-9., " disabled required />
        <br><br>
		
        <label for="amendcounty">County:</label>
		<?php include 'countySelectAmend.php'; ?>	<!--Include a county select box-->
        <br><br>

        <label for="amendtelephone">Telephone:</label>
        <input class = "inputP" type = "text" name = "amendtelephone" id = "amendtelephone" pattern = "[0-9-() ]{9,15}" 
		title = "Phone number can only contain 0-9, -, () and spaces and be no longer than 15 characters long." disabled required />
        <br><br>

        <label for="amendemail">Email:</label>
        <input class="inputP" type="email" name="amendemail" id="amendemail" placeholder="E-mail.." 
		pattern="[A-Z a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" title="Email address must be in the following format: username@emailprovider.xxx. 
		Username can contain the following characters: A-Z a-z 0-9 ._%+-" disabled required />
        <br><br><br>

        <input name = "submit" class="buttons" id="button1" type="submit" value="Amend Customer">
		<input class="buttons" id="button2" type="reset" value="Clear all" name="cancel" onclick = "unselect()" />
        <input class="buttons" id="button3" type="button" value="Help" name="Help" onclick="showHelpPrompt()" />
        <input class="buttons" id="button4" type="button" value="Back" name="Back" onclick="goBack()" />
        <br>
    </form>
    <br><br><br>
    <div class="footer">Speed Shop 2017&reg;</div>

</body>

</html>