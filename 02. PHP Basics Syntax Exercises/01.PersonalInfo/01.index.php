<?php
echo "Enter your first name:"."\n";
$fName = trim(fgets(STDIN));
echo "Enter your last name:"."\n";
$lName = trim(fgets(STDIN));
echo "Enter your age:"."\n";
$age = trim(fgets(STDIN));
$fName = $fName." ".$lName;
echo "Your name is ".$fName." and you are ".$age." years old.";