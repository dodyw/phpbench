<?php

require_once "vendor/autoload.php";

ORM::configure('mysql:host=localhost;dbname=dbbench');
ORM::configure('username', 'root');
ORM::configure('password', '');

//$people = ORM::for_table('person')->where_raw('id < 100')->limit(10)->find_many();
$people = ORM::for_table('person')->raw_query("SELECT * FROM person where id < 100 limit 20")->find_many();

foreach ($people as $person) {
	print $person->firstname . " " . $person->lastname ."<br/>";
}

echo "\n<p>Memory usage: ".memory_get_usage()." bytes.</p>\n\n";
?>
