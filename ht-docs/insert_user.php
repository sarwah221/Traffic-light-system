<?php
//Trim incoming values
//$pseudo    = trim($_POST['pseudo'] ?? '');
//$password  = trim($_POST['password'] ?? '');
//$firstname = trim($_POST['firstname'] ?? '');
//$lastname  = trim($_POST['lastname'] ?? '');

// Server‑side validation: stop here if empty
//f ($pseudo === '' || $password === '') {
   // die("Error: Pseudo and password are mandatory!");
//}


$mysqli = new mysqli("localhost", "database_user", "123aretaiba", "new_database");

// Check connection
if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli->connect_error;
exit();
}

$can_use_converter = isset($_POST['can_use_converter']) ? 1 : 0;

// Query
$query_str = "INSERT INTO datatable (pseudo, password, first_name, last_name, can_use_converter) VALUES ('". $_POST['pseudo'] ."', '".
$_POST['password'] ."', '". $_POST['firstname'] ."', '". $_POST['lastname'] ."' , '". $_POST['can_use_converter'] ."')";
echo "MySql will execute the query: " . $query_str;
$result = $mysqli->query($query_str);
if (!$result) {
echo("Error description: " . mysqli_error($mysqli));
exit();
}
else
{
echo "<hr>Your account has been successfully created.<br>";
echo "Click <a href='menu.php'>here</a> to get back to the menu and log in.";
}
// close connection
$mysqli->close();
?>
