<!--
Name: 			Alex Matthews
Student Number: C00208942
Purpose:		Reorder Letter
File:			ReorderLetter.html.php
-->

<!DOCTYPE html>

<html>
<head>
    <link rel="icon" href="http://garage.candept.com/Resources/Images/icon.jpg">
    <link rel="stylesheet" type="text/css" href="ReorderLetter.css">	<!--ReorderLetter.css-->
    <link rel="stylesheet" type="text/css" href="http://garage.candept.com/Resources/CSS/General.css">				<!--General.css-->
	<script type="text/javascript" src="ReorderLetter.js"></script>		<!--ReorderLetter.js-->
    <title>Speed Shop - Reorder Letter</title>
</head>

<body>
    <header>
        <a href="MainMenu.html"><h1 class = "header centerAlign">Speed Shop</h1></a>
    </header>
    <hr>
    <?php include '../../Resources/PHP/menubar.php'; ?>		<!--include menubar.php-->
    <hr>
	<br><br>
	<?php include 'ReorderLetter.php' ?><!--include ReorderLetter.php-->
	<div id = "buttonDiv">	<!--Div to center buttons-->
	<input id="button2" type="button" value="Help" name="Help" onclick="showHelpPrompt()" />
	<input id="button1" type="button" value="Print Reorder Letter" name="print" onclick="printDiv('reorderLetterDiv')" />	<!--Button to print the letter-->
	</div>
	<br><br><br><br>
    <div class="footer">Speed Shop 2017&reg;</div>	<!--Footer-->
</body>

</html>