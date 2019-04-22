$('#postSearch').keyup(function(){
    var keyPost=$('#postSearch').val();
    // alert($('#postSearch').val());
    $.post('ajaxpost.php',{data:keyPost},function(data){
        $('.list_posts').html(data);
    })
});


$('#search').keyup(function(){
    var key=$('#search').val();
    // alert($('#search').val());
    $.post('ajax.php',{data:key},function(data){
        $('.list_users').html(data);
    })
});
$('#listpost').keyup(function(){
    var key=$('#listpost').val();
    // alert($('#listpost').val());
    $.post('ajaxposts.php',{data:key},function(data){
        $('.list_post').html(data);
    })
});
//comfirm delete
$('.delete_post').click(function(){
   return confirm("ban co muon xoa bai dằng");
});
$('.userDelete').click(function(){
    return confirm("ban co muon xoa member");
 });