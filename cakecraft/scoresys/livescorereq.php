<?php
require_once("livescore.class.php");

$liveScore = new Scoreboard;

$scores = $liveScore->getScoreboard();

echo $scores;

?>
