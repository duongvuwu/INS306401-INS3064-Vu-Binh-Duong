<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: step1.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["age"] = htmlspecialchars($_POST["age"]);
}
?>

<h2>Step 2 - Additional Info</h2>

<form method="POST">
    Age: <input type="number" name="age" required><br><br>
    <button type="submit">Finish</button>
</form>

<?php
if (isset($_SESSION["age"])) {
    echo "<h3>Registration Complete</h3>";
    echo "Name: " . $_SESSION["name"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    echo "Age: " . $_SESSION["age"] . "<br>";

    session_destroy();
}
?>