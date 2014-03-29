<?php

$mysqli = new mysqli("localhost", "root", "", "dbbench");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$sql = "SELECT * FROM person where id < 100 limit 20";
$people = $mysqli->query($sql);

while ($person = $people->fetch_assoc()) {
	print $person["firstname"] . " " . $person["lastname"] ."<br/>";
}

echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";
?>
