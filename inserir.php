<?php
if ($_POST) {
	$dados[] = $_POST['dados'];

	$db = new PDO("mysql:host=localhost;dbname=tasklist",'root','123456');
	$query = "INSERT INTO tasks (`task`) VALUES (?)";
	$statement = $db->prepare($query);
	$statement->execute($dados);
	
	//file_put_contents('dados.txt', $_POST['dados'], FILE_APPEND);
}
