<?php

require_once('../database/sql.php');

$db = new database('testjson.db');
$sql = "SELECT * FROM test_table";

$response = $db->query($sql);

$rows = [];
while($row = $response->fetchArray(SQLITE3_ASSOC)){
    $rows[] = $row;
}

exit(json_encode($rows));


?>
