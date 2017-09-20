<?php
$input = "Enter value";
if (is_numeric($input)) {
    var_dump($input);
}
else {
    echo gettype($input);
}
