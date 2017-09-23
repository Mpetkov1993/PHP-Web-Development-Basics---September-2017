<?php
function location ($row, $col): void {
    $tuvalu = $row >= 1 && $row <= 3 && $col >= 1 && $col <= 3;
    $tokelau = $row >= 0 && $row <= 1 && $col >= 8 && $col <= 9;
    $tonga = $row >= 6 && $row <= 8 && $col >= 0 && $col <= 2;
    $samoa = $row >= 3 && $row <= 6 && $col >= 5 && $col <= 7;
    $cook = $row >= 7 && $row <= 8 && $col >= 4 && $col <= 9;
    if ($tuvalu) {
        echo "Tuvalu"."\n";
    }
    elseif ($tokelau) {
        echo "Tokelau"."\n";
    }
    elseif ($tonga) {
        echo "Tonga"."\n";
    }
    elseif ($samoa) {
        echo "Samoa"."\n";
    }
    elseif ($cook) {
        echo "Cook"."\n";
    }
    else {
        echo "On the bottom of the ocean"."\n";
    }
}
$input = explode(", ", trim(fgets(STDIN)));
for ($i = 0; $i < count($input); $i +=2) {
    $col = $input[$i];
    $row = $input[$i+1];
    location($row, $col);
}