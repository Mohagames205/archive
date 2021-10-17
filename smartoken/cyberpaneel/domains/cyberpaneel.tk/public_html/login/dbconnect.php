<?php

	 $DBhost = "localhost";
	 $DBuser = "cyberpan_mohamed";
	 $DBpass = "Leuven65862";
	 $DBname = "cyberpan_login";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }