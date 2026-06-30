<?php  include_once "db.php";


$option=$Que->find($_POST['vote']);
$option['vote']++;

$subject=$Que->find($option['main_id']);
$subject['vote']++;

$Que->save($option);
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");