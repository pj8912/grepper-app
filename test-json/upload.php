<?php

require_once('../database/sql.php');

$postdata = file_get_contents("php://input");
$req = json_decode($postdata);

$db = new database("testjson.db");

if (!$db) {
    die('Error opening database! If database is not created, create using create_database.php script at the root folder');
}

$data = $req->data;

if($db->exec("INSERT INTO test_table(testdata) VALUES('$data')")){
    $message = [
        'status' => 1,
        'message' => 'data uploaded successfully'
    ];
    exit(json_encode($message));
}else{
    $message = [
        'status' => 0,
        'message' => 'data upload failed!'
    ];
    exit(json_encode($message));
}
?>