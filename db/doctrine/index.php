<?php

require_once "vendor/autoload.php";

$config = new \Doctrine\DBAL\Configuration();
$connectionParams = array(
	'dbname'   => 'dbbench',
	'user'     => 'root',
	'password' => '',
	'host'     => 'localhost',
	'driver'   => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = "SELECT * FROM person where id < 100 limit 20";
$statement = $conn->prepare($sql);
$statement->execute();
$people = $statement->fetchAll();

foreach ($people as $person) {
	print $person["firstname"] . " " . $person["lastname"] ."<br/>";
}

echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";
?>