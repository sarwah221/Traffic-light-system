<?php


$mysqli = new mysqli("localhost", "database_user", "123aretaiba", "new_database");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Get form data and trim
$pseudo = trim($_POST['pseudo'] ?? '');
$password = trim($_POST['password'] ?? '');

// Build SQL query
$query_str = "SELECT * FROM datatable WHERE pseudo = '$pseudo' AND password = '$password'";
//echo "MySQL will execute the query: " . $query_str . "<br>";

// Run the query
$result = $mysqli->query($query_str);

if (!$result) {
    echo "SQL Error: " . $mysqli->error;
    exit();
}

// Check if we found a match
if ($result->num_rows > 0) 
    {   $row = $result->fetch_assoc();
        session_start();
        $_SESSION['can_use_converter'] = $row['can_use_converter'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header("Location: menu.php");
        }
 else {
    echo "Not in my database!";
}

// Close connection
$mysqli->close();
?>
