<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["name"] = htmlspecialchars($_POST["name"]);
    $_SESSION["email"] = htmlspecialchars($_POST["email"]);

    header("Location: step2.php");
    exit();
}
?>

<h2>Step 1 - Basic Info</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Next</button>
</form>