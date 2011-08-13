<?php

$db = new PDO("mysql:host=localhost;dbname=tasklist", 'root', '123456');

$statement = $db->prepare("SELECT * FROM tasks");
$statement->execute();
$tasks = $statement->fetchAll();

foreach ($tasks as $task) {
?>
	<!--<li><?php echo $task['task'] ?>&nbsp   <a href="./remover.php?id=<?php echo $task['id'] ?>">
	//		<img src="./delete.png" alt="Example image" name="fig"></a></li> -->
			
	<li><?php echo $task['task'] ?>&nbsp<img src="./delete.png" class="remover" id="<?php echo $task['id'] ?>"></li>
<?php
}
