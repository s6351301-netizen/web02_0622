<form action="./api/edit_news.php" method="post">
    <table style="width:80%;margin:auto;">
        <tr class="ct ">
            <td style="width:10%">編號</td>
            <td>標題</td>
            <td style="width:10%">顯示</td>
            <td style="width:10%">刪除</td>
        </tr>
        <?php
        $all=$News->count();
        $div=3;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rows=$News->all(" limit $start,$div");
        foreach($rows as $idx => $row):
        ?>
        <tr class="ct">
            <td><?= $start+1+$idx ?>.</td>
            <td><?= $row['title']; ?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh']==1)?'checked':''; ?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
        <?php
        endforeach;
        ?>
    </table>
    <div class="ct">
        <?php 
        if(($now-1)>0){
            $prev=$now-1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }

        for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?'24px':'';
            echo "<a href='?do=news&p=$i' style='font-size:$size'> $i </a>";
        }

        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }

        ?>
    </div>
<div class="ct">

    <input type="submit" value="確定修改">
</div>
</form>