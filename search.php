<?php
$query = "";

if (isset($_GET["q"])) {
    $query = htmlspecialchars($_GET["q"]);
}
?>

<h2>Search</h2>

<form method="GET">
    <input type="text" name="q" value="<?php echo $query; ?>">
    <button type="submit">Search</button>
</form>

<?php
if ($query) {
    echo "<p>You searched for: <strong>$query</strong></p>";
}
?>