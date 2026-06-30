<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <th style="width:10%">編號</th>
            <th style="width:60%">問卷題目</th>
            <th style="width:10%">投票總數</th>
            <th style="width:10%">結果</th>
            <th style="width:10%">狀態</th>
        </tr>
        <?php
        $ques=$Que->all(['main_id'=>0]);
        foreach($ques as $idx => $que):
        ?>
        <tr>
            <td class='ct'><?= $idx + 1 ; ?></td>
            <td><?= $que['text'] ?></td>
            <td class='ct'><?= $que['vote'] ?></td>
            <td class='ct'>
                <a href='?do=result&id=<?= $que['id']; ?>'>結果</a>
            </td>
            <td class='ct'>
                <?php 
                if(isset($_SESSION['login'])){
                    echo "<a href='?do=vote&id={$que['id']}'>";
                    echo "參與投票";
                    echo "</a>";
                }else{
                    echo "請先登入";
                }
                ?>
            </td>
        </tr>
        <?php 
        endforeach;
        ?>
    </table>
</fieldset>