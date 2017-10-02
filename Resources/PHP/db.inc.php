<?php
	//Define the necessary vars
  $hostname = "localhost";
  $username = "mechanic";
  $password = "PraiseKek";
  $dbName = "GarageDB";
  
  //connect to the databse
  $con = mysqli_connect($hostname, $username, $password, $dbName);
  
  if (!$con) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  ?>