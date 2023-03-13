<?php

require_once('../database/sql.php');
$db = new database('testjson.db');
$sql = "SELECT * FROM test_table";
$response = $db->query($sql);
while($row = $response->fetchArray(SQLITE3_ASSOC)){
    echo $row['testdata'].PHP_EOL;
}

?>
