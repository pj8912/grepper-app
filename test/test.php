
<?php

require_once('../database/sql.php');
$db = new database('testdb.db');
$data = "ad2";
if($db->exec("INSERT INTO test_table(testdata) VALUES('$data')")){
   echo "data uploaded successfully";
}
else{
    echo "err!";
}

?>
