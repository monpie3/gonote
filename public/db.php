<?php

require __DIR__ . '/../vendor/autoload.php';

class NotesDB extends SQLite3 {
    function __construct() {
        $this->open('../notes.db');
    }
}
$db = new NotesDB();
   
$sql = "SELECT id, name, date FROM note";
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo "id = ". $row['id'] . ", ";
    echo "name = ". $row['name'] . ", ";
    echo "date = ". $row['date'] ."<br>";
}

$db->close();
