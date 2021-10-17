<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $user_id = $_POST['user_id'];
            $points = $_POST['points'];
            
            $sql = "UPDATE tbl_users ". "SET points = $points ". 
               "WHERE user_id = $user_id" ;
            mysql_select_db('smartoken');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "<h1> Data succesvol geupdate! ga\n <a href='/index.php'> Terug naar home </a> </h1>";
			echo "<h3> Of gebruik de andere onderstaande functies: </h3>";
			echo "<p> Bewerkt meer door  <a href='index.php'> hier </a> te klikken </p>";
			echo "<p>Ga terug naar het admin paneel </p>";
            
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Gebruikers ID</td>
                        <td><input name = "user_id" type = "text" 
                           id = "user_id"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Aantal Tokens</td>
                        <td><input name = "points" type = "text" 
                           id = "points"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>