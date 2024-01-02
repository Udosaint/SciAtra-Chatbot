<?php 

ob_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chatbot";



try 
{
	$db_conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
	$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

