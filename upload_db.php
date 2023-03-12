<?php

require_once('database/sql.php');
$postdata = file_get_contents("php://input");
$req = json_decode($postdata);
$db = new database("notesapp.db");

if (!$db) {
    die('Error opening database! If database is not created, create using create_database.php script at the root folder');
}

$data = $req->data;

if($db->exec("INSERT INTO terms(term) VALUES('$data')")){
    $message = ['message' => 'term uploaded successfully'];
    exit(json_encode($message));
}else{
    $message = ['message' => 'term upload failed!'];
    exit(json_encode($message));
}
?>