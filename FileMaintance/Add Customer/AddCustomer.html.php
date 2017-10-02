<!--
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		Add a Customer
File:			AddCustomer.html.php
-->
<!DOCTYPE html>
<html>
   <head>
      <link rel = "icon" href = "http://garage.candept.com/Resources/Images/icon.jpg">	<!--include the icon-->
      <link rel = "stylesheet" type = "text/css" href = "AddCustomer.css">
      <link rel = "stylesheet" type = "text/css" href = "http://garage.candept.com/Resources/CSS/General.css">	<!--Link general-->
      <script type = "text/javascript" src = "AddCustomer.js"></script>
      <script type = "text/javascript" src = "http://garage.candept.com/Resources/JavaScript/LoggedInAndCurrentTime.js"></script>	<!--JS for current time-->
      <title>Speed Shop - Add New Customer</title>
   </head>
   <body>
      <header>
         <a href = "http://garage.candept.com/MainMenu.html.php">	<!--Link the main menu-->
            <h1 class = "header centerAlign">Speed Shop</h1>
         </a>
      </header>
      <hr>
      <?php include '../../Resources/PHP/menubar.php'; ?>	<!--Link the menubar-->
      <hr>
      <?php include '../../Resources/PHP/LoggedInAndCurrentTime.php'; ?>	<!--Link logged in and current time-->
      <br><br>
      <div>
         <form class = "formWidth40" onsubmit = "return confirmCheck()" method = "Post">
            <h2 class = "centerAlign">Add Customer</h2>
            <br>
            <label for = "forename">Forename:</label>
            <input class = "inputP" type = "text" name = "forename" id = "forename" pattern = "[A-Za-z. ]{1,30}" 
               title = "Forename must only contain letters, spaces or fullstops and be no longer than 30 letters." required autofocus />
            <br><br>
			
            <label for = "surname">Surname:</label>
            <input class = "inputP" type = "text" name = "surname" id = "surname" pattern = "[A-Za-z- ]{1,40}" 
               title = "Surname must only contain letters, spaces or a hyphen and be no longer than 40 characters long." required />
            <br><br>
			
            <label for = "street">Address(Street):</label>
            <input class = "inputP" type = "text" name = "street" id = "street" pattern = "[A-Za-z0-9.,' ]{3,60}" 
               title = "Street must be no longer than 60 characters long and contain only the following characters: A-Z a-z 0-9.,' " required />
            <br><br>
			
            <label for = "town">Address(Town):</label>
            <input class = "inputP" type = "text" name = "town" id = "town" pattern = "[A-Za-z0-9., ]{3,60}" 
               title = "Town must be no longer than 60 characters long and contain only the following characters: A-Z a-z 0-9., " required />
            <br><br>
			
            <label for = "county">Address(County):</label>
            <?php include 'countySelectAdd.php'; ?>
            <br><br>
			
            <label for = "phone">Telephone:</label>
            <input class = "inputP" type = "text" name = "phone" id = "phone" pattern = "[0-9-() ]{9,15}" 
               title = "Phone number can only contain 0-9, -, () and spaces and be no longer than 15 characters long." required />
            <br><br>
			
            <label for = "email">E-mail:</label>
            <input class = "inputP" type = "email" name = "email" id = "email" title = "Email address must be in the following format: username@emailprovider.xxx. 
               Username can contain the following characters: A-Z a-z 0-9 ._%+-" pattern = "[A-Z a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required/>
            <br><br><br>
			
            <input class = "buttons greyHover" id = "button" type = "submit" value = "Add Customer" name = "submit" />
            <input class = "buttons marginRight greyHover" id = "button2" type = "reset" value = "Clear Form" name = "clearForm" />
            <input class = "buttons marginRight greyHover" id = "button3" type = "button" value = "Help" name = "Help" onclick = "showHelpPrompt()" />
            <input class = "buttons marginRight greyHover" id = "button4" type = "button" value = "Back" name = "Back" onclick = "goBack()" />
            <br>
         </form>
         <br><br>
      </div>
      <?php include 'AddCustomer.php'; ?>	<!--Include add customer.php, Values posted here and add is performed-->
      <div class = "footer">Speed Shop 2017&reg;</div>
   </body>
</html>