<?php include_once "db.php";

$post=$News->find($_GET['id']);
echo nl2br($post['content']);

?>