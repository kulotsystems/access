<?php

$database  = 'database.accdb';

$root_path = $_SERVER['DOCUMENT_ROOT'] . '/' . explode('/', (str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME'])))[1];
$base = basename($root_path);
$conn = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)}; Dbq=' . $root_path . '/' . $database . ';');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);