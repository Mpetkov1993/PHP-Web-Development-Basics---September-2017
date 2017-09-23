<?php
$users = [];
$login = false;
$fLogs = 0;
while (true){
    $input = trim(fgets(STDIN));
    if ($input == "end") {
        break;
    }
    if ($input == "login") {
        $login = true;
        continue;
    }
    $input = explode(" -> ", $input);
    $user = trim($input[0]);
    $pass = trim($input[1]);
    if (!$login) {
        $users[$user] = $pass;
    }
    else {
        if (isset($users[$user]) && $users[$user] == $pass) {
            echo $user.": logged in successfully"."\n";
        }
        else {
            $fLogs++;
            echo $user.": login failed"."\n";
        }
    }
}
echo "unsuccessful login attempts: ".$fLogs."\n";