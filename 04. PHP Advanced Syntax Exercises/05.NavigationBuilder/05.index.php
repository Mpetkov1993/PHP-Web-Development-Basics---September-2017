<?php
function uList ($items) {
    $items = explode(" ", $items);
    echo "<ul>";
    foreach ($items as $key => $value) {
        echo "<li>"."$value"."</li>";
    }
    echo "</ul>";

}
if (isset($_GET['submit'])) {
    $categories = $_GET['categories'];
    $tags = $_GET['tags'];
    $months = $_GET['months'];
    echo "<h2>"."Categories"."</h2>";
    uList($categories);
    echo "<h2>"."Tags"."</h2>";
    uList($tags);
    echo "<h2>"."Months"."</h2>";
    uList($months);
}
include '05.html.php';