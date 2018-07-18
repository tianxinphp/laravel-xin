var editor = new wangEditor('content');
editor.config.uploadImgUrl = '/posts/image/upload';
editor.config.uploadParams = {
};

// 设置 headers（举例）
editor.config.uploadHeaders = {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
};
editor.create();

$('.like-button').click(function () {
    var target=$(this);
    var current_like=target.attr('like-value');
    var use_id=target.attr('like-user');
    if(current_like==1){
        $.ajax({
            url:'/user'+use_id+'/unFan',
            method:'POST',
            dateType:'json',
            success:function (data) {
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }
                target.attr('like-value',0);
                target.text('关注');
            }
        });
    }else{
        $.ajax({
            url:'/user'+use_id+'/fan',
            method:'POST',
            dateType:'json',
            success:function (data) {
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }
                target.attr('like-value',1);
                target.text('取消关注');
            }
        });
    }
});