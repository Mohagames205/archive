<?php
class Scoreboard{
    public function getScoreboard(){
        require_once("../connect.php");
        $searchBoard = $handle->prepare("SELECT * FROM scoreboard ORDER BY kills DESC LIMIT 10");
        $searchBoard->execute();
        $pos = 1;
        $sb = "<table class='table table-dark table-striped'> <tr><th>Positie</th><th>Naam</th><th>Kills</th></tr>";
        foreach($searchBoard as $user){
            $username = $user["username"];
            $kills = $user["kills"];
            $sb .= "<tr><td>$pos</td><td>$username</td><td>$kills</td></tr>";
            $pos++;
            
        }
        $sb .= "</table>";
        return $sb;
    }
    
}

?>