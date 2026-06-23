<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_acc.php" method="post">
        <table class='ct' style="width:80%;margin:auto">
            <tr class='clo'>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php 
            $mems=$Mem->all();
            foreach($mems as $mem):
            ?>
            <tr>
                <td><?= $mem['acc']; ?></td>
                <td><?= str_repeat("*",strlen($mem['pw'])); ?></td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $mem['id']; ?>">
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>



    <h2>新增會員</h2>
        <div style='color:red'>*請設定您要註冊的帳號及密碼(最長12個字元)</div>
        <table>
            <tr>
                <td>Step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>Step2:登入密碼</td>
                <td>
                    <input type="password" name="pw" id="pw">
                </td>
            </tr>
            <tr>
                <td>Step3:再次確認密碼</td>
                <td>
                    <input type="password" name="pw2" id="pw2">
                </td>
            </tr>
            <tr>
                <td>Step4:信箱(忘記密碼時使用)</td>
                <td>
                    <input type="text" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" onclick="reg()">新增</button>
                    <button type="button" onclick="$('#acc,#pw,#pw2,#email').val('')">清除</button>
                </td>
                <td></td>
            </tr>
        </table>


<script>
function reg(){
    let user={
        'acc':$("#acc").val(),
        'pw':$("#pw").val(),
        'pw2':$("#pw2").val(),
        'email':$("#email").val()
    }

    if(user.acc=="" || user.pw=="" || user.pw2=="" || user.email==""){
        alert("不可空白");
    }else if(user.pw != user.pw2){
        alert("密碼錯誤");
    }else{
        $.get("api/chk_acc.php",user,(res)=>{
            //console.log(res)
            if(parseInt(res)>0){
                alert("帳號重複");
            }else{

                $.post("api/reg.php",user,()=>{
                    //console.log(res)
                        location.reload();
                })
            }
        })

    }
}
</script>
</fieldset>