<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pzi_fpmoz';

$db = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

echo "Connected successfully \n";

$query = "SELECT first_name, last_name from users";

$result = $db->query($query);

$row = $result->fetch_assoc();

var_dump($row);

/*$row = $result->fetch_assoc();
var_dump($row);*/

// Unos korisnika u bazu ako je poslan POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    echo 'Usao u funkciju za kreiranje usera';

    $query = "INSERT INTO users (first_name, last_name, password)";
    $query .= "VALUES ('$first_name', '$last_name', '$password')";
    $result = $db->query($query);

    if (!$result) {
        var_dump($db->error);
    }

}

?>

    <?php
        $test = "<h1>Testna varijabla</h1>";
        $test2 = '';
        $test .= $test2;
        echo $test;
    ?>

    <form method="post">
        First Name: <input type="text" name="first_name"><br>
        Last Name: <input type="text" name="last_name"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit">
    </form>

    <?php
        var_dump($_POST);
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>