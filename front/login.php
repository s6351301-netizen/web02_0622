<fieldset style="width:50%;margin:auto;">
    <legend>會員登入</legend>
    <!-- form:post>table>tr*3>td*2 -->

        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td>
                    <input type="password" name="pw" id="pw">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" onclick="login()">登入</button>
                    <button type="button" onclick="$('#acc,#pw').val('')">清除</button>
                </td>
                <td>
                    <a href="?do=forgot">忘記密碼</a>|
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>

</fieldset>
<script>
    
    function login(){
        let user={"acc":$("#acc").val(),
                   "pw":$("#pw").val()
        }
        $.get("./api/chk_acc.php",user,(res)=>{
            if(parseInt(res)>0){
                $.post("./api/chk_pw.php",user,(res)=>{
                    if(parseInt(res)>0){
                        if(user.acc=='admin'){
                            location.href='admin.php'
                        }else{
                            location.href='index.php?do=main'
                        }
                    }else{
                        alert("密碼錯誤")
                        $('#acc,#pw').val('')
                    }
                })
            }else{
                alert("查無帳號")
                $('#acc,#pw').val('')
            }
        })

    }
</script>