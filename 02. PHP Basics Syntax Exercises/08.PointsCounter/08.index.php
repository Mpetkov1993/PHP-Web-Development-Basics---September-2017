<?php
$teamPlayers = [];
$teamScore = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == "Result") {
        break;
    }
    $symbols = ['@', '%', '$', '*'];
    $input = str_replace($symbols, "", $input);
    $input = explode("|", $input);
    $team = $input[0] == strtoupper($input[0]) ? $input[0] : $input[1];
    $name = $input[0] == strtoupper($input[0]) ? $input[1] : $input[0];
    $points = $input[2];
    $teamPlayers[$team][$name] = $points;
}
$topPlayers = [];
foreach ($teamPlayers as $team => $player) {
    asort($player);
    foreach ($player as $key => $value) {
        if (!isset($teamScore[$team])) {
            $teamScore[$team]=0;
        }
        $teamScore[$team]+=$value;
        $topPlayers[$team]=$key;
    }
}
arsort($teamScore);
foreach ($teamScore as $key => $value) {
    echo $key." => ".$value."\n";
    echo "Most points scored by ".$topPlayers[$key]."\n";
}