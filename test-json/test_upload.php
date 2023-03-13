<?php

require_once('../database/sql.php');
$db = new database('testjson.db');
$data = "data1";
if($db->exec("INSERT INTO test_table(testdata) VALUES('$data')")){
   echo " 'testdata' uploaded successfully";
}
else{
    echo "err!";
}