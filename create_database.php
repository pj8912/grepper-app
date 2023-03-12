<?php

$databaseFile = "grepper.db";
if(file_exists($databaseFile)){
	echo 'Greeper Database already exists'.PHP_EOL;
	exit;
}
$db = new SQLite3($databaseFile);
$db->exec("CREATE TABLE IF NOT EXISTS terms(
	tid INTEGER PRIMARY KEY AUTOINCREMENT,
	term TEXT NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
	)");
$db->close();
echo " 'grepper' database and 'terms' table created".PHP_EOL;
?>

