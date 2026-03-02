<?php
session_start();

$correct_user = "admin";
$correct_pass = "123456";

if (!isset($_SESSION["attempts"])) {
    $_SESSION["attempts"] = 0;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $correct_user && $password === $correct_pass) {
        $_SESSION["attempts"] = 0;
        $message = "<span style='color:green;'>Login successful!</span>";
    } else {
        $_SESSION["attempts"]++;
        $message = "<span style='color:red;'>Invalid credentials. Attempts: " . $_SESSION["attempts"] . "</span>";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>

<?php echo $message; ?>