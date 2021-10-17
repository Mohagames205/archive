<?php
require_once("connect.php");

if(isset($_GET["username"])){
    if(isset($_GET["kills"])){
        if(isset($_GET["key"])){
            $key = htmlspecialchars($_GET["key"]);
            if($key == 25782486){
                $kills = htmlspecialchars($_GET["kills"]);
                $username = htmlspecialchars($_GET["username"]);
                
                $searchUser = $handle->prepare("SELECT username FROM scoreboard WHERE username = :username");
                $searchUser->execute(["username" => $username]);
                $rc = $searchUser->rowCount();
            
            

                if($rc == 0){
                    $kills = htmlspecialchars($_GET["kills"]);
                    $username = htmlspecialchars($_GET["username"]);
                    $insertScore = $handle->prepare("INSERT INTO scoreboard (username, kills) values(:username, :kills)");
                    $insertScore->execute(["username" => $username, "kills" => $kills]);

                }
                else{
                    $updatesql = $handle->prepare("UPDATE scoreboard SET kills = :kills WHERE username = :username");
                    $updatesql->execute(["kills" => $kills, "username" => $username]);
                }
            }
            else{
                echo "Wrong key";
            }
        }
        else{
            echo "Key not defined!";
        }
        
        

            
        }
        
    else{
        echo "Kills not defined!";
    }
}
else{
    echo "Username not defined!";
}