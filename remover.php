<?php

$db = new PDO("mysql:host=localhost;dbname=tasklist",'root','123456');

$id_remove = $_POST["id"];


/* Delete all rows from the FRUIT table */
$count = $db->exec("DELETE FROM tasks WHERE id = $id_remove");
