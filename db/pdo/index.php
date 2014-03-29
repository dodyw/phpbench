<?php

$db = new PDO('mysql:host=localhost;dbname=dbbench;charset=utf8', 'root', '', 
			array(PDO::ATTR_EMULATE_PREPARES => false, 
				  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$sql = "SELECT * FROM person where id < 100 limit 20";
$stmt = $db->query($sql);
$people = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($people as $person) {
	print $person["firstname"] . " " . $person["lastname"] ."<br/>";
}

echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";
?>
