<?php
session_start();
echo "<h1>hello</h1>";
//connect to database
require("dbConnect.php");
$db = get_db();
if (!isset($db)) {
	die("DB Connection was not set");
}
$pass = $_POST["password"];
$user = $_POST["username"];
$stmt = $db->prepare("SELECT password FROM person WHERE username=:username");
$stmt->bindValue(":username",$user,PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch();
$dbpass = $row["password"];
if(password_verify($pass, $dbpass)) {
	$_SESSION['user'] = $user;
	header("Location: welcome.php");
} 
else {
	header("Location: signIn.php");
}

exit;
?>