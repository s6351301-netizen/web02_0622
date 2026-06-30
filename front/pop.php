<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
<table style="width:95%;margin:auto">
    <tr>
        <th style="width:25%" class='ct'>標題</th>
        <th style="width:50%" class='ct'>內容</th>
        <th style="width:25%" class='ct'>人氣</th>
    </tr>
    <?php 
    $total=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($total/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    $posts=$News->all(['sh'=>1]," order by good desc limit $start,$div");
    foreach($posts as $post):
    ?>
    <tr>
        <td class="post-title"><?= $post['title'] ?></td>
        <td style="position:relative">
            <span><?= mb_substr($post['content'],0,30); ?>...</span>
                <div class="alerr" >
                    <h3 style='color:lightblue'><?= $post['type'] ?></h3>
                    <pre class="ssaa"><?= nl2br($post['content']) ?></pre>
                </div>
        </td>
        <td>
            <span class="good-sum"><?= $post['good']; ?></span>
            個人說    
            <span class="good"></span>
            
            <?php
            if(isset($_SESSION['login'])){
                echo "-<a href='#' onclick='good({$post['id']},this)'>";
                $chk=$Log->count(['user'=>$_SESSION['login'],'news'=>$post['id']]);
                if($chk){
                    echo "收回讚";
                }else{
                    echo "讚";
                }
                echo "</a>";
            }

            ?>
        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<div>
<?php 
if($now-1 > 0){
$prev=$now-1;
echo "<a href='?do=pop&p=$prev'> < </a>";

}

for($i=1;$i<=$pages;$i++){
    $size=($i==$now)?'24px':'18px';
echo "<a href='?do=pop&p=$i' style='font-size:$size'> $i </a>";
}

if($now+1 <= $pages){
$next=$now+1;
echo "<a href='?do=pop&p=$next'> > </a>";
}


?>
</div>
</fieldset>
<script>
$(".post-title").hover(
    function(){//onmouseover
        $(".alerr").hide();
        $(this).next("td").children('.alerr').show();
    },
    function(){//onmouseout
        $(".alerr").hide();
    }
)
$(".alerr").hover(
    function(){
        $(this).show();
    },
    function(){
        $(".alerr").hide();
    }
)

function good(id,dom){
    let num=$(dom).parent().find(".good-sum").text()*1;
    $.post("./api/good.php",{id},()=>{
        /* switch($(dom).text()){
            case "讚":
                $(dom).parent().find(".good-sum").text(num+1)
                $(dom).text("收回讚")
            break;
            case "收回讚":
                $(dom).parent().find(".good-sum").text(num-1)
                $(dom).text("讚")
            break;
        } */

        location.reload();
    })
}
</script>