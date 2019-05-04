<?php 
require_once "CreateDB.php"

$classDB =  new ClassDB();
$classDB->createDB();
$classDB->createTable();
$classDB->addData();

 ?>