<?php include_once "db.php";

$chk=$Log->count(['user'=>$_SESSION['login'],'news'=>$_POST['id']]);
$post=$News->find($_POST['id']);

if($chk){
    //收回讚
    $Log->del(['user'=>$_SESSION['login'],'news'=>$_POST['id']]);
    $post['good']--;
}else{
    //按讚

    $Log->save(['user'=>$_SESSION['login'],'news'=>$_POST['id']]);
    $post['good']++;
}

$News->save($post);


