<?php

include_once "vendor/autoload.php";

$mysqli = new mysqli("localhost", "root", "", "dbbench");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$sql = "DROP TABLE IF EXISTS `person`";
$mysqli->query($sql);


$sql = "CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `note` text,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)";

if ($mysqli->query($sql) === TRUE) {
	printf("<p>Table has been created.</p>");
}



/* populate data */

$faker = Faker\Factory::create();
$sql = "insert into `person` (`firstname`,`lastname`,`address`,`city`,`state`,`postcode`,`country`,`note`) values (?,?,?,?,?,?,?,?)";

for ($i=0; $i < 1000; $i++) {
	
	$fname    = $faker->firstName;
	$lname    = $faker->lastName;
	$address  = $faker->streetAddress;
	$city     = $faker->city;
	$state    = $faker->state;
	$postcode = $faker->postcode;
	$country  = $faker->country;
	$note     = $faker->text	;

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ssssssss",
		$fname,
		$lname,
		$address,
		$city,
		$state,
		$postcode,
		$country,
		$note
	);
	$stmt->execute();
}

print "<p>Sample data has been populated.</p>";
echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";