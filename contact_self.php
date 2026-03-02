<?php
session_start();

$name = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);

    $_SESSION["success"] = "Thank you, $name!";
    header("Location: contact_self.php");
    exit();
}
?>

<h2>Contact Form</h2>

<?php
if (isset($_SESSION["success"])) {
    echo "<p style='color:green;'>" . $_SESSION["success"] . "</p>";
    unset($_SESSION["success"]);
}
?>

<form method="POST">
    Name: <input type="text" name="name" required>
    <button type="submit">Submit</button>
</form>