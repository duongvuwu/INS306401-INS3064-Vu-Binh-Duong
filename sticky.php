<?php

$name = "";
$email = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);

    if (empty($name)) {
        $errors["name"] = "Name is required";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (empty($errors)) {
        echo "<p style='color:green;'>Form submitted successfully!</p>";
        $name = "";
        $email = "";
    }
}
?>

<h2>Sticky Form</h2>

<form method="POST">

    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $errors["name"] ?? ""; ?></span>
    <br><br>

    Email:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $errors["email"] ?? ""; ?></span>
    <br><br>

    <button type="submit">Submit</button>

</form>