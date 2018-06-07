<?php
$pass = $_POST["password"];
$user = $_POST["username"];
$hash = password_hash($pass, PASSWORD_DEFAULT);
//connect to database
require("dbConnect.php");
$db = get_db();
if (!isset($db)) {
	die("DB Connection was not set");
}
$stmt = $db->prepare("INSERT INTO person (username,password) VALUES (:username,:password)");
$stmt->bindValue(":username",$user,PDO::PARAM_STR);
$stmt->bindValue(":password",$hash,PDO::PARAM_STR);
$stmt->execute();
header("Location: welcome.php");
exit;
?>

/*CREATE TABLE person (
	id SERIAL PRIMARY KEY,
	username VARCHAR(50) UNIQUE,
	password VARCHAR(50)
);*/