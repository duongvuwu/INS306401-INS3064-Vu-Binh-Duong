<?php
require "utils.php";

echo "<h2>Testing Utils</h2>";

$name = "   Vu   ";
$email = "test@gmail.com";

echo "Sanitized Name: " . sanitize($name) . "<br>";

if (is_valid_email($email)) {
    echo "Valid Email<br>";
} else {
    echo "Invalid Email<br>";
}

if (is_required($name)) {
    echo "Name is provided<br>";
}