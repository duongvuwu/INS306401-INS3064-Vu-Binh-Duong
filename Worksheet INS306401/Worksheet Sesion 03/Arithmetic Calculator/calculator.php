<?php

$result = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    // Validate numeric
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Both inputs must be numeric values.";
    } else {

        // Type casting (important)
        $num1 = (float)$num1;
        $num2 = (float)$num2;

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                break;

            case "subtract":
                $result = $num1 - $num2;
                break;

            case "multiply":
                $result = $num1 * $num2;
                break;

            case "divide":
                if ($num2 == 0) {
                    $error = "Cannot divide by zero.";
                } else {
                    $result = $num1 / $num2;
                }
                break;

            default:
                $error = "Invalid operation selected.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Arithmetic Calculator</title>
    <style>
        body { font-family: Arial; padding: 40px; }
        input, select { padding: 8px; margin: 5px 0; width: 100%; }
        button { padding: 10px; margin-top: 10px; }
        .error { color: red; }
        .result { color: green; font-weight: bold; }
    </style>
</head>
<body>

<h2>Arithmetic Calculator</h2>

<form method="POST">
    <label>Number 1:</label>
    <input type="text" name="num1" required>

    <label>Number 2:</label>
    <input type="text" name="num2" required>

    <label>Operation:</label>
    <select name="operation">
        <option value="add">Add (+)</option>
        <option value="subtract">Subtract (-)</option>
        <option value="multiply">Multiply (*)</option>
        <option value="divide">Divide (/)</option>
    </select>

    <button type="submit">Calculate</button>
</form>

<?php
if ($error) {
    echo "<p class='error'>$error</p>";
}

if ($result !== "" && !$error) {
    echo "<p class='result'>Result: $result</p>";
}
?>

</body>
</html>