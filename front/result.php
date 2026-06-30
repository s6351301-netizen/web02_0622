<?php 
$subject=$Que->find($_GET['id']);
$options=$Que->all(['main_id'=>$subject['id']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text'] ?></legend>
 <h3><?= $subject['text'] ?></h3>

<?php
foreach($options as $option){
    $div=($subject['vote']>0)?$subject['vote']:1;  //避免分母為零;
    $rate=$option['vote']/$div;
    $percent=round($rate*100);
    //echo $rate;
    //echo $percent;

echo "<div style='display:flex'>";
echo    "<div style='width:40%'>";
echo    $option['text'];
echo    "</div>";
echo "<div style='width:60%;display:flex'>";
echo    "<div style='background:#aaa;height:30px;width:".round(0.75*$rate*100)."%'>";   //長條圖
echo    "</div>";
echo    "<div style='width:75%'>";   //票數
echo    "{$option['vote']}票($percent%)";
echo    "</div>";
echo "</div>";
echo "</div>";

}
?>
<div class="ct">
    <button onclick="location.href='?do=que'">返回</button>
</div>


</fieldset>