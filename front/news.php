<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
<table style="width:95%;margin:auto">
    <tr>
        <th style="width:25%" class='ct'>標題</th>
        <th style="width:50%" class='ct'>內容</th>
        <th style="width:25%" class='ct'></th>
    </tr>
    <?php 
    $total=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($total/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    $posts=$News->all(['sh'=>1]," limit $start,$div");
    foreach($posts as $post):
    ?>
    <tr>
        <td><?= $post['title'] ?></td>
        <td><?= mb_substr($post['content'],0,30); ?>...</td>
        <td></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<div>
<?php 
if($now-1 > 0){
$prev=$now-1;
echo "<a href='?do=news&p=$prev'> < </a>";

}

for($i=1;$i<=$pages;$i++){
    $size=($i==$now)?'24px':'18px';
echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>";
}

if($now+1 <= $pages){
$next=$now+1;
echo "<a href='?do=news&p=$next'> > </a>";
}


?>
</div>
</fieldset>