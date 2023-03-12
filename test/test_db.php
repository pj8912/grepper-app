<?php

$databaseFile = "testdb.db";
if(file_exists($databaseFile)){
	echo 'Database already exists'.PHP_EOL;
	exit;
}
$db = new SQLite3($databaseFile);
$db->exec("CREATE TABLE IF NOT EXISTS test_table(
	tid INTEGER PRIMARY KEY AUTOINCREMENT,
	testdata TEXT NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
	)");
$db->close();

echo " 'testdb' database and 'test_table' table created".PHP_EOL;
?>

