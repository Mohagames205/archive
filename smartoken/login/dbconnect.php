<?php

	 $DBhost = "localhost";
	 $DBuser = "Mohamed";
	 $DBpass = "Leuven65862";
	 $DBname = "smartoken";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
