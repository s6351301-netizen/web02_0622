<style>
  fieldset{
    display:inline-block;
    vertical-align: top;
  }  
</style>
<div>
    目前位置：首頁 > 分類網誌 > <span class='nav-item'></span>
</div>
<fieldset style="width:150px">
    <legend>分類網誌</legend>
    <div class="type-item" style="cursor:pointer;color:blue;margin:10px 0" >健康新知</div>
    <div class="type-item" style="cursor:pointer;color:blue;margin:10px 0" >菸害防制</div>
    <div class="type-item" style="cursor:pointer;color:blue;margin:10px 0" >癌症防治</div>
    <div class="type-item" style="cursor:pointer;color:blue;margin:10px 0" >慢性病防治</div>
</fieldset>
<fieldset style="width:550px">
    <legend>文章列表</legend>
    <div class="post-list"></div>
    <div class="post-content" style="display:none"></div>
    
</fieldset>


<script>

//getPosts('健康新知');
$(".nav-item").text($(".type-item").eq(0).text())

getPosts($(".type-item").eq(0).text());
    
$(".type-item").on("click",function(){
    let text=$(this).text();
    $(".nav-item").text(text);
    getPosts(text);

})


function getPosts(type){
    $.get("./api/get_posts.php",{type},(list)=>{
        $(".post-list").html(list)
        $(".post-list").show();
        $(".post-content").hide();
    })
}

function getPost(id){
    $.get("./api/get_post.php",{id},(post)=>{
        $(".post-content").html(post)
        $(".post-list").hide();
        $(".post-content").show();
    })
}
</script>