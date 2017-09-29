<?php
class Math {
    public static function Sum($a, $b) {
        return $a + $b;
    }
    public static function Subtract($a, $b) {
        return $a - $b;
    }
    public static function Multiply($a, $b) {
        return $a * $b;
    }
    public static function Divide($a, $b) {
        return $b === 0 ? "Division by zero not possible" : $a / $b;
    }
}