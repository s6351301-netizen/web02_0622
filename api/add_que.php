<?php include_once "db.php";

if(isset($_POST['name']) && $_POST['name']!=""){
    $Que->save(['text'=>$_POST['name'],
                'main_id'=>0,
                'vote'=>0]);

    $main_id=$Que->find(['text'=>$_POST['name']])['id'];

    if(isset($_POST['option'])){
        foreach($_POST['option'] as $option){
            if($option!=""){
                $Que->save(['text'=>$option,
                             'main_id'=>$main_id,
                             'vote'=>0]);
            }
        }
    }
}

to("../admin.php?do=que");